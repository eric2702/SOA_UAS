package com.example.order_svc;

import java.util.List;

import org.springframework.amqp.rabbit.core.RabbitTemplate;
import org.springframework.boot.CommandLineRunner;
import org.springframework.stereotype.Component;

import com.example.order_svc.models.entities.Order;
import com.example.order_svc.models.repos.OrderRepository;
import com.example.order_svc.services.OrderService;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.*;

@Component
@RestController
public class Sender implements CommandLineRunner {

    static final String topicExchangeName = "eo-exchange";

    private final RabbitTemplate rabbitTemplate;
    private final OrderService orderService;
    private final OrderRepository orderRepository;

    @Autowired
    public Sender(RabbitTemplate rabbitTemplate, OrderService orderService, OrderRepository orderRepository) {
        this.rabbitTemplate = rabbitTemplate;
        this.orderService = orderService;
        this.orderRepository = orderRepository;
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

    @PostMapping("/order/register")
    public Order addClient(@RequestBody Order client) {
        System.out.println("Sending message...");
        // check if client already exists
        // Order clientExists = orderRepository.findClientByEmail(client.getEmail());
        // if (clientExists != null) {
        // return clientExists;
        // }
        // convert client to json
        Order new_client = orderService.addOrder(client);

        rabbitTemplate.convertAndSend(topicExchangeName, "foo.bar.baz", new_client.toString());

        return new_client;
    }

    @PutMapping("/order/data")
    public Order updateClientData(@RequestBody Order client) {
        return orderService.updateOrderData(client);
    }

    @GetMapping("/order/list")
    public List<Order> getAllClients() {
        return orderService.getAllOrders();
    }
}
