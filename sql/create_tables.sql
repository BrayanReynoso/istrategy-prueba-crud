-- Crear la base de datos
CREATE DATABASE db_istrategy;

-- Usar la base de datos
USE db_istrategy;

-- Tabla principal de usuarios
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,    -- ID único para cada usuario
    username VARCHAR(50) NOT NULL UNIQUE, -- Nombre de usuario único
    email VARCHAR(100) NOT NULL UNIQUE,   -- Correo electrónico único
    password VARCHAR(255) NOT NULL,       -- Contraseña (debe estar encriptada)
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- Fecha de creación
);

