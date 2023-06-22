
-- Create the database
CREATE DATABASE eo_db;

-- Connect to the database
USE eo_db;

-- Create the client table
CREATE TABLE client (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL
);

INSERT INTO client (email, name)
VALUES ('john@example.com', 'John Doe'),
       ('jane@example.com', 'Jane Smith'),
       ('alex@example.com', 'Alex Johnson');

CREATE TABLE event (
    id INT AUTO_INCREMENT PRIMARY KEY,
    time_start TIME,
    time_end TIME,
    description VARCHAR(255),
    staff_id INT,
    order_details_id INT,
    display_order INT
);

INSERT INTO event (time_start, time_end, description, staff_id, order_details_id, display_order) VALUES
('09:00:00', '12:00:00', 'Event 1 description', 1, 1, 1),
('14:00:00', '16:00:00', 'Event 2 description', 2, 2, 2),
('10:30:00', '13:30:00', 'Event 3 description', 3, 3, 3);

CREATE TABLE staff (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL
);

INSERT INTO staff (email, name)
VALUES ('john@example.com', 'John Doe'),
       ('jane@example.com', 'Jane Smith'),
       ('alex@example.com', 'Alex Johnson');

-- Create the client table
CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_client INT NOT NULL,
    description VARCHAR(255) NOT NULL,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    is_done BOOLEAN DEFAULT FALSE
);

-- Insert sample data into the orders table
INSERT INTO orders (id_client, description) VALUES
(1, 'Order 1 description'),
(2, 'Order 2 description'),
(3, 'Order 3 description');


CREATE TABLE order_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_order INT NOT NULL,
    date DATE NOT NULL,
    time_start TIME NOT NULL,
    time_end TIME NOT NULL,
    location VARCHAR(255) NOT NULL
);

INSERT INTO order_details (id_order, date, time_start, time_end, location) VALUES
(1, '2023-06-01', '09:00:00', '12:00:00', 'Location 1'),
(2, '2023-06-02', '14:00:00', '16:00:00', 'Location 2'),
(3, '2023-06-03', '10:30:00', '13:30:00', 'Location 3');
