package com.example.order_svc.models.repos;

import org.springframework.data.jpa.repository.JpaRepository;

import com.example.order_svc.models.entities.Client;

public interface ClientRepository extends JpaRepository<Client, Long> {
    // find client by email
    Client findClientByEmail(String email);
}
