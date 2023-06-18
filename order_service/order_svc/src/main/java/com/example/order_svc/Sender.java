package com.example.order_svc;

import java.util.HashMap;
import java.util.List;

import org.springframework.amqp.rabbit.core.RabbitTemplate;
import org.springframework.boot.CommandLineRunner;
import org.springframework.http.ResponseEntity;
import org.springframework.stereotype.Component;

import com.example.order_svc.helpers.response.ApiResponse;
import com.example.order_svc.models.entities.Order;
import com.example.order_svc.models.entities.OrderDetails;
import com.example.order_svc.models.entities.OrderRequest;
import com.example.order_svc.models.repos.OrderDetailsRepository;
import com.example.order_svc.models.repos.OrderRepository;
import com.example.order_svc.services.OrderDetailsService;
import com.example.order_svc.services.OrderService;
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
            OrderDetailsRepository orderDetailsRepository, OrderDetailsService orderDetailsService) {
        this.rabbitTemplate = rabbitTemplate;
        this.orderService = orderService;
        this.orderRepository = orderRepository;
        this.orderDetailsRepository = orderDetailsRepository;
        this.orderDetailsService = orderDetailsService;
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
        for (OrderDetails orderDetails : orderDetailsList) {
            orderDetailsRepository.save(orderDetails);
        }
        ApiResponse apiResponse = new ApiResponse(true, "Order data updated successfully", updatedOrder);
        return ResponseEntity.ok(apiResponse);
    }

    @GetMapping("/order/list")
    public ResponseEntity getAllOrders() {

        List<Order> orders = orderService.getAllOrders();
        ApiResponse apiResponse = new ApiResponse(true, "Orders retrieved successfully", orders);
        return ResponseEntity.ok(apiResponse);
    }

    @GetMapping("/order/details/{order_id}")
    public ResponseEntity getOrderDetailsById(@PathVariable Long order_id) {
        List<OrderDetails> orderDetails = orderDetailsService.getOrderDetailsById_order(order_id);
        ApiResponse apiResponse = new ApiResponse(true, "Order details retrieved successfully", orderDetails);
        return ResponseEntity.ok(apiResponse);
    }

}
