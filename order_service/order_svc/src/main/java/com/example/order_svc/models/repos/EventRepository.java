package com.example.order_svc.models.repos;

import org.springframework.data.jpa.repository.JpaRepository;

import com.example.order_svc.models.entities.Event;

public interface EventRepository extends JpaRepository<Event, Long> {
    // Event findEventByOrderDetailsId(Long orderDetailsId);

    // find event by order details id
    // Event findEventByOrderDetailsId(Long orderDetailsId);
    Event findByOrderDetailsId(Long orderDetailsId);

}
