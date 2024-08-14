CREATE DATABASE client_database;

USE client_database;

CREATE TABLE `client-data` (
    id INT AUTO_INCREMENT PRIMARY KEY,
    area VARCHAR(255) NOT NULL,
    requirement VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
    phone VARCHAR(15) NOT NULL,
    email VARCHAR(255) NOT NULL,
    details TEXT
);


CREATE TABLE login_data (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);
