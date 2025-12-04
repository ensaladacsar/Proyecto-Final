<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario - Peluquería MelenArte</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        .logo {
            max-height: 100px;
        }

        .register-box {
            background: #f8f9fa;
            border-radius: 15px;
            padding: 2rem;
            margin-top: 40px;
            max-width: 400px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.15);
        }

        .input-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: gray;
        }

        .input-field {
            padding-left: 40px;
        }

        .btn-register {
            background-color: rgb(107, 107, 107);
            color: white;
            width: 100%;
        }

        .btn-register:hover {
            background-color: #2c2d2f;
            color: white;
        }

        .login-link {
            display: block;
            margin-top: 12px;
            text-align: center;
            color: #2c2d2f;
            font-weight: bold;
            text-decoration: none;
        }

        .login-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <header>
            <nav class="px-4 navbar navbar-expand-lg navbar-light" style="background-color: #2c2d2f;"
                data-bs-theme="dark">
                <a class="navbar-brand" href="index.php">
                    <img src="img/logo.jpg" alt="Logo" class="logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <h1 style="color: whitesmoke;">Peluquería MelenArte</h1>
                    <div class="ms-auto">
                        <ul class="navbar-nav mr-auto">
                           <li class="nav-item" id="nav-login">
                                <a class="nav-link text-white" href="login.php">Iniciar Sesión</a>
                            </li>

                            <li class="nav-item" id="nav-register">
                                <a class="nav-link text-white" href="registro.php">Registrarme</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-white" href="index.php">Inicio</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-white" href="Portfolio/Peluqueros.php">Peluqueros</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-white" href="Portfolio/Catalogo.php">Catalogo</a>
                            </li>

                            <li class="nav-item" id="nav-cita">
                                <a class="nav-link text-white" href="Portfolio/Citas.php">Pedir cita</a>
                            </li>

                            <li class="nav-item d-none" id="nav-logout">
                                <a class="nav-link text-white" href="logout.php">Cerrar sesión</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>

    <!-- FORMULARIO -->
    <main class="container d-flex justify-content-center">
        <div class="register-box">
            <h3 class="text-center mb-3">Registro de Usuario</h3>

            <form action="registrarUsuario.php" method="POST">

                <div class="mb-3 position-relative">
                    <i class="fa fa-user-circle input-icon"></i>
                    <input type="text" name="nombre" class="form-control input-field" placeholder="Nombre" required>
                </div>

                <div class="mb-3 position-relative">
                    <i class="fa fa-user-circle input-icon"></i>
                    <input type="text" name="apellidos" class="form-control input-field" placeholder="Apellidos" required>
                </div>

                <div class="mb-3 position-relative">
                    <i class="fa fa-phone input-icon"></i>
                    <input type="int" name="telefono" class="form-control input-field" placeholder="Teléfono" required>
                </div>

                <div class="mb-3 position-relative">
                    <i class="fa fa-envelope input-icon"></i>
                    <input type="email" name="correo" class="form-control input-field" placeholder="Email" required>
                </div>

                <div class="mb-3 position-relative">
                    <i class="fa fa-lock input-icon"></i>
                    <input type="password" name="pw" class="form-control input-field" placeholder="Contraseña" required>
                </div>

                <button type="submit" class="btn btn-register">Registrar</button>

                <a href="login.php" class="login-link">¿Ya tienes una cuenta?<br>Inicia sesión aquí</a>
            </form>
        </div>
    </main>
    <br>
    <!-- FOOTER -->
           <footer class="py-4" data-bs-theme="dark" style="background-color: #2c2d2f;">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <img src="img/logo.jpg" alt="Logo" class="logo">
                        <p class="text-white">&copy; 2025</p>
                    </div>
                    <div class="col-md-4 pt-3 pt-md-0">
                        <h3 class="text-white">Enlaces</h3>
                        <p id="footer-login"><a class="nav-link text-white" href="login.php">Iniciar sesión</a></p>
                        <p id="footer-register"><a class="nav-link text-white" href="registro.php">Registrarme</a></p>
                        <p><a class="nav-link text-white" href="index.php">Inicio</a></p>
                        <p><a class="nav-link text-white" href="Portfolio/Peluqueros.php">Peluqueros</a></p>
                        <p><a class="nav-link text-white" href="Portfolio/Catalogo.php">Catalogo</a></p>
                        <p id="footer-cita"><a class="nav-link text-white" href="Portfolio/Citas.php">Citas</a></p>
                    </div>
                    <div class="col-md-4 pt-3 pt-md-0">
                        <h3 class="text-white">Contacto</h3>
                            <p class="text-white">C/ Sin nombre, SN</p>
                            <p class="text-white">Tlf. contacto: +34 123 45 67 89</p>
                            <p class="text-white">email: peluqueriamelenarte@gmail.com</p>
                    </div>
                </div>
            </div>
        </footer>

        <script>
        // Valor enviado desde PHP
        const isLogged = <?php echo isset($_SESSION["id_usuario"]) ? "true" : "false"; ?>;

        // NAV
        const navLogin = document.getElementById("nav-login");
        const navRegister = document.getElementById("nav-register");
        const navCita = document.getElementById("nav-cita");
        const navLogout = document.getElementById("nav-logout");

        // FOOTER
        const footerLogin = document.getElementById("footer-login");
        const footerRegister = document.getElementById("footer-register");
        const footerCita = document.getElementById("footer-cita");

        // BOTÓN DE "PIDE CITA AHORA"
        const btnCitaHome = document.getElementById("btn-cita-home");

        if (isLogged) {
            // SI ESTÁ LOGUEADO
            if (navLogin) navLogin.style.display = "none";
            if (navRegister) navRegister.style.display = "none";

            if (footerLogin) footerLogin.style.display = "none";
            if (footerRegister) footerRegister.style.display = "none";

            if (navCita) navCita.style.display = "block";
            if (footerCita) footerCita.style.display = "block";
            if (navLogout) navLogout.classList.remove("d-none");

        } else {
            // SI NO ESTÁ LOGUEADO
            if (navCita) navCita.style.display = "none";
            if (footerCita) footerCita.style.display = "none";
            if (btnCitaHome) btnCitaHome.style.display = "none";

            if (navLogout) navLogout.classList.add("d-none");
        }
        </script>

        <!-- Bootstrap JavaScript Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
            </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
            </script>


        <!-- Bootstrap JavaScript Libraries estas no las pone el visual studio code y se necesitan para el Modal -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.2/js/bootstrap.min.js"></script>

</body>

</html>
