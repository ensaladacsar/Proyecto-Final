<?php

session_start(); // Iniciar sesión

// Incluir el archivo login.php para obtener los datos de conexión
require_once 'conexion.php';

function registrarUsuario($nombre, $apellidos, $telefono, $correo, $pw, $cliente = "cliente") {
    global $conn;
    $sql_check = "SELECT id_usuario FROM usuarios WHERE correo = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("s", $correo);
    $stmt_check->execute();
    $stmt_check->store_result();
    
    if ($stmt_check->num_rows > 0) {
        // Usuario ya existe
        $_SESSION['log'] = "<span style='color: red;'>El correo electrónico ya está en uso. Introduce uno válido.</span>";
        echo '<script>
            window.location.href = "index.php";
        </script>';
        exit();
    }
    
    $stmt_check->close();

    // Si el usuario no existe, proceder con el registro
    $password_hashed = password_hash($pw, PASSWORD_BCRYPT);
    $inst = $conn->prepare('INSERT INTO usuarios (nombre, apellidos, telefono, correo, contraseña, rol) VALUES (?,?,?,?,?,?)');
    $inst->bind_param('ssisss', $nombre, $apellidos, $telefono, $correo, $password_hashed, $cliente);
    $inst->execute();
    
    echo '<script>
        window.location.href = "index.php";
    </script>';
    exit();
}

registrarUsuario($_POST['nombre'], $_POST['apellidos'], $_POST['telefono'], $_POST['correo'], $_POST['pw']);
?>