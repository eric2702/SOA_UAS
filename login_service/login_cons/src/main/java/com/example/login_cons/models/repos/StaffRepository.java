package com.example.login_cons.models.repos;

import org.springframework.data.jpa.repository.JpaRepository;

import com.example.login_cons.models.entities.Staff;

public interface StaffRepository extends JpaRepository<Staff, Long> {
    // find client by email
    Staff findClientByEmail(String email);
}
