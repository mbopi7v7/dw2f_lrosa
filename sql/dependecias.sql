CREATE DATABASE IF NOT EXISTS dw2f_ibenitez;
USE dw2f_ibenitez;

CREATE TABLE dependencias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(120) NOT NULL,
    tipo VARCHAR(50) NOT NULL,
    edificio VARCHAR(100) NOT NULL,
    piso VARCHAR(30) NOT NULL,
    responsable VARCHAR(120) NOT NULL,
    telefono VARCHAR(30) NOT NULL,
    correo VARCHAR(120) NOT NULL,
    estado VARCHAR(20) NOT NULL
);

INSERT INTO dependencias (nombre,tipo,edificio,piso,responsable,telefono,correo,estado) VALUES
('Secretaría Académica','Secretaría','Edificio A','1','Ana Gómez','071205454','agomez@unae.edu.py','Activa'),
('Laboratorio Informática','Laboratorio','Edificio B','2','Juan Pérez','071205455','jperez@unae.edu.py','Activa');
