package com.example.order_svc.models.repos;

import org.springframework.data.jpa.repository.JpaRepository;

import com.example.order_svc.models.entities.Staff;

public interface StaffRepository extends JpaRepository<Staff, Long> {
    // find client by email
    Staff findClientByEmail(String email);
}
