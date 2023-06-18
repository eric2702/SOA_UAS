package com.example.order_svc.models.repos;

import org.springframework.data.jpa.repository.JpaRepository;

import com.example.order_svc.models.entities.Order;

public interface OrderRepository extends JpaRepository<Order, Long> {
    // find client by email
    // Order findClientByEmail(String email);
}
