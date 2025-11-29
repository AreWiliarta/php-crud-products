CREATE DATABASE crud_products;
USE crud_products;

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    category VARCHAR(50),
    price DECIMAL(10,2),
    stock INT,
    image_path VARCHAR(255),
    status ENUM('active','inactive')
);
