<?php
session_start();
include '../conexion.php';

// SOLO EMPLEADOS PUEDEN ENTRAR
if (!isset($_SESSION["id_usuario"]) || $_SESSION["rol"] !== "empleado") {
    echo "<script>alert('No tienes permisos para acceder.'); window.location.href='../index.php';</script>";
    exit();
}

// Cargar todas las citas
$query = "SELECT c.*, cli.nombre AS cliente_nombre, cli.apellidos AS cliente_apellidos
          FROM citas c
          INNER JOIN usuarios cli ON c.id_cliente = cli.id_usuario
          ORDER BY c.fecha DESC, c.hora ASC";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Citas – Peluquería MelenArte</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: white;
            color: black;
        }
        .logo { max-height: 100px; }
        .table thead { background-color: #2f2c31ff; color: white; }
        .table tbody tr:nth-child(even) { background-color: #f5f5f5; }
        .btn-custom { background-color: #2f2c31ff; color: white; }
    </style>
</head>
<body>

<!-- NAVBAR -->
<header>
    <nav class="px-4 navbar navbar-expand-lg navbar-light" style="background-color: #2c2d2f;" data-bs-theme="dark">
        <a class="navbar-brand" href="../index.php"><img src="../img/logo.jpg" class="logo" alt="Logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <h1 style="color: whitesmoke;">Peluquería MelenArte</h1>
            <div class="ms-auto">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link text-white" href="../index.php">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="AdminCitas.php">Gestionar Citas</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="../logout.php">Cerrar sesión</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

<main class="container mt-5 mb-5">
    <h2 class="text-center text-grey mb-4">Gestión de Citas</h2>

    <!-- BOTÓN AÑADIR -->
    <div class="text-end mb-3">
        <button class="btn btn-custom" data-bs-toggle="modal" data-bs-target="#modalAgregar">+ Añadir cita</button>
    </div>

    <!-- TABLA DE CITAS -->
    <!-- TABLA DE CITAS CON CONTAINER ESTÉTICO -->
    <div class="table-container">
        <div class="table-responsive">
            <table class="table table-bordered text-center align-middle">
                <thead>
                    <tr>
                        <th style="background-color: #2c2d2f;" class="text-white">ID</th>
                        <th style="background-color: #2c2d2f;" class="text-white">Cliente</th>
                        <th style="background-color: #2c2d2f;" class="text-white">Fecha</th>
                        <th style="background-color: #2c2d2f;" class="text-white">Hora</th>
                        <th style="background-color: #2c2d2f;" class="text-white">Comentario</th>
                        <th style="background-color: #2c2d2f;" class="text-white">Estado</th>
                        <th style="background-color: #2c2d2f;" class="text-white">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row['id_cita'] ?></td>
                            <td><?= $row['cliente_nombre'] . ' ' . $row['cliente_apellidos'] ?></td>
                            <td><?= $row['fecha'] ?></td>
                            <td><?= $row['hora'] ?></td>
                            <td><?= htmlspecialchars($row['comentario']) ?></td>
                            <td><?= $row['estado'] ?></td>
                            <td>
                                <button class="btn btn-warning btn-sm" 
                                    onclick="editarCita(<?= $row['id_cita'] ?>,'<?= $row['fecha'] ?>','<?= $row['hora'] ?>','<?= htmlspecialchars($row['comentario']) ?>','<?= $row['estado'] ?>')"
                                    data-bs-toggle="modal" data-bs-target="#modalEditar">✏ Editar</button>

                                <a href="borrarCita.php?id=<?= $row['id_cita'] ?>" 
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('¿Seguro que deseas eliminar esta cita?')">🗑 Borrar</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<!-- MODAL AÑADIR -->
<div class="modal fade" id="modalAgregar" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="procesarAgregar.php" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Añadir nueva cita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <label>Cliente:</label>
                    <select name="id_cliente" class="form-select" required>
                        <?php 
                        $clientes = $conn->query("SELECT id_usuario, nombre, apellidos FROM usuarios WHERE rol='cliente'");
                        while($cli = $clientes->fetch_assoc()) {
                            echo "<option value='{$cli['id_usuario']}'>{$cli['nombre']} {$cli['apellidos']}</option>";
                        }
                        ?>
                    </select>
                    <label class="mt-2">Fecha:</label>
                    <input type="date" name="fecha" class="form-control" required>
                    <label class="mt-2">Hora:</label>
                    <input type="time" name="hora" class="form-control" required>
                    <label class="mt-2">Comentario:</label>
                    <textarea name="comentario" class="form-control"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="add_cita" class="btn btn-custom">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- MODAL EDITAR -->
<div class="modal fade" id="modalEditar" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="procesarEditar.php" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Editar cita</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="id_cita" id="edit-id">
                    <label>Fecha:</label>
                    <input type="date" name="fecha" id="edit-fecha" class="form-control">
                    <label class="mt-2">Hora:</label>
                    <input type="time" name="hora" id="edit-hora" class="form-control">
                    <label class="mt-2">Comentario:</label>
                    <textarea name="comentario" id="edit-comentario" class="form-control"></textarea>
                    <label class="mt-2">Estado:</label>
                    <select name="estado" id="edit-estado" class="form-select">
                        <option value="confirmada">Confirmada</option>
                        <option value="atrasada">Atrasada</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-custom">Guardar cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function editarCita(id, fecha, hora, comentario, estado){
    document.getElementById("edit-id").value = id;
    document.getElementById("edit-fecha").value = fecha;
    document.getElementById("edit-hora").value = hora;
    document.getElementById("edit-comentario").value = comentario;
    document.getElementById("edit-estado").value = estado;
}
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
