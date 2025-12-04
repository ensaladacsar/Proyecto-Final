<?php
session_start();
// Incluir el archivo login.php para obtener los datos de conexión
include '../login.php';

if (!isset($_SESSION["id_usu"])) {
    echo '<script>
        window.location.href = "../index.html";
    </script>';
    exit();
    exit();
}

if (isset ($_POST['tipo_comida'])){
    // Obtener los datos del formulario
    $tipo_comida = isset($_POST['tipo_comida']) ? $_POST['tipo_comida'] : '';
    $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : '';
    $id_usu = $_SESSION['id_usu']; // Obtener el id_usu del usuario que ha iniciado sesión

    // Verificar si se han enviado los datos necesarios
    if (!empty($tipo_comida) && !empty($fecha) && !empty($id_usu)) {

        $sql = "DELETE FROM comida
                WHERE id_usu = ?
                AND fecha = ?
                AND tipo_comida = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iss", $id_usu, $fecha, $tipo_comida);
        $stmt->execute();
        
    } else {
        // Mostrar un mensaje de error
        $_SESSION['log_del'] = "<span style='color: red;'>Error: Faltan datos en el formulario o no hay registro en la base de datos.</span>";
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Registro a la Agenda de Control</title>
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
            max-width: 500px; /* Reducido de 600px a 500px */
            box-sizing: border-box;
            margin: 2rem 0; /* Añadido margen superior e inferior */
        }
        .container h2 {
            margin-bottom: 1rem;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1rem;
        }
        input, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            box-sizing: border-box;
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
        .register-link {
            margin-top: 15px;
            display: block;
            color: #764ba2;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: bold;
            text-align: center;
        }
        .register-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Eliminar registro de la Agenda de Control</h2>
        <form action="delTabla.php" method="post">
        <label for="tipo_comida">Tipo de Comida:</label>
            <select id="tipo_comida" name="tipo_comida" required>
                Selecciona una opción
                <option value="Desayuno">Desayuno</option>
                <option value="Mediodia">Medio Día</option>
                <option value="Comida">Comida</option>
                <option value="Merienda">Merienda</option>
                <option value="Cena">Cena</option>
            </select>
            
            <label for="fecha">Introduce la fecha del registro a eliminar:</label>
            <input type="date" id="fecha" name="fecha" required>
            <button type="submit" class="btn-action">Eliminar registro</button>
            <a href="../menu.php" class="register-link">Volver al inicio</a>
        </form>
    </div>
</body>
</html>
 