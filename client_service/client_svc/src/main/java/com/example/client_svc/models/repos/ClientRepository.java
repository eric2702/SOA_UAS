package com.example.client_svc.models.repos;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import com.example.client_svc.models.entities.Client;

@Repository
public interface ClientRepository extends JpaRepository<Client, Long> {
}
