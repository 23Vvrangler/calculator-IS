<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
    <style>
        @keyframes fondoAnimado {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(-45deg, #2c3e50, #4ca1af, #2c3e50);
            background-size: 400% 400%;
            animation: fondoAnimado 10s infinite alternate;
            color: white;
            text-align: center;
        }

        h1 {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        p {
            font-size: 16px;
            margin-bottom: 20px;
            opacity: 0.9;
        }

        .btn-historial {
            background-color: #ff9500;
            color: white;
            font-size: 18px;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 20px;
            transition: 0.3s;
        }

        .btn-historial:hover {
            background-color: #ffaa33;
            transform: scale(1.05);
        }

        .calculadora {
            width: 320px;
            background-color: #333;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .pantalla {
            background-color: #a0c8a0;
            color: #333;
            font-size: 32px;
            text-align: right;
            padding: 10px 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.3);
            font-family: 'Courier New', Courier, monospace;
            height: 50px;
            overflow: hidden;
        }

        .botones {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-gap: 10px;
        }

        button {
            background-color: #555;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 15px 0;
            font-size: 22px;
            cursor: pointer;
            transition: all 0.2s;
        }

        button:hover {
            background-color: #666;
            transform: translateY(-2px);
        }

        button:active {
            transform: translateY(1px);
        }

        .operador {
            background-color: #ff9500;
        }

        .operador:hover {
            background-color: #ffaa33;
        }

        .igual {
            background-color: #217bff;
        }

        .igual:hover {
            background-color: #4492ff;
        }

        .borrar {
            background-color: #ff3b30;
        }

        .borrar:hover {
            background-color: #ff5b50;
        }
    </style>
</head>
<body>
    <h1>CALCULADORA</h1>
    <p>Una herramienta rápida y sencilla para realizar operaciones matemáticas.</p>
    <a href="historial.php" class="btn-historial">📜 Ver Historial</a>
    
    <div class="calculadora">
        <div class="pantalla" id="pantalla">0</div>
        <div class="botones">
            <button class="borrar" onclick="limpiar()">AC</button>
            <button onclick="cambiarSigno()">+/-</button>
            <button onclick="ingresarOperacion('%')">%</button>
            <button class="operador" onclick="ingresarOperacion('÷')">÷</button>
            
            <button onclick="ingresarNumero(7)">7</button>
            <button onclick="ingresarNumero(8)">8</button>
            <button onclick="ingresarNumero(9)">9</button>
            <button class="operador" onclick="ingresarOperacion('×')">×</button>
            
            <button onclick="ingresarNumero(4)">4</button>
            <button onclick="ingresarNumero(5)">5</button>
            <button onclick="ingresarNumero(6)">6</button>
            <button class="operador" onclick="ingresarOperacion('-')">-</button>
            
            <button onclick="ingresarNumero(1)">1</button>
            <button onclick="ingresarNumero(2)">2</button>
            <button onclick="ingresarNumero(3)">3</button>
            <button class="operador" onclick="ingresarOperacion('+')">+</button>
            
            <button style="grid-column: span 2;" onclick="ingresarNumero(0)">0</button>
            <button onclick="ingresarDecimal()">.</button>
            <button class="igual" onclick="calcular()">=</button>
        </div>
    </div>

    <script>
        let pantalla = document.getElementById('pantalla');

        function ingresarNumero(num) {
            if (pantalla.innerText === '0' || pantalla.innerText === "Error: ingrese otro número") {
                pantalla.innerText = num;
            } else {
                pantalla.innerText += num;
            }
        }

        function ingresarOperacion(op) {
            if (!pantalla.innerText.endsWith(' ') && pantalla.innerText !== '' && pantalla.innerText !== "Error: ingrese otro número") {
                pantalla.innerText += ' ' + op + ' ';
            }
        }

        function ingresarDecimal() {
            let partes = pantalla.innerText.split(' ');
            let ultimaParte = partes[partes.length - 1];

            if (!ultimaParte.includes('.') && pantalla.innerText !== "Error: ingrese otro número") {
                pantalla.innerText += '.';
            }
        }

        function cambiarSigno() {
            let valor = parseFloat(pantalla.innerText);
            if (!isNaN(valor) && pantalla.innerText !== "Error: ingrese otro número") {
                pantalla.innerText = valor * -1;
            }
        }

        function limpiar() {
            pantalla.innerText = '0';
        }

        function calcular() {
            try {
                let expresion = pantalla.innerText.replace('÷', '/').replace('×', '*');

                if (expresion.includes('/ 0')) {
                    pantalla.innerText = "Error: ingrese otro número";
                } else {
                    pantalla.innerText = eval(expresion);
                }
            } catch {
                pantalla.innerText = 'Error';
            }
        }
      

    </script>
</body>
</html>
