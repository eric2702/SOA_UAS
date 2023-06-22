package com.example.event_svc.models.repos;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Query;

import com.example.event_svc.models.entities.Event;

public interface EventRepository extends JpaRepository<Event, Long> {
    // Event findEventByOrderDetailsId(Long orderDetailsId);

    // find event by order details id
    // Event findEventByOrderDetailsId(Long orderDetailsId);
    Event findByOrderDetailsId(Long orderDetailsId);

    // @Query("SELECT * FROM event WHERE orderDetailsId = ?1 ORDER BY displayOrder")
    // List<Event> findByOrderDetailsIdOrderByDisplayOrder(Long orderDetailsId);

    @Query("SELECT max(e.displayOrder) FROM Event e WHERE e.orderDetailsId = ?1")
    Integer findByOrderDetailsIdOrderByDisplayOrder(Long orderDetailsId);

}
