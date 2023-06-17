package com.example.event_svc;

import java.util.List;
import java.util.concurrent.TimeUnit;

import org.springframework.amqp.rabbit.core.RabbitTemplate;
import org.springframework.boot.CommandLineRunner;
import org.springframework.stereotype.Component;

import com.example.event_svc.models.entities.Client;
import com.example.event_svc.models.repos.ClientRepository;
import com.example.event_svc.services.ClientService;

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
        // check if client already exists
        Client clientExists = clientRepository.findClientByEmail(client.getEmail());
        if (clientExists != null) {
            return clientExists;
        }
        // convert client to json
        Client new_client = clientService.addClient(client);

        rabbitTemplate.convertAndSend(topicExchangeName, "foo.bar.baz", new_client.toString());

        return new_client;
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
