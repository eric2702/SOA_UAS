package com.example.staff_svc.models.repos;

import org.springframework.data.jpa.repository.JpaRepository;

import com.example.staff_svc.models.entities.Staff;

public interface StaffRepository extends JpaRepository<Staff, Long> {
    Staff findStaffByEmail(String email);
}
