
<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Peluqueros: Peluquería MelenArte</title>
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .container-fluid{
            width: 100%;
            padding: 0;
        }
        .logo {
            max-height: 100px;
        }

        .card {
            height: 100%;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <!-- Barra de navegación -->
       <header>
            <nav class="px-4 navbar navbar-expand-lg navbar-light" style="background-color: #2c2d2f;"
                data-bs-theme="dark">
                <a class="navbar-brand" href="../index.php">
                    <img src="../img/logo.jpg" alt="Logo" class="logo">
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
                                <a class="nav-link text-white" href="../login.php">Iniciar Sesión</a>
                            </li>

                            <li class="nav-item" id="nav-register">
                                <a class="nav-link text-white" href="../registro.php">Registrarme</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-white" href="../index.php">Inicio</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-white" href="./Peluqueros.php">Peluqueros</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-white" href="./Catalogo.php">Catalogo</a>
                            </li>

                            <li class="nav-item" id="nav-cita">
                                <a class="nav-link text-white" href="./Citas.php">Pedir cita</a>
                            </li>

                            <li class="nav-item d-none" id="nav-admin-citas">
                                <a class="nav-link text-white" href="./AdminCitas.php">Gestionar Citas</a>
                            </li>

                            <li class="nav-item d-none" id="nav-logout">
                                <a class="nav-link text-white" href="../logout.php">Cerrar sesión</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>


        <!-- Tarjetas -->
        <main>
            <section class="container mt-4 mb-4">
                <h2 class="text-center">Nuestros profesionales</h2>
                <div class="row mt-3">
                    <!-- Tarjetas de los peluqueros -->
                    <div class="col-md-3 mb-4 col-sm-6">
                        <div class="card h-100">
                            <img src="../img/Victor.jpg" alt="Victor" class="card-img-top">
                            <div class="card-body">
                                <h2 class="card-title">Victor</h2>
                                <p class="card-text">Dueño del local.</p>
                                <button type="button" class="btn" data-bs-toggle="modal"
                                    data-bs-target="#horariosVictor"
                                    style="background-color: rgb(107, 107, 107); color: white;">
                                    Ver horarios
                                </button>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-3 mb-4 col-sm-6">
                        <div class="card h-100">
                            <img src="../img/Ricardo.png" alt="Ricardo" class="card-img-top">
                            <div class="card-body">
                                <h2 class="card-title">Ricardo</h2>
                                <p class="card-text">Pelo largo y esteticien.</p>
                                <button type="button" class="btn" data-bs-toggle="modal"
                                    data-bs-target="#horariosRicardo"
                                    style="background-color: rgb(107, 107, 107); color: white;">
                                    Ver horarios
                                </button>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-3 mb-4 col-sm-6">
                        <div class="card h-100">
                            <img src="../img/Michael.png" alt="Michael" class="card-img-top">
                            <div class="card-body">
                                <h2 class="card-title">Michael</h2>
                                <p class="card-text">Rastas y degradados.</p>
                                <button type="button" class="btn" data-bs-toggle="modal"
                                    data-bs-target="#horariosMichael"
                                    style="background-color: rgb(107, 107, 107); color: white;">
                                    Ver horarios
                                </button>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-3 mb-4 col-sm-6">
                        <div class="card h-100">
                            <img src="../img/Idris.png" alt="Idris" class="card-img-top">
                            <div class="card-body">
                                <h2 class="card-title">Idris</h2>
                                <p class="card-text">Afro y trenzas</p>
                                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#horariosIdris"
                                    style="background-color: rgb(107, 107, 107); color: white;">
                                    Ver horarios
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <!-- Modales para mostrar los horarios de cada peluquero -->
        <!-- Victor -->
        <div class="modal fade" id="horariosVictor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Horarios de Victor</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Horarios de Victor -->
                        <p>Lunes a Viernes: 9:00 AM - 6:00 PM</p>
                        <p>Sábado: Descanso</p>
                        <p>Domingo: Cerrado</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Michael -->
        <div class="modal fade" id="horariosMichael" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Horarios de Michael</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Horarios de Michael -->
                        <p>Lunes a Viernes: 9:00 AM - 6:00 PM</p>
                        <p>Sábado: Descanso</p>
                        <p>Domingo: Cerrado</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Ricardo -->
        <div class="modal fade" id="horariosRicardo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Horarios de Ricardo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Horarios de Ricardo -->
                        <p>Lunes a Viernes: 9:00 AM - 6:00 PM</p>
                        <p>Sábado: Descanso</p>
                        <p>Domingo: Cerrado</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Idris -->
        <div class="modal fade" id="horariosIdris" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Horarios de Idris</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Horarios de Idris -->
                        <p>Lunes a Viernes: 9:00 AM - 6:00 PM</p>
                        <p>Sábado: Descanso</p>
                        <p>Domingo: Cerrado</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Agrega más modales de horarios para otros peluqueros aquí -->

        </section>
        </main>

        <footer class="py-4" data-bs-theme="dark" style="background-color: #2c2d2f;">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <img src="../img/logo.jpg" alt="Logo" class="logo">
                        <p class="text-white">&copy; 2025</p>
                    </div>
                    <div class="col-md-4 pt-3 pt-md-0">
                        <h3 class="text-white">Enlaces</h3>
                        <p id="footer-login">
                            <a class="nav-link text-white" href="login.php">Iniciar sesión</a>
                        </p>

                        <p id="footer-register">
                            <a class="nav-link text-white" href="registro.php">Registrarme</a>
                        </p>

                        <p>
                            <a class="nav-link text-white" href="index.php">Inicio</a>
                        </p>

                        <p>
                            <a class="nav-link text-white" href="Portfolio/Peluqueros.php">Peluqueros</a>
                        </p>

                        <p>
                            <a class="nav-link text-white" href="Portfolio/Catalogo.php">Catalogo</a>
                        </p>

                        <p id="footer-cita">
                            <a class="nav-link text-white" href="Portfolio/Citas.php">Citas</a>
                        </p>

                        <p class="d-none" id="footer-admin-citas">
                            <a class="nav-link text-white" href="Portfolio/AdminCitas.php">Gestionar Citas</a>
                        </p>
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
        // Valores desde PHP
        const isLogged = <?php echo isset($_SESSION["id_usuario"]) ? "true" : "false"; ?>;
        const isAdmin = <?php echo (isset($_SESSION["rol"]) && $_SESSION["rol"] === "empleado") ? "true" : "false"; ?>;

        // NAV
        const navLogin = document.getElementById("nav-login");
        const navRegister = document.getElementById("nav-register");
        const navCita = document.getElementById("nav-cita");
        const navLogout = document.getElementById("nav-logout");
        const navAdminCitas = document.getElementById("nav-admin-citas");

        // FOOTER
        const footerLogin = document.getElementById("footer-login");
        const footerRegister = document.getElementById("footer-register");
        const footerCita = document.getElementById("footer-cita");
        const footerAdminCitas = document.getElementById("footer-admin-citas");

        // Botón "Pide cita ahora"
        const btnCitaHome = document.getElementById("btn-cita-home");

        if (isLogged) {

            // Ocultar login/registro en nav y footer
            if (navLogin) navLogin.style.display = "none";
            if (navRegister) navRegister.style.display = "none";
            if (footerLogin) footerLogin.style.display = "none";
            if (footerRegister) footerRegister.style.display = "none";

            // Mostrar cerrar sesión
            if (navLogout) navLogout.classList.remove("d-none");

            // CLIENTE
            if (!isAdmin) {
                if (navCita) navCita.style.display = "block";
                if (footerCita) footerCita.style.display = "block";
                if (btnCitaHome) btnCitaHome.style.display = "block";

                if (navAdminCitas) navAdminCitas.classList.add("d-none");
                if (footerAdminCitas) footerAdminCitas.classList.add("d-none");
            }

            // ADMIN
            if (isAdmin) {
                if (navAdminCitas) navAdminCitas.classList.remove("d-none");
                if (footerAdminCitas) footerAdminCitas.classList.remove("d-none");

                if (navCita) navCita.style.display = "none";
                if (footerCita) footerCita.style.display = "none";
                if (btnCitaHome) btnCitaHome.style.display = "none";
            }

        } else {

            // USUARIO SIN SESIÓN
            if (navCita) navCita.style.display = "none";
            if (footerCita) footerCita.style.display = "none";
            if (btnCitaHome) btnCitaHome.style.display = "none";

            if (navLogout) navLogout.classList.add("d-none");
            if (navAdminCitas) navAdminCitas.classList.add("d-none");
            if (footerAdminCitas) footerAdminCitas.classList.add("d-none");
        }
        </script>
        <script>
            const isLogged = <?php echo isset($_SESSION["id_usuario"]) ? "true" : "false"; ?>;
            const isAdmin = <?php echo (isset($_SESSION["rol"]) && $_SESSION["rol"] === "empleado") ? "true" : "false"; ?>;
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