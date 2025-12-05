<?php
    session_start();
    include '../conexion.php';

    // Solo empleados pueden editar
    if (!isset($_SESSION["id_usuario"]) || $_SESSION["rol"] !== "empleado") {
        echo "<script>alert('No tienes permisos para acceder.'); window.location.href='../index.php';</script>";
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_cita = $_POST['id_cita'];
        $fecha = $_POST['fecha'];
        $hora = $_POST['hora'];
        $comentario = $_POST['comentario'];
        $estado = $_POST['estado'];

        $stmt = $conn->prepare("UPDATE citas SET fecha = ?, hora = ?, comentario = ?, estado = ? WHERE id_cita = ?");
        $stmt->bind_param("ssssi", $fecha, $hora, $comentario, $estado, $id_cita);

        if ($stmt->execute()) {
            echo "<script>alert('Cita actualizada correctamente'); window.location.href='AdminCitas.php';</script>";
        } else {
            echo "<script>alert('Error al actualizar la cita'); window.location.href='AdminCitas.php';</script>";
        }
    }
?>
