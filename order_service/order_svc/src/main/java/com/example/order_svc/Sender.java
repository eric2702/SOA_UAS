package com.example.order_svc;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;
import java.util.Optional;

import org.springframework.amqp.rabbit.core.RabbitTemplate;
import org.springframework.boot.CommandLineRunner;
import org.springframework.http.ResponseEntity;
import org.springframework.stereotype.Component;

import com.example.order_svc.helpers.response.ApiResponse;
import com.example.order_svc.models.entities.Client;
import com.example.order_svc.models.entities.Event;
import com.example.order_svc.models.entities.Order;
import com.example.order_svc.models.entities.OrderDetails;
import com.example.order_svc.models.entities.OrderRequest;
import com.example.order_svc.models.entities.Staff;
import com.example.order_svc.models.repos.ClientRepository;
import com.example.order_svc.models.repos.OrderDetailsRepository;
import com.example.order_svc.models.repos.OrderRepository;
import com.example.order_svc.services.ClientService;
import com.example.order_svc.services.EventService;
import com.example.order_svc.services.OrderDetailsService;
import com.example.order_svc.services.OrderService;
import com.example.order_svc.services.StaffService;
import com.fasterxml.jackson.core.JsonProcessingException;
import com.fasterxml.jackson.databind.ObjectMapper;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.*;

@Component
@RestController
public class Sender implements CommandLineRunner {

    static final String topicExchangeName = "eo-exchange";

    private final RabbitTemplate rabbitTemplate;
    private final OrderService orderService;
    private final OrderRepository orderRepository;
    private final OrderDetailsRepository orderDetailsRepository;
    private final OrderDetailsService orderDetailsService;
    private final ClientRepository clientRepository;
    private final ClientService clientService;
    private final EventService eventService;
    private final StaffService staffService;

    private String convertOrderToJson(Order order) {
        ObjectMapper objectMapper = new ObjectMapper();
        try {
            return objectMapper.writeValueAsString(order);
        } catch (JsonProcessingException e) {
            e.printStackTrace();
            return null;
        }
    }

    private String convertOrderDetailsToJson(OrderDetails orderDetails) {
        ObjectMapper objectMapper = new ObjectMapper();
        try {
            return objectMapper.writeValueAsString(orderDetails);
        } catch (JsonProcessingException e) {
            e.printStackTrace();
            return null;
        }
    }

    @Autowired
    public Sender(RabbitTemplate rabbitTemplate, OrderService orderService, OrderRepository orderRepository,
            OrderDetailsRepository orderDetailsRepository, OrderDetailsService orderDetailsService,
            ClientRepository clientRepository, ClientService clientService, EventService eventService,
            StaffService staffService) {
        this.rabbitTemplate = rabbitTemplate;
        this.orderService = orderService;
        this.orderRepository = orderRepository;
        this.orderDetailsRepository = orderDetailsRepository;
        this.orderDetailsService = orderDetailsService;
        this.clientRepository = clientRepository;
        this.clientService = clientService;
        this.eventService = eventService;
        this.staffService = staffService;
    }

    @Override
    public void run(String... args) throws Exception {
        System.out.println("Sending message...");
    }

    @GetMapping("/send/{message}")
    public String sendMessage(@PathVariable String message) {
        System.out.println("Sending message...");
        rabbitTemplate.convertAndSend(topicExchangeName, "foo.bar.baz", message);
        return "Message sent: " + message;
    }

    @PostMapping("/order/add")
    public ResponseEntity addOrder(@RequestBody OrderRequest orderRequest) {
        System.out.println("Sending message...");
        Order order = orderRequest.getOrder();
        List<OrderDetails> orderDetailsList = orderRequest.getOrderDetails();

        // check if order attributes are empty
        if (order.getDescription().toString().isEmpty() || order.getTimestamp() == null) {
            ApiResponse apiResponse = new ApiResponse(false, "Order attributes cannot be empty", null);
            return ResponseEntity.badRequest().body(apiResponse);
        }

        // check if order details are empty
        for (OrderDetails orderDetails : orderDetailsList) {
            if (orderDetails.getDate() == null || orderDetails.getLocation().toString().isEmpty()
                    || orderDetails.getTime_end() == null || orderDetails.getTime_start() == null) {
                ApiResponse apiResponse = new ApiResponse(false, "Order details cannot be empty", null);
                return ResponseEntity.badRequest().body(apiResponse);
            }
        }

        Order newOrder = orderService.addOrder(order);
        Long newOrderId = newOrder.getId();

        rabbitTemplate.convertAndSend(topicExchangeName, "order.new", convertOrderToJson(newOrder));

        for (OrderDetails orderDetails : orderDetailsList) {
            orderDetails.setId_order(newOrderId);
            orderDetailsRepository.save(orderDetails);
            rabbitTemplate.convertAndSend(topicExchangeName, "order_details.new",
                    convertOrderDetailsToJson(orderDetails));
        }
        HashMap<String, Object> response = new HashMap<>();
        response.put("id", newOrder.getId());
        ApiResponse apiResponse = new ApiResponse(true, "Order added successfully", response);
        return ResponseEntity.ok(apiResponse);
    }

