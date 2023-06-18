package com.example.order_svc.models.repos;

import org.springframework.data.jpa.repository.JpaRepository;

import com.example.order_svc.models.entities.OrderDetail;

public interface OrderDetailsRepository extends JpaRepository<OrderDetail, Long> {
    // find client by email
    // Order findClientByEmail(String email);
}
