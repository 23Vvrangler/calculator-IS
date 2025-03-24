<?php
include 'conexion.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eliminar_historial'])) {
    $stmt = $conn->prepare("DELETE FROM operaciones WHERE id_usuario = ?");
    $stmt->bind_param("i", $_SESSION['user_id']);
    $stmt->execute();
    header("Location: historial.php");
    exit;
}

$stmt = $conn->prepare("SELECT * FROM operaciones WHERE id_usuario = ? ORDER BY fecha_operacion DESC");
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Historial</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="mb-4">Historial de Operaciones</h2>

    <form method="POST" onsubmit="return confirm('¿Eliminar todo el historial?');">
        <button name="eliminar_historial" class="btn btn-danger mb-3">🗑️ Eliminar historial</button>
    </form>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Operación</th>
                <th>Resultado</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['operacion']) ?></td>
                <td>
                    <?= $row['es_error'] ? "<span class='text-danger'>{$row['mensaje_error']}</span>" : $row['resultado'] ?>
                </td>
                <td><?= $row['fecha_operacion'] ?></td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>

    <a href="index.php" class="btn btn-primary">Volver</a>
</div>
</body>
</html>