    @PutMapping("/order/data")
    public ResponseEntity updateOrderData(@RequestBody OrderRequest orderRequest) {
        Order order = orderRequest.getOrder();
        Order updatedOrder = orderService.updateOrderData(order);
        // and also update order details
        List<OrderDetails> orderDetailsList = orderRequest.getOrderDetails();

        // check if order attributes are empty
        if (order.getDescription().toString().isEmpty() || order.getTimestamp() == null) {
            ApiResponse apiResponse = new ApiResponse(false, "Order attributes cannot be empty", null);
            return ResponseEntity.badRequest().body(apiResponse);
        }

        // check if order details are empty
        for (OrderDetails orderDetails : orderDetailsList) {
            if (orderDetails.getDate() == null || orderDetails.getLocation().toString().isEmpty()
                    || orderDetails.getTime_end() == null || orderDetails.getTime_start() == null) {
                ApiResponse apiResponse = new ApiResponse(false, "Order details cannot be empty", null);
                return ResponseEntity.badRequest().body(apiResponse);
            }
        }
        for (OrderDetails orderDetails : orderDetailsList) {
            orderDetailsRepository.save(orderDetails);
        }
        // rabbitTemplate.convertAndSend(topicExchangeName, "order_details.new",
        // convertOrderDetailsToJson(updatedOrder));
        ApiResponse apiResponse = new ApiResponse(true, "Order data updated successfully", updatedOrder);
        return ResponseEntity.ok(apiResponse);
    }

    @GetMapping("/order/list")
    public ResponseEntity getAllOrders() {

        List<Order> orders = orderService.getAllOrders();
        ApiResponse apiResponse = new ApiResponse(true, "Orders retrieved successfully", orders);
        return ResponseEntity.ok(apiResponse);
    }

    @GetMapping("/order/list/{customer_id}")
    public ResponseEntity getOrdersByCustomerId(@PathVariable Long customer_id) {
        List<Order> orders = orderService.getOrdersByCustomerId(customer_id);
        ApiResponse apiResponse = new ApiResponse(true, "Orders retrieved successfully", orders);
        return ResponseEntity.ok(apiResponse);
    }

    @GetMapping("/order/details/{order_id}")
    public ResponseEntity getOrderDetailsById(@PathVariable Long order_id) {
        List<OrderDetails> orderDetails = orderDetailsService.getOrderDetailsById_order(order_id);
        List<Map<String, Object>> orderDetailsWithEvent = new ArrayList<>();

        for (OrderDetails orderDetail : orderDetails) {
            Long orderDetailsId = orderDetail.getId();
            List<Event> events = eventService.findByOrderDetailsId(orderDetailsId);

            List<Map<String, Object>> eventsWithStaff = new ArrayList<>();
            for (Event event : events) {
                Long staffId = event.getStaff_id();
                System.out.println(staffId);
                Optional<Staff> staff = staffService.getStaffById(staffId);
                System.out.println(staff);

                // if staff is null then just replace name with ""
                if (!staff.isEmpty()) {
                    Staff staffGet = staff.get();

                    Map<String, Object> eventMap = new HashMap<>();
                    eventMap.put("event", event);
                    eventMap.put("staffName", staffGet.getName());
                    eventMap.put("staffEmail", staffGet.getEmail());

                    eventsWithStaff.add(eventMap);
                } else {
                    Map<String, Object> eventMap = new HashMap<>();
                    eventMap.put("event", event);
                    eventMap.put("staffName", "");
                    eventMap.put("staffEmail", "");

                    eventsWithStaff.add(eventMap);
                }

            }

            Map<String, Object> orderDetailsMap = new HashMap<>();
            orderDetailsMap.put("orderDetails", orderDetail);
            orderDetailsMap.put("events", eventsWithStaff);

            orderDetailsWithEvent.add(orderDetailsMap);
        }

        ApiResponse apiResponse = new ApiResponse(true, "Order details retrieved successfully", orderDetailsWithEvent);
        return ResponseEntity.ok(apiResponse);
    }

    @GetMapping("/order/lists")
    public ResponseEntity getOrderListWithDetails() {
        List<Order> orders = orderService.getAllOrders();
        List<Map<String, Object>> orderListWithDetails = new ArrayList<>();

        for (Order order : orders) {
            Long clientID = order.getId_client();
            Optional<Client> client = clientService.getClientById(clientID);
            Client clientGet = client.get();
            String clientName = clientGet.getName();
            String clientEmail = clientGet.getEmail();
            List<OrderDetails> orderDetails = orderDetailsService.getOrderDetailsById_order(order.getId());

            Map<String, Object> orderMap = new HashMap<>();
            orderMap.put("order", order);
            orderMap.put("orderDetails", orderDetails);
            orderMap.put("clientName", clientName);
            orderMap.put("clientEmail", clientEmail);

            orderListWithDetails.add(orderMap);
        }

        ApiResponse apiResponse = new ApiResponse(true, "Order list with details retrieved successfully",
                orderListWithDetails);
        return ResponseEntity.ok(apiResponse);
    }

}
