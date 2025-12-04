<?php
    session_start();
    include '../conexion.php';

    // Si no está logueado, volver al inicio
    if (!isset($_SESSION["id_usuario"])) {
        echo '<script>window.location.href = "../login.php";</script>';
        exit();
    }

    $id_cliente = $_SESSION["id_usuario"];

    // Recibir datos del formulario
    $fecha = $_POST["fecha"];
    $hora = $_POST["hora"];
    $comentario = $_POST["comentario"] ?? NULL;

    // Insertar cita en la base de datos
    $query = "INSERT INTO citas (id_cliente, fecha, hora, comentario, estado)
            VALUES (?, ?, ?, ?, 'confirmada')";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("isss", $id_cliente, $fecha, $hora, $comentario);

    if ($stmt->execute()) {
        echo "<script>alert('Cita registrada con éxito.'); window.location.href='Catalogo.php';</script>";
    } else {
        echo "<script>alert('Error al registrar la cita.'); window.location.href='Citas.php';</script>";
    }

    $stmt->close();
    $conn->close();
?>
