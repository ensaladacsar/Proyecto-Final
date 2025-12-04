<?php
session_start();
include '../login.php';

if (!isset($_SESSION["id_usu"])) {
    echo '<script>window.location.href = "../index.html";</script>';
    exit();
}

$id_usu = $_SESSION['id_usu'];

// Obtener datos de hiperglucemia
$sql_hiper = "SELECT fecha, hora, tipo_comida, glucosa FROM hiperglucemia WHERE id_usu=? ORDER BY fecha, hora ASC";
$stmt_hiper = $conn->prepare($sql_hiper);
$stmt_hiper->bind_param("i", $id_usu);
$stmt_hiper->execute();
$result_hiper = $stmt_hiper->get_result();
$hiper_data = [];
while ($row = $result_hiper->fetch_assoc()) {
    $hiper_data[] = $row;
}

// Obtener datos de hipoglucemia
$sql_hipo = "SELECT fecha, hora, tipo_comida, glucosa FROM hipoglucemia WHERE id_usu=? ORDER BY fecha, hora ASC";
$stmt_hipo = $conn->prepare($sql_hipo);
$stmt_hipo->bind_param("i", $id_usu);
$stmt_hipo->execute();
$result_hipo = $stmt_hipo->get_result();
$hipo_data = [];
while ($row = $result_hipo->fetch_assoc()) {
    $hipo_data[] = $row;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráfica de Glucosa</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #ea6f66, #764ba2);
            margin: 20px;
        }
        .container {
            max-width: 900px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        h2, h3 {
            text-align: center;
        }
        .chart-container {
            position: relative;
            height: 400px;
        }
        canvas {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 10px;
        }
        .btn-back {
            display: block;
            margin: 20px auto;
            width: 200px;
            text-align: center;
        }
 		.register-link {
            margin-top: 15px;
            display: block;
            color: #764ba2;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: bold;
            text-align: center;
        }
        .register-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center mb-4">Estadísticas de Glucosa</h2>

        <!-- Gráfico de Hiperglucemia -->
        <h3 class="text-danger">Historial de Hiperglucemia</h3>
        <div class="chart-container">
            <canvas id="hiperChart"></canvas>
        </div>

        <!-- Gráfico de Hipoglucemia -->
        <h3 class="text-primary mt-4">Historial de Hipoglucemia</h3>
        <div class="chart-container">
            <canvas id="hipoChart"></canvas>
        </div>

         <a href="../menu.php" class="register-link">Volver al inicio</a>
    </div>

    <script>
        // Datos de Hiperglucemia desde PHP
        const hiperData = <?php echo json_encode($hiper_data); ?>;
        const hiperLabels = hiperData.map(item => `${item.fecha} ${item.hora} (${item.tipo_comida})`);
        const hiperValues = hiperData.map(item => item.glucosa);

        // Datos de Hipoglucemia desde PHP
        const hipoData = <?php echo json_encode($hipo_data); ?>;
        const hipoLabels = hipoData.map(item => `${item.fecha} ${item.hora} (${item.tipo_comida})`);
        const hipoValues = hipoData.map(item => item.glucosa);

        // Configurar Gráfico de Hiperglucemia
        const ctxHiper = document.getElementById('hiperChart').getContext('2d');
        new Chart(ctxHiper, {
            type: 'line',
            data: {
                labels: hiperLabels,
                datasets: [{
                    label: 'Glucosa (mg/dL)',
                    data: hiperValues,
                    borderColor: 'red',
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderWidth: 2,
                    pointRadius: 4,
                    tension: 0.2
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: { beginAtZero: false }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            title: function(tooltipItems) {
                                return `Fecha y Hora: ${tooltipItems[0].label}`;
                            }
                        }
                    }
                }
            }
        });

        // Configurar Gráfico de Hipoglucemia
        const ctxHipo = document.getElementById('hipoChart').getContext('2d');
        new Chart(ctxHipo, {
            type: 'line',
            data: {
                labels: hipoLabels,
                datasets: [{
                    label: 'Glucosa (mg/dL)',
                    data: hipoValues,
                    borderColor: 'blue',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderWidth: 2,
                    pointRadius: 4,
                    tension: 0.2
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: { beginAtZero: false }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            title: function(tooltipItems) {
                                return `Fecha y Hora: ${tooltipItems[0].label}`;
                            }
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
