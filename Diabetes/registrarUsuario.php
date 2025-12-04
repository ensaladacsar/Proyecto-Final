<?php
session_start(); // Iniciar sesión

// Incluir el archivo login.php para obtener los datos de conexión
require_once 'login.php';

function registrarUsuario($nombre, $apellidos, $fecha_nacimiento, $un, $pw) {
    global $conn;
    $sql_check = "SELECT id_usu FROM usuario WHERE usuario = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("s", $un);
    $stmt_check->execute();
    $stmt_check->store_result();
    
    if ($stmt_check->num_rows > 0) {
        // Usuario ya existe
        $_SESSION['log'] = "<span style='color: red;'>El nombre de usuario ya está en uso. Elige otro.</span>";
        echo '<script>
            window.location.href = "registro.html";
        </script>';
        exit();
    }
    
    $stmt_check->close();

    // Si el usuario no existe, proceder con el registro
    $password_hashed = password_hash($pw, PASSWORD_BCRYPT);
    $inst = $conn->prepare('INSERT INTO usuario (nombre, apellidos, fecha_nacimiento, usuario, contra) VALUES (?,?,?,?,?)');
    $inst->bind_param('sssss', $nombre, $apellidos, $fecha_nacimiento, $un, $password_hashed);
    $inst->execute();
    
    echo '<script>
        window.location.href = "index.html";
    </script>';
    exit();
}

registrarUsuario($_POST['nombre'], $_POST['apellidos'], $_POST['fecha_nacimiento'], $_POST['un'], $_POST['pw']);
?>