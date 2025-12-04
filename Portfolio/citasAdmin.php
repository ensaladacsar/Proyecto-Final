<?php
session_start();
include '../conexion.php';

// Si no está logueado → fuera
if (!isset($_SESSION["id_usuario"])) {
    echo '<script>window.location.href = "../index.php";</script>';
    exit();
}

// Comprobar si es empleado
if ($_SESSION["rol"] !== "empleado") {
    echo "<h3>No tienes permisos para ver esta página.</h3>";
    exit();
}

// Obtener citas con datos del cliente y del empleado que gestionó
$query = "SELECT c.*, 
                cli.nombre AS cliente_nombre, cli.apellidos AS cliente_apellidos, 
                emp.nombre AS emp_nombre, emp.apellidos AS emp_apellidos
          FROM citas c
          INNER JOIN usuarios cli ON c.id_cliente = cli.id_usuario
          LEFT JOIN usuarios emp ON c.gestionada_por = emp.id_usuario
          ORDER BY c.fecha DESC, c.hora DESC";

$result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Todas las Citas</title>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center mb-4">Listado de todas las citas</h2>
        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Cliente</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Estado</th>
                        <th>Comentario</th>
                        <th>Gestionada por</th>
                        <th>Registrada el</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?= htmlspecialchars($row["cliente_nombre"] . " " . $row["cliente_apellidos"]) ?></td>
                            <td><?= htmlspecialchars($row["fecha"]) ?></td>
                            <td><?= htmlspecialchars($row["hora"]) ?></td>
                            <td><?= htmlspecialchars($row["estado"]) ?></td>
                            <td><?= htmlspecialchars($row["comentario"]) ?></td>
                            <td><?= $row["emp_nombre"] ? $row["emp_nombre"] . " " . $row["emp_apellidos"] : "Sin gestionar" ?></td>
                            <td><?= htmlspecialchars($row["fecha_registro"]) ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
