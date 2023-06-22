package com.example.order_svc.models.repos;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;

import com.example.order_svc.models.entities.Event;

public interface EventRepository extends JpaRepository<Event, Long> {
    // Event findEventByOrderDetailsId(Long orderDetailsId);

    // find event by order details id
    // Event findEventByOrderDetailsId(Long orderDetailsId);

    // find event by order details id sorting by display order
    List<Event> findByOrderDetailsIdOrderByDisplayOrder(Long orderDetailsId);
    // List<Event> findByOrderDetailsId(Long orderDetailsId);

}
