package com.example.order_svc.services;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.example.order_svc.models.entities.Order;
import com.example.order_svc.models.entities.OrderDetails;
import com.example.order_svc.models.repos.OrderDetailsRepository;

import java.util.List;
import java.util.Optional;

@Service
public class OrderDetailsService {

    private final OrderDetailsRepository orderDetailsRepository;

    @Autowired
    public OrderDetailsService(OrderDetailsRepository orderRepository) {
        this.orderDetailsRepository = orderRepository;
    }

    public OrderDetails addOrder(OrderDetails order) {

        return orderDetailsRepository.save(order);
    }

    public Optional<OrderDetails> getOrderById(Long id) {
        return orderDetailsRepository.findById(id);
    }

    public List<OrderDetails> getAllOrders() {
        return orderDetailsRepository.findAll();
    }

    public OrderDetails updateOrderData(OrderDetails order) {
        return orderDetailsRepository.save(order);
    }
}
