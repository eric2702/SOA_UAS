package com.example.order_svc.helpers.response;

import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.Optional;

import com.fasterxml.jackson.annotation.JsonInclude;

public class ApiResponse {
    private String timestamp = new SimpleDateFormat("yyyy-MM-dd'T'HH:mm:ss.SSSXXX").format(new Date());
    private boolean success;
    private Object message;
    private Object data;

    public ApiResponse(boolean status, Object message, Object data) {
        this.success = status;
        this.message = message;
        this.data = Optional.ofNullable(data).orElse(new Object[0]);
    }

    public ApiResponse(boolean status, Object message) {
        this.success = status;
        this.message = message;
        this.data = new Object[0];
    }

    @JsonInclude(JsonInclude.Include.NON_NULL)
    public boolean getSuccess() {
        return success;
    }

    @JsonInclude(JsonInclude.Include.NON_NULL)
    public Object getMessage() {
        return message;
    }

    @JsonInclude(JsonInclude.Include.NON_NULL)
    public Object getData() {
        return data;
    }

    @JsonInclude(JsonInclude.Include.NON_NULL)
    public String getTimestamp() {
        return timestamp;
    }

}
