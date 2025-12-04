<?php
    session_start();

    // Eliminar todas las variables de sesión
    $_SESSION = array();

    // Destruir la sesión
    session_destroy();

    // Redirigir al usuario al login o página principal
    header("Location: index.php");
    exit();
?>
