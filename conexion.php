<?php
$host = "localhost";
$user = "root";
$password = "123456";
$dbname = "calculadora_db";

// Habilitar informes de errores en MySQLi
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $conn = new mysqli($host, $user, $password, $dbname);
    $conn->set_charset("utf8"); // Establecer el conjunto de caracteres UTF-8
} catch (mysqli_sql_exception $e) {
    die("Error de conexión: " . $e->getMessage());
}

// Iniciar sesión solo si no está iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>