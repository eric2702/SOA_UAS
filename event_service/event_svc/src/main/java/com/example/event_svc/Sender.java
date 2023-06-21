package com.example.event_svc;

import java.util.List;
import java.util.concurrent.TimeUnit;

import org.springframework.amqp.rabbit.core.RabbitTemplate;
import org.springframework.boot.CommandLineRunner;
import org.springframework.http.ResponseEntity;
import org.springframework.stereotype.Component;

import com.example.event_svc.helpers.response.ApiResponse;
import com.example.event_svc.models.entities.Event;
import com.example.event_svc.models.repos.EventRepository;
import com.example.event_svc.services.EventService;
import com.fasterxml.jackson.core.JsonProcessingException;
import com.fasterxml.jackson.databind.ObjectMapper;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.*;

@Component
@RestController
public class Sender implements CommandLineRunner {

    static final String topicExchangeName = "eo-exchange";

    private final RabbitTemplate rabbitTemplate;
    private final EventService eventService;
    private final EventRepository eventRepository;

    @Autowired
    public Sender(RabbitTemplate rabbitTemplate, EventService eventService, EventRepository eventRepository) {
        this.rabbitTemplate = rabbitTemplate;
        this.eventService = eventService;
        this.eventRepository = eventRepository;
    }

    @Override
    public void run(String... args) throws Exception {
        System.out.println("Sending message...");
    }

    @GetMapping("/send/{message}")
    public String sendMessage(@PathVariable String message) {
        System.out.println("Sending message...");
        rabbitTemplate.convertAndSend(topicExchangeName, "event.new", message);
        return "Message sent: " + message;
    }

    @PostMapping("/event/add")
    public ResponseEntity addEvent(@RequestBody Event event) {
        System.out.println("Sending message...");

        Event new_event = eventService.addEvent(event);

        rabbitTemplate.convertAndSend(topicExchangeName, "event.new", convertEventToJson(new_event));

        ApiResponse apiResponse = new ApiResponse(true, "event added successfully", new_event);
        return ResponseEntity.ok(apiResponse);
    }

    @PostMapping("/event/add/multiple")
    public ResponseEntity addMultipleEvents(@RequestBody List<Event> events) {
        System.out.println("Sending message...");

        List<Event> new_events = eventService.addMultipleEvents(events);

        for (Event event : new_events) {
            rabbitTemplate.convertAndSend(topicExchangeName, "event.new", convertEventToJson(event));
        }

        ApiResponse apiResponse = new ApiResponse(true, "events added successfully", new_events);
        return ResponseEntity.ok(apiResponse);
    }

    @PutMapping("/event/data")
    public ResponseEntity updateEventData(@RequestBody Event event) {
        Event updatedEvent = eventService.updateEventData(event);
        ApiResponse apiResponse = new ApiResponse(true, "event updated successfully", updatedEvent);
        return ResponseEntity.ok(apiResponse);
    }

    @GetMapping("/event/list")
    public ResponseEntity getAllEvents() {
        List<Event> events = eventService.getAllEvents();
        ApiResponse apiResponse = new ApiResponse(true, "events retrieved successfully", events);
        return ResponseEntity.ok(apiResponse);
    }

    @GetMapping("/event/{id}")
    public ResponseEntity getEventById(@PathVariable Long id) {
        Event event = eventService.getEventById(id).orElse(null);
        ApiResponse apiResponse = new ApiResponse(true, "event retrieved successfully", event);
        return ResponseEntity.ok(apiResponse);
    }

    @GetMapping("/event/order/{id}")
    public ResponseEntity getEventByOrderId(@PathVariable Long id) {
        Event event = eventRepository.findByOrderDetailsId(id);
        ApiResponse apiResponse = new ApiResponse(true, "event retrieved successfully", event);
        return ResponseEntity.ok(apiResponse);
    }

    private String convertEventToJson(Event event) {
        ObjectMapper objectMapper = new ObjectMapper();
        try {
            return objectMapper.writeValueAsString(event);
        } catch (JsonProcessingException e) {
            e.printStackTrace();
            return null;
        }
    }

}
