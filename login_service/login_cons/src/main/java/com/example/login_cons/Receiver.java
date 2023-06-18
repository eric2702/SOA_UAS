package com.example.login_cons;

import java.util.concurrent.CountDownLatch;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Component;

import com.example.login_cons.models.entities.Client;
import com.example.login_cons.models.repos.ClientRepository;
import com.fasterxml.jackson.databind.JsonNode;
import com.fasterxml.jackson.databind.ObjectMapper;

@Component
public class Receiver {

    private CountDownLatch latch = new CountDownLatch(1);
    // private final StaffRepository staffRepository;
    private final ClientRepository clientRepository;

    @Autowired
    public Receiver(ClientRepository clientRepository) {
        // this.staffRepository = staffRepository;
        this.clientRepository = clientRepository;
    }

    public void receiveMessage(String message, String routingKey) {
        if (routingKey.startsWith("staff.")) {
            // Handle message with routing key starting with "staff."
            // Upload the message to the staff table
            uploadToStaffTable(message);
        } else if (routingKey.startsWith("client.")) {
            // Handle message with routing key starting with "client."
            // Upload the message to the client table
            uploadToClientTable(message);
        } else {
            // Handle other scenarios or log an error
            System.out.println("Unsupported routing key: " + routingKey);
        }
        latch.countDown();

    }

    private void uploadToStaffTable(String message) {
        // Implement your logic to upload the message to the staff table
        System.out.println("Uploading to staff table: " + message);
    }

    private void uploadToClientTable(String message) {
        // Implement your logic to upload the message to the client table
        System.out.println("Uploading to client table: " + message);
        // convert string message json to json object
        try {
            ObjectMapper objectMapper = new ObjectMapper();
            JsonNode jsonNode = objectMapper.readTree(message);

            // Use the jsonNode object to perform operations on the JSON data
            // For example, you can extract values using jsonNode.get("property")
            // or iterate over the fields using jsonNode.fields()

            // Perform your database upload operation here
            Long id = jsonNode.get("id").asLong();
            String email = jsonNode.get("email").asText();
            String password = jsonNode.get("password").asText();
            Client client = new Client(id, email, password);
            clientRepository.save(client);
            // Example: clientRepository.save(jsonNode);

            System.out.println("Uploaded client: " + jsonNode);
        } catch (Exception e) {
            // Handle the exception if JSON parsing or database operation fails
            System.out.println("Failed to upload client: " + e.getMessage());
        }

    }

    public CountDownLatch getLatch() {
        return latch;
    }

}
