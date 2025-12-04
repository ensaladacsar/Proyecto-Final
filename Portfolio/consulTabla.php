<?php
    session_start();
    include '../conexion.php';

    // Si no está logueado → fuera
    if (!isset($_SESSION["id_usuario"])) {
        echo '<script>window.location.href = "../index.php";</script>';
        exit();
    }

    $id_usuario = $_SESSION["id_usuario"];

    // Obtener citas del usuario
    $query = "SELECT c.*, u.nombre AS empleado_nombre, u.apellidos AS empleado_apellidos
            FROM citas c
            LEFT JOIN usuarios u ON c.gestionada_por = u.id_usuario
            WHERE c.id_cliente = ?
            ORDER BY c.fecha DESC, c.hora DESC";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id_usuario);
    $stmt->execute();
    $result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Mis Citas</title>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center mb-4">Mis citas</h2>
        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Estado</th>
                        <th>Comentario</th>
                        <th>Gestionada por</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?= htmlspecialchars($row["fecha"]) ?></td>
                            <td><?= htmlspecialchars($row["hora"]) ?></td>
                            <td><?= htmlspecialchars($row["estado"]) ?></td>
                            <td><?= htmlspecialchars($row["comentario"]) ?></td>
                            <td>
                                <?= $row["empleado_nombre"] ? $row["empleado_nombre"] . " " . $row["empleado_apellidos"] : "Sin gestionar" ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
