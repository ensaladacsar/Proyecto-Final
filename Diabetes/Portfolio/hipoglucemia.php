<?php
    // Conexión a la base de datos
    if (!isset($_SESSION["id_usu"])) {
        echo '<script>
            window.location.href = "../index.html";
        </script>';
        exit();
        exit();
    }
    require 'config.php';
    // Función para añadir un registro
    function añadirHipoglucemia($id_usu, $fecha, $tipo_comida, $glucosa, $hora) {
        global $conn;
        $stmt = $conn->prepare("INSERT INTO hipoglucemia (id_usu, fecha, tipo_comida, glucosa, hora) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("issis", $id_usu, $fecha, $tipo_comida, $glucosa, $hora);
        return $stmt->execute();
    }
    // Función para modificar un registro
    function modificarHipoglucemia($id_usu, $fecha, $tipo_comida, $glucosa, $hora) {
        global $conn;
        $stmt = $conn->prepare("UPDATE hipoglucemia SET glucosa = ?, hora = ? WHERE id_usu = ? AND fecha = ? AND tipo_comida = ?");
        $stmt->bind_param("isiss", $glucosa, $hora, $id_usu, $fecha, $tipo_comida);
        return $stmt->execute();
    }
    // Función para eliminar un registro
    function eliminarHipoglucemia($id_usu, $fecha, $tipo_comida) {
        global $conn;
        $stmt = $conn->prepare("DELETE FROM hipoglucemia WHERE id_usu = ? AND fecha = ? AND tipo_comida = ?");
        $stmt->bind_param("iss", $id_usu, $fecha, $tipo_comida);
        return $stmt->execute();
    }
    // Función para visualizar registros por usuario
    function obtenerHipoglucemias($id_usu) {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM hipoglucemia WHERE id_usu = ? ORDER BY fecha DESC, hora DESC");
        $stmt->bind_param("i", $id_usu);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $datos = [];
        while ($fila = $resultado->fetch_assoc()) {
            $datos[] = $fila;
        }
        return $datos;
    }
    $conn->close();
?>
