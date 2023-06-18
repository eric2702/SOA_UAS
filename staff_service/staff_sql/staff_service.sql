-- Create the database
CREATE DATABASE eo_db;

-- Connect to the database
USE eo_db;

-- Create the staff table
CREATE TABLE staff (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Insert sample data into the staff table
INSERT INTO staff (email, name, password)
VALUES ('john@example.com', 'John Doe', 'password123'),
       ('jane@example.com', 'Jane Smith', 'qwerty456'),
       ('alex@example.com', 'Alex Johnson', 'secure789');
