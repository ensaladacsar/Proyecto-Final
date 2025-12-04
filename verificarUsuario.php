<?php
session_start(); // Iniciar sesión

// Incluir el archivo login.php para obtener los datos de conexión
require_once 'conexion.php';

function verificarUsuario($correo, $pw) {
    global $conn;
    if (isset($correo) && isset($pw)) {
        $correo = $conn->real_escape_string($correo); // Evita inyección SQL
        $password = $pw;

        // CORREGIDO: Usamos la tabla correcta "usuario"
        $stmt = $conn->prepare("SELECT correo, id_usuario, contraseña FROM usuarios WHERE correo = ?");
        if (!$stmt) {
            die("Error en la consulta: " . $conn->error);
        }

        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Verificar la contraseña encriptada con password_verify()
            if (password_verify($password, $row['contraseña'])) {
                $_SESSION['id_usuario'] = $row['id_usuario'];
                $stmt->close();
                $conn->close();
                // Redirigir a la página principal
                header("Location: index.php");
                exit(); // Asegúrate de usar exit después de header
            } else {
                echo "Usuario o contraseña incorrectos.<br>";
            }
        } else {
            echo "Usuario o contraseña incorrectos.<br>";
        }
    }
}

// Verificar si se ha enviado el formulario de login
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correo = $_POST['correo'];
    $pw = $_POST['contraseña'];
    
    verificarUsuario($correo, $pw);
}
?>