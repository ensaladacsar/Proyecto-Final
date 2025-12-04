<?php
require 'config.php';

if (!isset($_SESSION["id_usu"])) {
    echo '<script>
        window.location.href = "../index.html";
    </script>';
    exit();
    exit();
}
// Función para añadir un registro
function añadirHiperglucemia($id_usu, $fecha, $tipo_comida, $glucosa, $hora, $correccion) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO hiperglucemia (id_usu, fecha, tipo_comida, glucosa, hora, correccion) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("issisi", $id_usu, $fecha, $tipo_comida, $glucosa, $hora, $correccion);
    return $stmt->execute();
}
// Función para modificar un registro
function modificarHiperglucemia($id_usu, $fecha, $tipo_comida, $glucosa, $hora, $correccion) {
    global $conn;
    $stmt = $conn->prepare("UPDATE hiperglucemia SET glucosa = ?, hora = ?, correccion = ? WHERE id_usu = ? AND fecha = ? AND tipo_comida = ?");
    $stmt->bind_param("isiiis", $glucosa, $hora, $correccion, $id_usu, $fecha, $tipo_comida);
    return $stmt->execute();
}
// Función para eliminar un registro
function eliminarHiperglucemia($id_usu, $fecha, $tipo_comida) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM hiperglucemia WHERE id_usu = ? AND fecha = ? AND tipo_comida = ?");
    $stmt->bind_param("iss", $id_usu, $fecha, $tipo_comida);
    return $stmt->execute();
}
// Función para visualizar registros por usuario
function obtenerHiperglucemias($id_usu) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM hiperglucemia WHERE id_usu = ? ORDER BY fecha DESC, hora DESC");
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
