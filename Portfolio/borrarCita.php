<?php
    session_start();
    include '../conexion.php';

    // Solo empleados pueden borrar
    if (!isset($_SESSION["id_usuario"]) || $_SESSION["rol"] !== "empleado") {
        echo "<script>alert('No tienes permisos para acceder.'); window.location.href='../index.php';</script>";
        exit();
    }

    if (isset($_GET['id'])) {
        $id_cita = $_GET['id'];

        $stmt = $conn->prepare("DELETE FROM citas WHERE id_cita = ?");
        $stmt->bind_param("i", $id_cita);

        if ($stmt->execute()) {
            echo "<script>alert('Cita eliminada correctamente'); window.location.href='AdminCitas.php';</script>";
        } else {
            echo "<script>alert('Error al eliminar la cita'); window.location.href='AdminCitas.php';</script>";
        }
    }
?>
