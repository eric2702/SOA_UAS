package com.example.client_svc.models.repos;

import org.springframework.data.jpa.repository.JpaRepository;

import com.example.client_svc.models.entities.Client;

public interface ClientRepository extends JpaRepository<Client, Long> {
}
