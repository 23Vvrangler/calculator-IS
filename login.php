<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'conexion.php';
    $email = $_POST['email'];
    $pass = $_POST['contrasenia'];

    $stmt = $conn->prepare("SELECT id, contrasenia FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        if (password_verify($pass, $row['contrasenia'])) {
            $_SESSION['user_id'] = $row['id'];
            header("Location: index.php");
            exit;
        }
    }
    $error = "Credenciales incorrectas";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2>Iniciar Sesión</h2>
    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>
    <form method="POST" class="card p-4">
        <input type="email" name="email" placeholder="Correo electrónico" class="form-control mb-3" required>
        <input type="password" name="contrasenia" placeholder="Contraseña" class="form-control mb-3" required>
        <button class="btn btn-primary w-100">Ingresar</button>
    </form>
    <a href="registro.php" class="btn btn-link mt-3">¿No tienes cuenta? Regístrate</a>
</div>
</body>
</html>
