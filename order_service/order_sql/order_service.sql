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


CREATE TABLE staff (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL
);



-- Create the client table
CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_client INT NOT NULL,
    description VARCHAR(255) NOT NULL,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    is_done BOOLEAN DEFAULT FALSE
);

CREATE TABLE order_details (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_order INT NOT NULL,
    date DATE NOT NULL,
    time_start TIME NOT NULL,
    time_end TIME NOT NULL,
    location VARCHAR(255) NOT NULL
);
CREATE TABLE event (
    id INT AUTO_INCREMENT PRIMARY KEY,
    time_start TIME,
    time_end TIME,
    description VARCHAR(255),
    staff_id INT,
    order_details_id INT
);

-- Insert sample data into the orders table
INSERT INTO orders (id_client, description) VALUES
(1, 'Order 1 description'),
(2, 'Order 2 description'),
(3, 'Order 3 description');

-- Insert sample data into the order_details table
INSERT INTO order_details (id_order, date, time_start, time_end, location) VALUES
(1, '2023-06-01', '09:00:00', '12:00:00', 'Location 1'),
(2, '2023-06-02', '14:00:00', '16:00:00', 'Location 2'),
(3, '2023-06-03', '10:30:00', '13:30:00', 'Location 3');
