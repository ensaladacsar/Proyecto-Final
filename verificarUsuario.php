<?php
session_start();

require_once 'conexion.php';

function verificarUsuario($correo, $pw) {
    global $conn;

    if (!empty($correo) && !empty($pw)) {

        $stmt = $conn->prepare("
            SELECT id_usuario, correo, contraseña, rol 
            FROM usuarios 
            WHERE correo = ?
        ");

        if (!$stmt) {
            die("Error en la consulta: " . $conn->error);
        }

        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 1) {

            $row = $result->fetch_assoc();
            $passwordBD = $row["contraseña"];

            // ACEPTA CONTRASEÑA HASH O NORMAL (BD manual)
            if (password_verify($pw, $passwordBD) || $pw === $passwordBD) {

                // GUARDAR TODA LA INFORMACIÓN NECESARIA
                $_SESSION['id_usuario'] = $row['id_usuario'];
                $_SESSION['correo'] = $row['correo'];
                $_SESSION['rol'] = $row['rol'];   // <<<<<< IMPORTANTE

                // REDIRECCIÓN
                header("Location: index.php");
                exit;
            } 
            else {
                echo "<script>alert('Contraseña incorrecta'); window.location='login.php';</script>";
            }
        } 
        else {
            echo "<script>alert('Usuario no encontrado'); window.location='login.php';</script>";
        }

        $stmt->close();
        $conn->close();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    verificarUsuario($_POST['correo'], $_POST['contraseña']);
}
?>
