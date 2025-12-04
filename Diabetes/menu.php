<?php
	session_start();
    unset($_SESSION['log']);
	if (!isset($_SESSION["id_usu"])) {
    echo '<script>
        window.location.href = "../index.html";
    </script>';
    exit();
    exit();
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de Control</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #ea6f66, #764ba2);
            font-family: Arial, sans-serif;
            margin: 0;
        }
        .container {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 100%;
            max-width: 600px;
            box-sizing: border-box;
        }
        .container h2 {
            margin-bottom: 1rem;
            color: #333;
        }
        .container h3 {
            margin-bottom: 1rem;
            color: #333;
        }
        .btn-container {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .btn-action {
            background: #965fce;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: 0.3s;
            box-sizing: border-box;
        }
        .btn-action:hover {
            background: #764ba2;
        }
        a {
            text-decoration: none; 
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Agenda de Control para Diabéticos</h2>
        <h3>Elija una opcion:</h3>
        <div class="btn-container">
            <a href="Portfolio/control_gl.php" class="btn-action">Añadir control glucosa</a>
            <a href="Portfolio/addTabla.php" class="btn-action">Añadir tabla</a>
            <a href="Portfolio/modTabla.php" class="btn-action">Modificar tabla</a>
            <a href="Portfolio/delTabla.php" class="btn-action">Eliminar tabla</a>
            <a href="Portfolio/consulTabla.php" class="btn-action">Consultar tablas</a>
            <a href="Portfolio/graficas.php" class="btn-action">Ver Estadísticas</a>
        </div>
    </div>
</body>
</html>