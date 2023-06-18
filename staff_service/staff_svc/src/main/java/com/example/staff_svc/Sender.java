package com.example.staff_svc;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

import org.springframework.amqp.rabbit.core.RabbitTemplate;
import org.springframework.boot.CommandLineRunner;
import org.springframework.http.ResponseEntity;
import org.springframework.stereotype.Component;

import com.example.staff_svc.helpers.response.ApiResponse;
import com.example.staff_svc.models.entities.Staff;
import com.example.staff_svc.models.repos.StaffRepository;
import com.example.staff_svc.services.StaffService;
import com.fasterxml.jackson.core.JsonProcessingException;
import com.fasterxml.jackson.databind.ObjectMapper;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.*;

@Component
@RestController
public class Sender implements CommandLineRunner {

    static final String topicExchangeName = "eo-exchange";

    private final RabbitTemplate rabbitTemplate;
    private final StaffService staffService;
    private final StaffRepository staffRepository;

    private String convertStaffToJson(Staff staff) {
        ObjectMapper objectMapper = new ObjectMapper();
        try {
            return objectMapper.writeValueAsString(staff);
        } catch (JsonProcessingException e) {
            e.printStackTrace();
            return null;
        }
    }

    @Autowired
    public Sender(RabbitTemplate rabbitTemplate, StaffService staffService, StaffRepository staffRepository) {
        this.rabbitTemplate = rabbitTemplate;
        this.staffService = staffService;
        this.staffRepository = staffRepository;
    }

    @Override
    public void run(String... args) throws Exception {
        System.out.println("Sending message...");
    }

    @GetMapping("/send/{message}")
    public String sendMessage(@PathVariable String message) {
        System.out.println("Sending message...");
        rabbitTemplate.convertAndSend(topicExchangeName, "foo.bar.baz", message);
        return "Message sent: " + message;
    }

    @PostMapping("/staff/register")
    public ResponseEntity addStaff(@RequestBody Staff staff) {
        System.out.println("Sending message...");

        Staff staffExists = staffRepository.findStaffByEmail(staff.getEmail());
        if (staffExists != null) {
            ApiResponse response = new ApiResponse(false, "Staff already exists");
            return ResponseEntity.badRequest().body(response);
        }
        Staff newStaff = staffService.addStaff(staff);
        String staffJson = convertStaffToJson(newStaff);
        rabbitTemplate.convertAndSend(topicExchangeName, "staff.new", staffJson);
        Map<String, Object> respData = new HashMap<>();
        respData.put("id", newStaff.getId());
        ApiResponse response = new ApiResponse(true, "Staff registered successfully", respData);
        return ResponseEntity.ok(response);
    }

    @PutMapping("/staff/data")
    public ResponseEntity updateStaffData(@RequestBody Staff staff) {
        Staff existingStaff = staffRepository.findById(staff.getId()).orElse(null);
        if (existingStaff == null) {
            ApiResponse response = new ApiResponse(false, "Staff does not exist");
            return ResponseEntity.badRequest().body(response);
        }
        existingStaff.setEmail(staff.getEmail());
        existingStaff.setName(staff.getName());
        existingStaff.setPassword(staff.getPassword());
        Staff updatedStaff = staffRepository.save(existingStaff);
        String staffJson = convertStaffToJson(updatedStaff);
        rabbitTemplate.convertAndSend(topicExchangeName, "staff.changed", staffJson);

        Map<String, Object> respData = new HashMap<>();
        respData.put("id", updatedStaff.getId());
        ApiResponse response = new ApiResponse(true, "Staff data updated successfully", respData);
        return ResponseEntity.ok(response);
    }

    @GetMapping("/staff/list")
    public ResponseEntity getAllStaffs() {
        List<Staff> staffs = staffService.getAllStaffs();
        List<Map<String, Object>> staffListWithoutPasswd = new ArrayList<>();
        for (Staff staff : staffs) {
            // get id name and email and put it in a map and add it to the list
            Map<String, Object> staffMapWithoutPasswd = new HashMap<>();
            staffMapWithoutPasswd.put("id", staff.getId());
            staffMapWithoutPasswd.put("name", staff.getName());
            staffMapWithoutPasswd.put("email", staff.getEmail());
            staffListWithoutPasswd.add(staffMapWithoutPasswd);
        }
        ApiResponse response = new ApiResponse(true, "Staffs retrieved successfully", staffListWithoutPasswd);
        return ResponseEntity.ok(response);
    }
}
