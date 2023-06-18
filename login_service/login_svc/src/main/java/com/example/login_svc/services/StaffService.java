package com.example.login_svc.services;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.example.login_svc.models.entities.Staff;
import com.example.login_svc.models.repos.StaffRepository;

import java.util.List;
import java.util.Optional;

@Service
public class StaffService {

    private final StaffRepository staffRepository;

    @Autowired
    public StaffService(StaffRepository staffRepository) {
        this.staffRepository = staffRepository;
    }

    public Staff addStaff(Staff staff) {
        return staffRepository.save(staff);
    }

    public Optional<Staff> getStaffById(Long id) {
        return staffRepository.findById(id);
    }

    public List<Staff> getAllStaff() {
        return staffRepository.findAll();
    }

    public Staff updateStaffData(Staff staff) {
        return staffRepository.save(staff);
    }

    public Staff loginStaff(String email, String password) {
        // Perform staff login logic

        Staff staff = staffRepository.findStaffByEmailAndPassword(email, password);

        return staff;
    }
}
