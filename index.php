<?php
include 'conexion.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Calculadora Interactiva</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <style>
        body {
            background: linear-gradient(135deg,rgb(74, 104, 214),rgb(147, 157, 193));
            color: #333;
            text-align: center;
        }
        .container {
            max-width: 400px;
            margin-top: 50px;
        }
        h1 {
            font-size: 3rem;
            font-weight: bold;
            color: #fff;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.3);
            animation: fadeInDown 1s ease-in-out;
        }
        p {
            font-size: 1.2rem;
            color: #fff;
            margin-bottom: 20px;
            animation: fadeIn 1.5s ease-in-out;
        }
        .btn {
            font-size: 1.5rem;
            padding: 10px;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .btn:hover {
            transform: scale(1.1);
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
        }
        .btn-equal {
            background:rgb(123, 224, 39);
            color: white;
            font-size: 1.8rem;
        }
        .card {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.2);
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>CALCULADORA</h1>
        <p>Convierte los números en soluciones. ¡Haz cálculos rápidos y precisos con estilo! 🧮✨</p>

        <div class="card">
            <form action="procesar.php" method="POST">
                <div class="row g-2 mb-3">
                    <?php for ($i = 0; $i <= 9; $i++): ?>
                        <div class="col-4">
                            <button type="button" class="btn btn-primary w-100" onclick="agregarNumero(<?= $i ?>)"><?= $i ?></button>
                        </div>
                    <?php endfor; ?>
                </div>

                <input type="text" id="pantalla" name="expresion" class="form-control text-center mb-3" placeholder="0" readonly>

                <div class="row g-2 mb-3">
                    <div class="col-3"><button type="button" class="btn btn-warning w-100" onclick="agregarOperacion('+')">+</button></div>
                    <div class="col-3"><button type="button" class="btn btn-warning w-100" onclick="agregarOperacion('-')">-</button></div>
                    <div class="col-3"><button type="button" class="btn btn-warning w-100" onclick="agregarOperacion('*')">×</button></div>
                    <div class="col-3"><button type="button" class="btn btn-warning w-100" onclick="agregarOperacion('/')">÷</button></div>
                </div>

                <button type="submit" class="btn btn-equal w-100">=</button>
            </form>
        </div>

        <a href="historial.php" class="btn btn-secondary mt-3">Ver Historial</a>
        <a href="logout.php" class="btn btn-danger mt-3">Cerrar sesión</a>
    </div>

    <script>
        function agregarNumero(numero) {
            let pantalla = document.getElementById('pantalla');
            pantalla.value += numero;
        }

        function agregarOperacion(operador) {
            let pantalla = document.getElementById('pantalla');
            pantalla.value += " " + operador + " ";
        }
    </script>
</body>
</html>
