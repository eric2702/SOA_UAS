package com.example.client_svc;

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
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.stereotype.Component;

import com.example.client_svc.helpers.response.ApiResponse;
import com.example.client_svc.models.entities.Client;
import com.example.client_svc.models.repos.ClientRepository;
import com.example.client_svc.services.ClientService;
import com.fasterxml.jackson.core.JsonProcessingException;
import com.fasterxml.jackson.databind.ObjectMapper;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.*;

@Component
@RestController
public class Sender implements CommandLineRunner {

    static final String topicExchangeName = "eo-exchange";

    private final RabbitTemplate rabbitTemplate;
    private final ClientService clientService;
    private final ClientRepository clientRepository;

    private String convertClientToJson(Client client) {
        ObjectMapper objectMapper = new ObjectMapper();
        try {
            return objectMapper.writeValueAsString(client);
        } catch (JsonProcessingException e) {
            e.printStackTrace();
            return null;
        }
    }

    @Autowired
    public Sender(RabbitTemplate rabbitTemplate, ClientService clientService, ClientRepository clientRepository) {
        this.rabbitTemplate = rabbitTemplate;
        this.clientService = clientService;
        this.clientRepository = clientRepository;
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

    @PostMapping("/client/register")
    public ResponseEntity addClient(@RequestBody Client client) {
        System.out.println("Sending message...");

        Client clientExists = clientRepository.findClientByEmail(client.getEmail());
        if (clientExists != null) {
            ApiResponse response = new ApiResponse(false, "Client already exists");
            return ResponseEntity.badRequest().body(response);
        }

        Client newClient = clientService.addClient(client);
        String clientJson = convertClientToJson(newClient);
        rabbitTemplate.convertAndSend(topicExchangeName, "client.new", clientJson);
        Map<String, Object> respData = new HashMap<>();
        respData.put("id", newClient.getId());
        ApiResponse response = new ApiResponse(true, "Client registered successfully", respData);
        return ResponseEntity.ok(response);
    }

    @PutMapping("/client/data")
    public ResponseEntity updateClientData(@RequestBody Map<String, Object> requestBody) {

        Optional<Client> clientToUpdate = clientService.getClientById(Long.parseLong(requestBody.get("id").toString()));

        if (clientToUpdate.isEmpty()) {
            ApiResponse response = new ApiResponse(false, "Client does not exist");
            return ResponseEntity.badRequest().body(response);
        }

        // convert optional to client
        Client client = clientToUpdate.get();
        client.setName(requestBody.get("name").toString());
        client.setEmail(requestBody.get("email").toString());

        // existingClient.setEmail(client.getEmail());
        // existingClient.setName(client.getName());
        // existingClient.setPassword(client.getPassword());
        Client updatedClient = clientRepository.save(client);
        String clientJson = convertClientToJson(updatedClient);
        rabbitTemplate.convertAndSend(topicExchangeName, "client.changed", clientJson);

        Map<String, Object> respData = new HashMap<>();
        respData.put("id", updatedClient.getId());
        ApiResponse response = new ApiResponse(true, "Client data updated successfully", respData);
        return ResponseEntity.ok(response);
    }

    @PutMapping("/client/password")
    public ResponseEntity updateClientPassword(@RequestBody Map<String, Object> requestBody) {

        Optional<Client> clientToUpdate = clientService.getClientById(Long.parseLong(requestBody.get("id").toString()));

        if (clientToUpdate.isEmpty()) {
            ApiResponse response = new ApiResponse(false, "Client does not exist");
            return ResponseEntity.badRequest().body(response);
        }

        // convert optional to client
        Client client = clientToUpdate.get();

        // get oldPassword and compare it with the one in the database
        String oldPasswordRequest = requestBody.get("oldPassword").toString();
        String oldPasswordRequestHash = encryptPassword(oldPasswordRequest);
        String oldPasswordHash = client.getPassword();

        if (!oldPasswordRequestHash.equals(oldPasswordHash)) {
            ApiResponse response = new ApiResponse(false, "Old password is incorrect!");
            return ResponseEntity.badRequest().body(response);
        }

        client.setPassword(requestBody.get("newPassword").toString());

        // existingClient.setEmail(client.getEmail());
        // existingClient.setName(client.getName());
        // existingClient.setPassword(client.getPassword());
        Client updatedClient = clientService.updateClientData(client);
        String clientJson = convertClientToJson(updatedClient);
        rabbitTemplate.convertAndSend(topicExchangeName, "client.changed", clientJson);

        Map<String, Object> respData = new HashMap<>();
        respData.put("id", updatedClient.getId());
        ApiResponse response = new ApiResponse(true, "Client password updated successfully", respData);
        return ResponseEntity.ok(response);
    }

    @GetMapping("/client/list")
    public ResponseEntity getAllClients() {
        List<Client> clients = clientService.getAllClients();
        // empty list to hold clients without password
        List<Map<String, Object>> clientListWithoutPasswd = new ArrayList<>();
        for (Client client : clients) {
            // get id name and email and put it in a map and add it to the list
            Map<String, Object> clientMapWithoutPasswd = new HashMap<>();

            clientMapWithoutPasswd.put("id", client.getId());
            clientMapWithoutPasswd.put("name", client.getName());
            clientMapWithoutPasswd.put("email", client.getEmail());

            clientListWithoutPasswd.add(clientMapWithoutPasswd);

        }

        ApiResponse response = new ApiResponse(true, "Clients retrieved successfully", clientListWithoutPasswd);
        return ResponseEntity.ok(response);
    }

    @GetMapping("/client/{id}")
    public ResponseEntity getClientById(@PathVariable Long id) {
        Optional<Client> optionalClient = clientService.getClientById(id);
        if (optionalClient.isEmpty()) {
            ApiResponse response = new ApiResponse(false, "Client not found");
            return ResponseEntity.status(HttpStatus.NOT_FOUND).body(response);
        }

        // client without password
        Map<String, Object> clientWithoutPasswd = new HashMap<>();
        clientWithoutPasswd.put("id", optionalClient.get().getId());
        clientWithoutPasswd.put("name", optionalClient.get().getName());
        clientWithoutPasswd.put("email", optionalClient.get().getEmail());

        ApiResponse response = new ApiResponse(true, "Client retrieved successfully", clientWithoutPasswd);
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
