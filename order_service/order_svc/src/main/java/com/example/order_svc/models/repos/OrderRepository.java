package com.example.order_svc.models.repos;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;

import com.example.order_svc.models.entities.Order;

public interface OrderRepository extends JpaRepository<Order, Long> {
    // find client by email
    // Order findClientByEmail(String email);
    @Query(value = "SELECT * FROM orders WHERE id_client = ?1", nativeQuery = true)
    List<Order> findOrderByClientId(Long clientId);
}
