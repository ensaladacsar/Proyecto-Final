<?php
session_start();

// Incluir el archivo login.php para obtener los datos de conexión
require_once '../login.php';

if (!isset($_SESSION["id_usu"])) {
    echo '<script>
        window.location.href = "../index.html";
    </script>';
    exit();
}

if ($_POST != NULL) {
    // Obtener los datos del formulario
    $deporte = $_POST['deporte'];
    $lenta = $_POST['lenta'];
    $id_usu = $_SESSION['id_usu'];
    $fecha_actual = date('Y-m-d'); // Obtener la fecha actual sin la hora

    // Verificar si ya existe un registro en la misma fecha para el usuario
    $sql_check = "SELECT id_usu FROM control_glucosa WHERE id_usu = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("i", $id_usu);
    $stmt_check->execute();
    $stmt_check->store_result();

    if ($stmt_check->num_rows > 0) {
        echo '<script>
                alert("Ya existe un control en la misma fecha");
                window.location.href = "../menu.php";
            </script>';
        exit();
    }

    $stmt_check->close();

    // Si no hay registro previo, insertar uno nuevo
    $fecha_completa = date('Y-m-d H:i:s'); // Obtener la fecha y hora actual
    $sql_insert = "INSERT INTO control_glucosa (deporte, lenta, fecha, id_usu) VALUES (?, ?, ?, ?)";
    $stmt_insert = $conn->prepare($sql_insert);
    $stmt_insert->bind_param("iiss", $deporte, $lenta, $fecha_completa, $id_usu);

    if ($stmt_insert->execute()) {
        $_SESSION['log'] = "<span style='color: green;'>Registro actualizado exitosamente.</span>";
        echo '<script>
            window.location.href = "../menu.php";
        </script>';
        exit();
    } else {
        $_SESSION['log'] = "<span style='color: red;'>Error al actualizar el registro: </span>" . $stmt_insert->error;
        echo '<script>
            window.location.href = "../menu.php";
        </script>';
        exit();
    }
}
$conn->close();
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Registro a la Agenda de Control</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
        <h4>Cuanto deporte has hecho hoy?</h4>
        <form action="control_gl.php" method="post">
            <div class="col-12">
                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha" name="fecha" required>
            </div>
            <div class="col-12">
                <label for="deporte">
                    1 - Nada</br>
                    2 - Me he movido un poco</br>
                    3 - He salido a dar un paseo</br>
                    4 - He hecho ejercicio</br>
                    5 - He hecho deporte inteso</br>
                </label>
                <input type="number" id="deporte" name="deporte" min="1" max="5" required>
            </div>

            <div class="col-6">
                <label for="lenta">Indica aquí cuantas dosis de lenta has introducido:</label>
                <input type="number" id="lenta" name="lenta" min="1" max="1000" required>
            </div>

            <button type="submit" class="btn-action">Guardar cambios</button>
            <a href="../menu.php" class="register-link">Volver al inicio</a>
        </form>
    </div>
</body>
</html>