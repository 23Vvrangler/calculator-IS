<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'conexion.php';
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['contrasenia'], PASSWORD_BCRYPT);

    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, email, contrasenia) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nombre, $email, $pass);
    $stmt->execute();
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2>Registro de Usuario</h2>
    <form method="POST" class="card p-4">
        <input type="text" name="nombre" placeholder="Nombre" class="form-control mb-3" required>
        <input type="email" name="email" placeholder="Correo electrónico" class="form-control mb-3" required>
        <input type="password" name="contrasenia" placeholder="Contraseña" class="form-control mb-3" required>
        <button class="btn btn-primary w-100">Registrarse</button>
    </form>
    <a href="login.php" class="btn btn-link mt-3">¿Ya tienes cuenta? Iniciar sesión</a>
</div>
</body>
</html>
