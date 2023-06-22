package com.example.event_svc.models.entities;

import java.sql.Time;

import jakarta.persistence.Column;
import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.Table;

@Table(name = "event")
@Entity
public class Event {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;

    private Time time_start;
    private Time time_end;
    private String description;
    private Long staff_id;
    @Column(name = "order_details_id")
    private Long orderDetailsId;
    @Column(name = "display_order")
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long displayOrder;

    public Event() {
    }

    public Event(Long id, Time time_start, Time time_end, String description, Long staff_id, Long orderDetailsId,
            Long displayOrder) {
        this.id = id;
        this.time_start = time_start;
        this.time_end = time_end;
        this.description = description;
        this.staff_id = staff_id;
        this.orderDetailsId = orderDetailsId;
        this.displayOrder = displayOrder;
    }

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public Time getTime_start() {
        return time_start;
    }

    public void setTime_start(Time time_start) {
        this.time_start = time_start;
    }

    public Time getTime_end() {
        return time_end;
    }

    public void setTime_end(Time time_end) {
        this.time_end = time_end;
    }

    public String getDescription() {
        return description;
    }

    public void setDescription(String description) {
        this.description = description;
    }

    public Long getStaff_id() {
        return staff_id;
    }

    public void setStaff_id(Long staff_id) {
        this.staff_id = staff_id;
    }

    public Long getOrderDetailsId() {
        return orderDetailsId;
    }

    public void setOrderDetailsId(Long orderDetailsId) {
        this.orderDetailsId = orderDetailsId;
    }

    public Long getDisplayOrder() {
        return displayOrder;
    }

    public void setDisplayOrder(Long displayOrder) {
        this.displayOrder = displayOrder;
    }

}
