-- phpMyAdmin SQL Dump
-- version 5.2.1
-- Base de datos: calculadora_db

CREATE DATABASE IF NOT EXISTS calculadora_db;
USE calculadora_db;

CREATE TABLE IF NOT EXISTS operaciones (
  id INT AUTO_INCREMENT PRIMARY KEY,
  numero1 DECIMAL(10,2),
  numero2 DECIMAL(10,2),
  operacion ENUM('suma','resta','multiplicacion','division'),
  resultado DECIMAL(20,10),
  es_error TINYINT(1) DEFAULT 0,
  mensaje_error VARCHAR(255),
  fecha_operacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
