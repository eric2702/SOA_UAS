package com.example.event_cons;

import org.springframework.amqp.core.Binding;
import org.springframework.amqp.core.BindingBuilder;
import org.springframework.amqp.core.Queue;
import org.springframework.amqp.core.TopicExchange;
import org.springframework.amqp.rabbit.connection.ConnectionFactory;
import org.springframework.amqp.rabbit.listener.SimpleMessageListenerContainer;
import org.springframework.amqp.rabbit.listener.adapter.MessageListenerAdapter;
import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.context.annotation.Bean;

import java.util.UUID;

@SpringBootApplication
public class EventConsApplication {

	static final String topicExchangeName = "eo-exchange";

	@Bean
	Queue queue() {
		String queueName = UUID.randomUUID().toString(); // Generate a random queue name
		return new Queue(queueName, true);
	}

	@Bean
	TopicExchange exchange() {
		return new TopicExchange(topicExchangeName);
	}

	@Bean
	Binding binding1(Queue queue, TopicExchange exchange) {
		return BindingBuilder.bind(queue).to(exchange).with("client.#");
	}

	@Bean
	Binding binding2(Queue queue, TopicExchange exchange) {
		return BindingBuilder.bind(queue).to(exchange).with("staff.#");
	}

	@Bean
	Binding binding3(Queue queue, TopicExchange exchange) {
		return BindingBuilder.bind(queue).to(exchange).with("order.#");
	}

	@Bean
	SimpleMessageListenerContainer container(ConnectionFactory connectionFactory,
			MessageListenerAdapter listenerAdapter, Queue queue) {
		SimpleMessageListenerContainer container = new SimpleMessageListenerContainer();
		container.setConnectionFactory(connectionFactory);
		container.setQueueNames(queue.getName()); // Use the dynamic queue name
		container.setMessageListener(listenerAdapter);
		return container;
	}

	@Bean
	MessageListenerAdapter listenerAdapter(Receiver receiver) {
		return new MessageListenerAdapter(receiver, "receiveMessage");
	}

	public static void main(String[] args) throws InterruptedException {
		SpringApplication.run(EventConsApplication.class, args);
	}

}
