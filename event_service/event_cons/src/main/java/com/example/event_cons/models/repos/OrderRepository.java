package com.example.event_cons.models.repos;

import org.springframework.data.jpa.repository.JpaRepository;

import com.example.event_cons.models.entities.Order;

public interface OrderRepository extends JpaRepository<Order, Long> {
    // find client by email
    // Order findClientByEmail(String email);
}
