<?php
include '../conexion.php';

if (!isset($_GET["fecha"])) {
    echo json_encode([]);
    exit();
}

$fecha = $_GET["fecha"];

$query = "SELECT hora FROM citas WHERE fecha = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $fecha);
$stmt->execute();
$result = $stmt->get_result();

$horas_ocupadas = [];
while ($row = $result->fetch_assoc()) {
    $horas_ocupadas[] = $row["hora"];
}

echo json_encode($horas_ocupadas);
?>
