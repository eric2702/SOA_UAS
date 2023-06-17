package com.example.login_svc.models.repos;

import org.springframework.data.jpa.repository.JpaRepository;

import com.example.login_svc.models.entities.Client;

public interface ClientRepository extends JpaRepository<Client, Long> {
    // find client by email
    Client findClientByEmail(String email);
}
