package com.example.event_cons;

import java.util.Date;
import java.sql.Time;
import java.text.SimpleDateFormat;
import java.time.LocalDate;
import java.time.LocalDateTime;
import java.time.LocalTime;
import java.time.format.DateTimeFormatter;
import java.util.TimeZone;
import java.util.concurrent.CountDownLatch;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Component;

import com.example.event_cons.models.entities.Client;
import com.example.event_cons.models.entities.Order;
import com.example.event_cons.models.entities.OrderDetails;
import com.example.event_cons.models.entities.Staff;
import com.example.event_cons.models.repos.ClientRepository;
import com.example.event_cons.models.repos.OrderDetailsRepository;
import com.example.event_cons.models.repos.OrderRepository;
import com.example.event_cons.models.repos.StaffRepository;
import com.fasterxml.jackson.databind.JsonNode;
import com.fasterxml.jackson.databind.ObjectMapper;

@Component
public class Receiver {

    private CountDownLatch latch = new CountDownLatch(1);
    // private final StaffRepository staffRepository;
    private final ClientRepository clientRepository;
    private final StaffRepository staffRepository;
    private final OrderRepository orderRepository;
    private final OrderDetailsRepository orderDetailsRepository;

    @Autowired
    public Receiver(ClientRepository clientRepository, StaffRepository staffRepository, OrderRepository orderRepository,
            OrderDetailsRepository orderDetailsRepository) {
        // this.staffRepository = staffRepository;
        this.clientRepository = clientRepository;
        this.staffRepository = staffRepository;
        this.orderRepository = orderRepository;
        this.orderDetailsRepository = orderDetailsRepository;
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
        } else if (routingKey.startsWith("order.")) {
            // Handle message with routing key starting with "client."
            // Upload the message to the client table
            uploadToOrderTable(message);
        } else if (routingKey.startsWith("order_details.")) {
            // Handle message with routing key starting with "client."
            // Upload the message to the client table
            uploadToOrderDetailsTable(message);
        } else {
            // Handle other scenarios or log an error
            System.out.println("Unsupported routing key: " + routingKey);
        }
        latch.countDown();

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
            Long id = jsonNode.get("id").asLong();
            String email = jsonNode.get("email").asText();
            String name = jsonNode.get("name").asText();
            Client client = new Client(id, email, name);
            clientRepository.save(client);
            // Example: clientRepository.save(jsonNode);

            System.out.println("Uploaded client: " + jsonNode);
        } catch (Exception e) {
            System.out.println("Failed to upload client: " + e.getMessage());
        }

    }

    private void uploadToOrderTable(String message) {
        System.out.println("Uploading to staff table: " + message);
        try {
            ObjectMapper objectMapper = new ObjectMapper();
            JsonNode jsonNode = objectMapper.readTree(message);

            Long id = jsonNode.get("id").asLong();
            String description = jsonNode.get("description").asText();
            Long id_client = jsonNode.get("id_client").asLong();
            Order order = new Order(id, description, id_client);

            orderRepository.save(order);

            System.out.println("Uploaded staff: " + jsonNode);
        } catch (Exception e) {
            // Handle the exception if JSON parsing or database operation fails
            System.out.println("Failed to upload staff: " + e.getMessage());
        }

    }

    private void uploadToOrderDetailsTable(String message) {
        // Implement your logic to upload the message to the staff table
        System.out.println("Uploading to staff table: " + message);
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

            Long dateLong = jsonNode.get("date").asLong();
            Date date = new Date(dateLong);

            String location = jsonNode.get("location").asText();
            Long id_order = jsonNode.get("id_order").asLong();

            OrderDetails orderDetails = new OrderDetails(id, date, sqlTimeStart, sqlTimeEnd, location, id_order);
            orderDetailsRepository.save(orderDetails);

            System.out.println("Uploaded staff: " + jsonNode);
        } catch (Exception e) {
            System.out.println("Failed to upload staff: " + e.getMessage());
        }

    }

    public CountDownLatch getLatch() {
        return latch;
    }

}
