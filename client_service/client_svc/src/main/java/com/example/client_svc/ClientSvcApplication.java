package com.example.client_svc;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;

@SpringBootApplication
public class ClientSvcApplication {

	static final String topicExchangeName = "eo-exchange";

	public static void main(String[] args) throws InterruptedException {
		SpringApplication.run(ClientSvcApplication.class, args);
	}

}
