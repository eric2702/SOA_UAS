package com.example.event_cons.models.repos;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;

import com.example.event_cons.models.entities.OrderDetails;

public interface OrderDetailsRepository extends JpaRepository<OrderDetails, Long> {
    // find client by email
    // Order findClientByEmail(String email);

    // find orderdetails by orderid
    @Query(value = "SELECT * FROM order_details WHERE id_order = ?1", nativeQuery = true)
    List<OrderDetails> findByOrderId(Long orderId);
}
