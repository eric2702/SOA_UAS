-- Create the database
CREATE DATABASE eo_db;

-- Connect to the database
USE eo_db;

-- Create the client table
CREATE TABLE `order` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_client INT NOT NULL,
    description VARCHAR(255) NOT NULL,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE order_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_order INT NOT NULL,
    date DATE NOT NULL,
    time_start TIME NOT NULL,
    time_end TIME NOT NULL,
    location VARCHAR(255) NOT NULL
);
