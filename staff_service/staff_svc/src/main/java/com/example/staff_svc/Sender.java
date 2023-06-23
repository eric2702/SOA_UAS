package com.example.staff_svc;

import java.nio.charset.StandardCharsets;
import java.security.MessageDigest;
import java.security.NoSuchAlgorithmException;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;
import java.util.Optional;

import org.springframework.amqp.rabbit.core.RabbitTemplate;
import org.springframework.boot.CommandLineRunner;
import org.springframework.boot.autoconfigure.integration.IntegrationProperties.RSocket.Client;
import org.springframework.http.HttpStatus;
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

        // check if any of the fields are empty
        if (staff.getEmail().isEmpty() || staff.getPassword().isEmpty() || staff.getName().isEmpty()) {
            ApiResponse response = new ApiResponse(false, "Please fill in all fields");
            return ResponseEntity.badRequest().body(response);
        }
        // check if email is in email format
        if (!staff.getEmail().matches("^[\\w-\\.]+@([\\w-]+\\.)+[\\w-]{2,4}$")) {
            ApiResponse response = new ApiResponse(false, "Please enter a valid email");
            return ResponseEntity.badRequest().body(response);
        }
        // check if password is at least 8 characters long
        if (staff.getPassword().length() < 8) {
            ApiResponse response = new ApiResponse(false, "Password must be at least 8 characters long");
            return ResponseEntity.badRequest().body(response);
        }

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
    public ResponseEntity updateStaffData(@RequestBody Map<String, Object> requestBody) {
        Optional<Staff> staffToUpdate = staffService.getStaffById(Long.parseLong(requestBody.get("id").toString()));

        // if request name or email is empty
        if (requestBody.get("name").toString().isEmpty() || requestBody.get("email").toString().isEmpty()) {
            ApiResponse response = new ApiResponse(false, "Please fill in all fields");
            return ResponseEntity.badRequest().body(response);
        }

        if (staffToUpdate.isEmpty()) {
            ApiResponse response = new ApiResponse(false, "Staff does not exist");
            return ResponseEntity.badRequest().body(response);
        }

        // convert optional to client
        Staff staff = staffToUpdate.get();
        staff.setName(requestBody.get("name").toString());
        staff.setEmail(requestBody.get("email").toString());

        Staff updatedStaff = staffRepository.save(staff);
        String staffJson = convertStaffToJson(updatedStaff);
        rabbitTemplate.convertAndSend(topicExchangeName, "staff.changed", staffJson);

        Map<String, Object> respData = new HashMap<>();
        respData.put("id", updatedStaff.getId());
        ApiResponse response = new ApiResponse(true, "Staff data updated successfully", respData);
        return ResponseEntity.ok(response);
    }

    @PutMapping("/staff/password")
    public ResponseEntity updateClientPassword(@RequestBody Map<String, Object> requestBody) {

        // if request old password or new password is empty
        if (requestBody.get("oldPassword").toString().isEmpty()
                || requestBody.get("newPassword").toString().isEmpty()) {
            ApiResponse response = new ApiResponse(false, "Please fill in all fields");
            return ResponseEntity.badRequest().body(response);
        }

        Optional<Staff> staffToUpdate = staffService.getStaffById(Long.parseLong(requestBody.get("id").toString()));

        if (staffToUpdate.isEmpty()) {
            ApiResponse response = new ApiResponse(false, "Staff does not exist");
            return ResponseEntity.badRequest().body(response);
        }

        // convert optional to client
        Staff staff = staffToUpdate.get();

        // get oldPassword and compare it with the one in the database
        String oldPasswordRequest = requestBody.get("oldPassword").toString();
        String oldPasswordRequestHash = encryptPassword(oldPasswordRequest);
        String oldPasswordHash = staff.getPassword();

        if (!oldPasswordRequestHash.equals(oldPasswordHash)) {
            ApiResponse response = new ApiResponse(false, "Old password is incorrect!");
            return ResponseEntity.badRequest().body(response);
        }

        staff.setPassword(requestBody.get("newPassword").toString());

        Staff updatedStaff = staffService.updateStaffData(staff);
        String clientJson = convertStaffToJson(updatedStaff);
        rabbitTemplate.convertAndSend(topicExchangeName, "staff.changed", clientJson);

        Map<String, Object> respData = new HashMap<>();
        respData.put("id", updatedStaff.getId());
        ApiResponse response = new ApiResponse(true, "Staff password updated successfully", respData);
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

    @GetMapping("/staff/{id}")
    public ResponseEntity getStaffById(@PathVariable Long id) {
        Optional<Staff> optionalStaff = staffService.getStaffById(id);
        if (optionalStaff.isEmpty()) {
            ApiResponse response = new ApiResponse(false, "Staff not found");
            return ResponseEntity.status(HttpStatus.NOT_FOUND).body(response);
        }

        Staff staff = optionalStaff.get();
        ApiResponse response = new ApiResponse(true, "Staff retrieved successfully", staff);
        return ResponseEntity.ok(response);
    }

    public static String encryptPassword(String password) {
        try {
            MessageDigest digest = MessageDigest.getInstance("SHA-256");
            byte[] encodedHash = digest.digest(password.getBytes(StandardCharsets.UTF_8));

            // Convert the byte array to a hexadecimal string representation
            StringBuilder hexString = new StringBuilder();
            for (byte b : encodedHash) {
                String hex = Integer.toHexString(0xff & b);
                if (hex.length() == 1) {
                    hexString.append('0');
                }
                hexString.append(hex);
            }
            return hexString.toString();
        } catch (NoSuchAlgorithmException e) {
            e.printStackTrace();
        }
        return null;
    }

}
