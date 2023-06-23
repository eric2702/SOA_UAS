package com.example.order_cons;

import java.sql.Time;
import java.time.LocalTime;
import java.time.format.DateTimeFormatter;
import java.util.Date;
import java.util.concurrent.CountDownLatch;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Component;

import com.example.order_cons.models.entities.Client;
import com.example.order_cons.models.entities.Event;
import com.example.order_cons.models.entities.Staff;
import com.example.order_cons.models.repos.ClientRepository;
import com.example.order_cons.models.repos.EventRepository;
import com.example.order_cons.models.repos.StaffRepository;
import com.fasterxml.jackson.databind.JsonNode;
import com.fasterxml.jackson.databind.ObjectMapper;

@Component
public class Receiver {

    private CountDownLatch latch = new CountDownLatch(1);
    // private final StaffRepository staffRepository;
    private final ClientRepository clientRepository;
    private final StaffRepository staffRepository;
    private final EventRepository eventRepository;

    @Autowired
    public Receiver(ClientRepository clientRepository, StaffRepository staffRepository,
            EventRepository eventRepository) {
        // this.staffRepository = staffRepository;
        this.clientRepository = clientRepository;
        this.staffRepository = staffRepository;
        this.eventRepository = eventRepository;
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
        } else if (routingKey.startsWith("event.")) {
            if (routingKey.startsWith("event.deleted")) {
                deleteFromEventTable(message);
            } else {
                // Handle message with routing key starting with "client."
                // Upload the message to the client table
                uploadToEventTable(message);
            }

        } else {
            // Handle other scenarios or log an error
            System.out.println("Unsupported routing key: " + routingKey);
        }
        latch.countDown();

    }

    private void deleteFromEventTable(String message) {
        // Implement your logic to upload the message to the staff table
        System.out.println("Deleting from event table: " + message);
        try {
            ObjectMapper objectMapper = new ObjectMapper();
            JsonNode jsonNode = objectMapper.readTree(message);

            // Use the jsonNode object to perform operations on the JSON data
            // For example, you can extract values using jsonNode.get("property")
            // or iterate over the fields using jsonNode.fields()

            // Perform your database upload operation here
            Long id = jsonNode.get("id").asLong();
            eventRepository.deleteById(id);
            // Example: clientRepository.save(jsonNode);

            System.out.println("Deleted event: " + jsonNode);
        } catch (Exception e) {
            // Handle the exception if JSON parsing or database operation fails
            System.out.println("Failed to delete event: " + e.getMessage());
        }

    }

    private void uploadToStaffTable(String message) {
        // Implement your logic to upload the message to the staff table
        System.out.println("Uploading to staff table: " + message);
        try {
            ObjectMapper objectMapper = new ObjectMapper();
            JsonNode jsonNode = objectMapper.readTree(message);

            // Use the jsonNode object to perform operations on the JSON data
            // For example, you can extract values using jsonNode.get("property")
            // or iterate over the fields using jsonNode.fields()

            // Perform your database upload operation here
            Long id = jsonNode.get("id").asLong();
            String email = jsonNode.get("email").asText();
            String name = jsonNode.get("name").asText();
            Staff staff = new Staff(id, email, name);
            staffRepository.save(staff);
            // Example: clientRepository.save(jsonNode);

            System.out.println("Uploaded staff: " + jsonNode);
        } catch (Exception e) {
            // Handle the exception if JSON parsing or database operation fails
            System.out.println("Failed to upload staff: " + e.getMessage());
        }

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
            String name = jsonNode.get("name").asText();
            Client client = new Client(id, email, name);
            clientRepository.save(client);
            // Example: clientRepository.save(jsonNode);

            System.out.println("Uploaded client: " + jsonNode);
        } catch (Exception e) {
            // Handle the exception if JSON parsing or database operation fails
            System.out.println("Failed to upload client: " + e.getMessage());
        }

    }

    private void uploadToEventTable(String message) {
        // Implement your logic to upload the message to the staff table
        System.out.println("Uploading to event table: " + message);
        try {
            ObjectMapper objectMapper = new ObjectMapper();
            JsonNode jsonNode = objectMapper.readTree(message);
            Long id = jsonNode.get("id").asLong();

            String startTimeString = jsonNode.get("time_start").asText();
            LocalTime timeStart = LocalTime.parse(startTimeString, DateTimeFormatter.ofPattern("HH:mm:ss"));

            String endTimeString = jsonNode.get("time_end").asText();
            LocalTime timeEnd = LocalTime.parse(endTimeString, DateTimeFormatter.ofPattern("HH:mm:ss"));
            Time sqlTimeStart = Time.valueOf(timeStart);
            Time sqlTimeEnd = Time.valueOf(timeEnd);

            String description = jsonNode.get("description").asText();

            Long staff_id = jsonNode.get("staff_id").asLong();
            Long orderDetailsId = jsonNode.get("orderDetailsId").asLong();
            Long display_order = jsonNode.get("displayOrder").asLong();

            Event event = new Event(id, sqlTimeStart, sqlTimeEnd, description,
                    staff_id, orderDetailsId, display_order);
            eventRepository.save(event);

            System.out.println("Uploaded event: " + jsonNode);
        } catch (Exception e) {
            System.out.println("Failed to upload event: " + e.getMessage());
        }

    }

    public CountDownLatch getLatch() {
        return latch;
    }

}
