package com.example.order_svc.models.entities;

import java.util.List;

public class OrderRequest {
    private Order order;
    private List<OrderDetails> orderDetails;

    public OrderRequest() {
    }

    public OrderRequest(Order order, List<OrderDetails> orderDetails) {
        this.order = order;
        this.orderDetails = orderDetails;
    }

    public Order getOrder() {
        return order;
    }

    public void setOrder(Order order) {
        this.order = order;
    }

    public List<OrderDetails> getOrderDetails() {
        return orderDetails;
    }

    public void setOrderDetails(List<OrderDetails> orderDetails) {
        this.orderDetails = orderDetails;
    }

    // Constructor, getters, and setters

}
