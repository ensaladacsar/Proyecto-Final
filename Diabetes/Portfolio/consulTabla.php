<?php
session_start();
include '../login.php';


// Si el usuario no ha iniciado sesión, redirigirlo
if (!isset($_SESSION["id_usu"])) {
    echo '<script>
        window.location.href = "../index.html";
    </script>';
    exit();
    exit();
}

$id_usu = $_SESSION["id_usu"];
$query = "SELECT c.fecha, c.deporte, c.lenta, co.tipo_comida, co.gl_1h, co.gl_2h, co.raciones, co.insulina,
                    hipo.glucosa AS hipo_glu, hipo.hora AS hipo_hora, 
                    hiper.glucosa AS hiper_glu, hiper.hora AS hiper_hora, hiper.correccion 
            FROM control_glucosa c
            LEFT JOIN comida co ON c.fecha = co.fecha AND c.id_usu = co.id_usu
            LEFT JOIN hipoglucemia hipo ON co.fecha = hipo.fecha AND co.id_usu = hipo.id_usu AND co.tipo_comida = hipo.tipo_comida
            LEFT JOIN hiperglucemia hiper ON co.fecha = hiper.fecha AND co.id_usu = hiper.id_usu AND co.tipo_comida = hiper.tipo_comida
            WHERE c.id_usu = ?
            ORDER BY c.fecha DESC";

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id_usu);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <title>Control de Glucosa</title>
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

        .table {
            background-color: white;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .table thead th {
            background-color: #764ba2;
            color: white;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f5f5f5;
        }

        .table tbody tr {
            background-color: #965fce;
            color: white;
        }
    </style>
</head>

<body>
    <div class="fullscreen-bg d-flex flex-column align-items-center justify-content-center vh-100">
        <div class="container mt-5">
            <h2 class="text-center mb-4 text-white">Registro de controles realizados:</h2>
            <div class="table-responsive rounded ">
                <table class="table table-bordered text-center">
                    <thead class="table-dark">
                        <tr class="tr-header">
                            <th>Fecha</th>
                            <th>Deporte</th>
                            <th>Insulina Lenta</th>
                            <th>Comida</th>
                            <th>GL/1H</th>
                            <th>GL/2H</th>
                            <th>Raciones</th>
                            <th>Insulina</th>
                            <th>Glucosa durante la hipoglucemia</th>
                            <th>Hora de la hipoglucemia</th>
                            <th>Glucosa durante la hiperglucemia</th>
                            <th>Hora de la hiperglucemia</th>
                            <th>Corrección</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['fecha'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($row['deporte'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($row['lenta'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($row['tipo_comida'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($row['gl_1h'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($row['gl_2h'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($row['raciones'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($row['insulina'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($row['glucosa_hipo'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($row['hora_hipo'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($row['glucosa_hiper'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($row['hora_hiper'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?php echo htmlspecialchars($row['correccion'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>