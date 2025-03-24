<?php
include 'conexion.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$expresion = $_POST['expresion'] ?? '';
$es_error = 0;
$resultado = null;
$mensaje_error = null;

// Validación básica (segura)
if (!preg_match('/^[0-9+-*/(). ]+$/', $expresion)) {
    $es_error = 1;
    $mensaje_error = 'Expresión inválida';
} else {
    try {
        // Evaluar expresión matemática
        $resultado = eval("return {$expresion};");

        if (!is_numeric($resultado)) {
            $es_error = 1;
            $mensaje_error = 'Error en el cálculo';
        }
    } catch (Throwable $e) {
        $es_error = 1;
        $mensaje_error = 'Error en la expresión';
    }
}

// Guardar la operación completa correctamente en la base de datos
$stmt = $conn->prepare("INSERT INTO operaciones (id_usuario, operacion, resultado, es_error, mensaje_error) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("isdss", $_SESSION['user_id'], $expresion, $resultado, $es_error, $mensaje_error);
$stmt->execute();

header("Location: historial.php");
exit;