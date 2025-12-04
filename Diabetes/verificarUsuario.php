<?php
session_start(); // Iniciar sesión

// Incluir el archivo login.php para obtener los datos de conexión
require_once 'login.php';

function verificarUsuario($un, $pw) {
    global $conn;
    if (isset($un) && isset($pw)) {
        $usuario = $conn->real_escape_string($un); // Evita inyección SQL
        $password = $pw;

        // CORREGIDO: Usamos la tabla correcta "usuario"
        $stmt = $conn->prepare("SELECT usuario, id_usu, contra FROM usuario WHERE usuario = ?");
        if (!$stmt) {
            die("Error en la consulta: " . $conn->error);
        }

        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Verificar la contraseña encriptada con password_verify()
            if (password_verify($password, $row['contra'])) {
                $_SESSION['id_usu'] = $row['id_usu'];
                $comprobar = $conn->query("SELECT id_usu FROM control_glucosa WHERE id_usu = '{$_SESSION['id_usu']}'");
                if ($comprobar->num_rows <= 0) {
                    $insert = $conn->query("INSERT INTO `control_glucosa`(`id_usu`, `fecha`) VALUES 
                    ('{$_SESSION['id_usu']}', curdate())");
                }
                $stmt->close();
                $conn->close();
                // Redirigir a la página principal
                                header("Location: menu.php");
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
    $un = $_POST['usuario'];
    $pw = $_POST['contra'];
    
    verificarUsuario($un, $pw);
}
?>