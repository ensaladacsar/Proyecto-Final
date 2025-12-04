
<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <title>Inicio: Peluquería MelenArte</title>
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
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


        <!-- Carrusel -->
        <div class="container mt-5">
            <div class="row align-items-center">
                <div class="col-sm-6" style="text-align: center;">
                    <h3>Aquí te mostramos unas fotos de nuestro establecimiento:</h3>
                    <p>2 fotos de la sala de peluquería y una de nuestra sección de productos.</p>
                </div>
                <div class="col-sm-6 mb-4">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <!-- data-bs-ride="carousel" sirve para que el carousel pase las imágenes automáticamente -->
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="5000">
                                <!-- data-bs-interval="5000" sirve para especificar el tiempo en el que se pasa el carousel -->
                                <img src="img/interior1.jpg" class="d-block w-100" alt="Imagen interior peluqueria 1">
                            </div>

                            <div class="carousel-item" data-bs-interval="5000">
                                <img src="img/interior2.jpg" class="d-block w-100" alt="Imagen interior peluqueria 2">
                            </div>

                            <div class="carousel-item" data-bs-interval="5000">
                                <img src="img/interior3.jpg" class="d-block w-100" alt="Imagen interior peluqueria 3">
                            </div>

                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden"></span>
                        </button>

                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fin del carrusel -->
        <main class="container">
            <div class="row mt-2 mb-4">
                <div class=" mx-auto ">
                    <div class="mb-5">
                        <hr class="my-4" style="border-top: 2px solid; border-width: 5px; border-color: #2c2d2f;">
                        <!-- Línea divisoria -->
                    </div>
                    <h3><b>Estilo en cada recorte, magia en cada mechón</b></h3>
                    <br/>
                    <p>
                        En la Peluquería y Barbería masculina MelenArte llevamos más de 5 años dediicándonos al cuidado
                        y estilizado del cabello de miles de clientes satisfechos.
                        Aquí, contarás con un servicio personalizado cada cliente de mano de nuestros estilistas así
                        como consejos para el cuidado y mantenimiento de tu pelo y cuero cabelludo.
                        Además, puedes optar por adquirir cualquiera de los productos asequibles y de calidad que
                        utilizamos habitualmente aquí en nuestro establecimiento.
                    </p>
                    <br/>
                    <p>
                        Aquí, en nuestra página web, podrás revisar los productos con los que trabajamos y si te gustan
                        comprarlos, así como pedir citas vía online.
                    </p> 
                </div>
                <div class="mt-5 mb-4 text-center" id="btn-cita-home">
                    <a href="Portfolio/Citas.php" class="btn btn-dark">¡Pide cita ahora!</a>
                </div>
            </div>
        </main>

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

    </div>
</body>

</html>