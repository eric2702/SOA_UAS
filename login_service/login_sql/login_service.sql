-- Create the database
CREATE DATABASE eo_db;

-- Connect to the database
USE eo_db;

-- Create the client table
CREATE TABLE client (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Insert sample data into the client table
INSERT INTO client (email, password)
VALUES ('john@example.com', 'password123'),
       ('jane@example.com', 'qwerty456'),
       ('alex@example.com', 'secure789');

CREATE TABLE staff (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Insert sample data into the staff table
INSERT INTO staff (email, password)
VALUES ('john@example.com', 'password123'),
       ('jane@example.com', 'qwerty456'),
       ('alex@example.com', 'secure789');
