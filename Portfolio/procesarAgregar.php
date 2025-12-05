<?php
    session_start();
    include '../conexion.php';

    // Solo empleados pueden agregar
    if (!isset($_SESSION["id_usuario"]) || $_SESSION["rol"] !== "empleado") {
        echo "<script>alert('No tienes permisos para acceder.'); window.location.href='../index.php';</script>";
        exit();
    }

    if (isset($_POST['add_cita'])) {
        $id_cliente = $_POST['id_cliente'];
        $fecha = $_POST['fecha'];
        $hora = $_POST['hora'];
        $comentario = $_POST['comentario'];

        $stmt = $conn->prepare("INSERT INTO citas (id_cliente, fecha, hora, comentario, estado) VALUES (?, ?, ?, ?, 'pendiente')");
        $stmt->bind_param("isss", $id_cliente, $fecha, $hora, $comentario);

        if ($stmt->execute()) {
            echo "<script>alert('Cita añadida correctamente'); window.location.href='AdminCitas.php';</script>";
        } else {
            echo "<script>alert('Error al añadir la cita'); window.location.href='AdminCitas.php';</script>";
        }
    }
?>
