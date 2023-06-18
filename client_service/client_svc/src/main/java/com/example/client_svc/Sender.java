package com.example.client_svc;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

import org.springframework.amqp.rabbit.core.RabbitTemplate;
import org.springframework.boot.CommandLineRunner;
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
    public ResponseEntity updateClientData(@RequestBody Client client) {
        Client existingClient = clientRepository.findById(client.getId()).orElse(null);
        if (existingClient == null) {
            ApiResponse response = new ApiResponse(false, "Client does not exist");
            return ResponseEntity.badRequest().body(response);
        }
        existingClient.setEmail(client.getEmail());
        existingClient.setName(client.getName());
        existingClient.setPassword(client.getPassword());
        Client updatedClient = clientRepository.save(existingClient);
        String clientJson = convertClientToJson(updatedClient);
        rabbitTemplate.convertAndSend(topicExchangeName, "client.changed", clientJson);

        Map<String, Object> respData = new HashMap<>();
        respData.put("id", updatedClient.getId());
        ApiResponse response = new ApiResponse(true, "Client data updated successfully", respData);
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
}
