package com.example.client_svc;

import java.util.List;

import org.springframework.amqp.rabbit.core.RabbitTemplate;
import org.springframework.boot.CommandLineRunner;
import org.springframework.stereotype.Component;

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
    public Client addClient(@RequestBody Client client) {
        System.out.println("Sending message...");

        Client clientExists = clientRepository.findClientByEmail(client.getEmail());
        if (clientExists != null) {
            return clientExists;
        }
        Client newClient = clientService.addClient(client);
        String clientJson = convertClientToJson(newClient);
        rabbitTemplate.convertAndSend(topicExchangeName, "client.new", clientJson);

        return newClient;
    }

    private String convertClientToJson(Client client) {
        ObjectMapper objectMapper = new ObjectMapper();
        try {
            return objectMapper.writeValueAsString(client);
        } catch (JsonProcessingException e) {
            e.printStackTrace();
            return null;
        }
    }

    @PutMapping("/client/data")
    public Client updateClientData(@RequestBody Client client) {
        Client existingClient = clientRepository.findById(client.getId()).orElse(null);
        if (existingClient == null) {
            throw new RuntimeException("Client not found");
        }
        Client clientExists = clientRepository.findClientByEmail(client.getEmail());
        if (clientExists != null) {
            return clientExists;
        }
        existingClient.setEmail(client.getEmail());
        existingClient.setName(client.getName());
        existingClient.setPassword(client.getPassword());
        Client updatedClient = clientRepository.save(existingClient);
        String clientJson = convertClientToJson(updatedClient);
        rabbitTemplate.convertAndSend(topicExchangeName, "client.changed", clientJson);

        return updatedClient;
    }

    @GetMapping("/client/list")
    public List<Client> getAllClients() {
        return clientService.getAllClients();
    }
}
