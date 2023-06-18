package com.example.login_svc;

import java.util.HashMap;
import java.util.List;
import java.util.concurrent.TimeUnit;

import org.springframework.amqp.rabbit.core.RabbitTemplate;
import org.springframework.boot.CommandLineRunner;
import org.springframework.http.ResponseEntity;
import org.springframework.stereotype.Component;

import com.example.login_svc.helpers.response.ApiResponse;
import com.example.login_svc.models.entities.Client;
import com.example.login_svc.models.entities.Staff;
import com.example.login_svc.models.repos.ClientRepository;
import com.example.login_svc.models.repos.StaffRepository;
import com.example.login_svc.services.ClientService;
import com.example.login_svc.services.StaffService;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.CommandLineRunner;
import org.springframework.stereotype.Component;
import org.springframework.web.bind.annotation.*;

@Component
@RestController
public class Sender implements CommandLineRunner {

    static final String topicExchangeName = "eo-exchange";

    private final RabbitTemplate rabbitTemplate;
    private final ClientService clientService;
    private final StaffService staffService;
    private final ClientRepository clientRepository;
    private final StaffRepository staffRepository;

    @Autowired
    public Sender(RabbitTemplate rabbitTemplate, ClientService clientService, StaffService staffService,
            ClientRepository clientRepository, StaffRepository staffRepository) {
        this.rabbitTemplate = rabbitTemplate;
        this.clientService = clientService;
        this.staffService = staffService;
        this.clientRepository = clientRepository;
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

    @PostMapping("/client/login")
    public ResponseEntity clientLogin(@RequestBody Client client) {
        System.out.println("Client Login: " + client.getEmail() + ", " + client.getPassword());

        // Perform client login logic
        // Example: Validate credentials and return the client object if login is
        // successful
        Client loggedInClient = clientService.loginClient(client.getEmail(), client.getPassword());

        if (loggedInClient != null) {
            // Client login successful, send a message to the topic exchange
            HashMap<String, String> data = new HashMap<>();
            data.put("id", loggedInClient.getId().toString());
            ApiResponse apiResponse = new ApiResponse(true, "Client login successful", data);
            return ResponseEntity.ok(apiResponse);
        }
        ApiResponse apiResponse = new ApiResponse(false, "Client login failed");
        return ResponseEntity.status(401).body(apiResponse);
    }

    @PostMapping("/staff/login")
    public ResponseEntity staffLogin(@RequestBody Staff staff) {
        System.out.println("Staff Login: " + staff.getEmail() + ", " + staff.getPassword());

        // Perform staff login logic
        // Example: Validate credentials and return the staff object if login is
        // successful
        Staff loggedInStaff = staffService.loginStaff(staff.getEmail(), staff.getPassword());

        if (loggedInStaff != null) {
            // Staff login successful, send a message to the topic exchange
            HashMap<String, String> data = new HashMap<>();
            data.put("id", loggedInStaff.getId().toString());
            ApiResponse apiResponse = new ApiResponse(true, "Staff login successful", data);
            return ResponseEntity.ok(apiResponse);
        }

        return ResponseEntity.status(401).body(new ApiResponse(false, "Staff login failed"));
    }

    @PutMapping("/client/data")
    public Client updateClientData(@RequestBody Client client) {
        return clientService.updateClientData(client);
    }

    @GetMapping("/client/list")
    public List<Client> getAllClients() {
        return clientService.getAllClients();
    }
}
