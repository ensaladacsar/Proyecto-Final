
<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Catálogo de Productos – Peluquería MelenArte</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .container-fluid{
            width: 100%;
            padding: 0;
        }
        .logo {
            max-height: 100px;
        }
        .producto-item {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 20px;
            border: 1px solid #ddd;
        }
        .producto-item img {
            width: 120px;
            border-radius: 8px;
        }
        .producto-info h3 {
            margin: 0;
            font-size: 1.4rem;
        }
        .producto-info p {
            margin: 5px 0;
        }
    </style>
</head>

<body>

    <div class="container-fluid">

        <!-- Navbar -->
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

        <!-- Catálogo -->
        <main>
            <div class="container mt-4">

                <h2 class="mb-4">Catálogo de productos</h2>
                <p>*Productos disponibles solo en tienda, el precio se añade a la factura final tras el tratamiento*</p>

                <!-- Producto 1 -->
                <?php
                    require_once '../conexion.php'; // Incluimos la conexión existente

                    // Consulta para obtener los datos de mis productos
                    $stmt = $conn->prepare("SELECT * FROM productos");
                    $stmt->execute();
                    $result = $stmt->get_result();

                    for($i = 0; $i < $result->num_rows; $i++){
                        $row = $result->fetch_assoc();
                    
                ?>
                    <div class="producto-item">
                        <img src="<?= $row["imagen"] ?>" alt="Champú nutritivo"> <!--Los ?= es lo mismo que hacer una etiqueta php con un echo -->
                        <div class="producto-info">
                            <h3><?= $row["nombre"] ?></h3>
                            <p><?= $row["descripcion"] ?></p>
                            <strong>Precio: <?= $row["precio"] ?></strong>
                        </div>
                    </div>
                <?php
                    }
                ?>
            </div>
        </main>

        <!-- Footer -->
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
                            <a class="nav-link text-white" href="../login.php">Iniciar sesión</a>
                        </p>

                        <p id="footer-register">
                            <a class="nav-link text-white" href="../registro.php">Registrarme</a>
                        </p>

                        <p>
                            <a class="nav-link text-white" href="../index.php">Inicio</a>
                        </p>

                        <p>
                            <a class="nav-link text-white" href="./Peluqueros.php">Peluqueros</a>
                        </p>

                        <p>
                            <a class="nav-link text-white" href="./Catalogo.php">Catalogo</a>
                        </p>

                        <p id="footer-cita">
                            <a class="nav-link text-white" href="./Citas.php">Citas</a>
                        </p>

                        <p class="d-none" id="footer-admin-citas">
                            <a class="nav-link text-white" href="./AdminCitas.php">Gestionar Citas</a>
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
