
<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pedir cita: Peluquería MelenArte</title>
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

        <!-- Formulario -->
        <div class="row mt-5 mb-5 justify-content-evenly align-items-center"> <!-- Fila con 5 de margin top y 5 de margin bottom con el contenido e items centrados -->
            <div class="col-md-3"> <!-- Columna para el dormulario -->
                <h1 class="mb-4">Pedir Cita</h1>
                <form action="procesar_cita.php" method="POST">

                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha de la cita</label>
                        <input type="date" class="form-control" id="fecha" name="fecha" required>
                    </div>

                    <div class="mb-3">
                        <label for="hora" class="form-label">Hora de la cita</label>
                        <select class="form-control" id="hora" name="hora" required>
                            <option value="">Seleccione primero una fecha</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="mensaje" class="form-label">Mensaje (opcional)</label>
                        <textarea class="form-control" id="mensaje" name="comentario" rows="3"></textarea>
                    </div>

                    <button type="submit" class="btn" style="background-color: rgb(107, 107, 107); color: white;">
                        Enviar Cita
                    </button>

                </form>

            </div>
            <div class="col-md-5 pt-4 pt-md-0">
                <div class="ratio ratio-16x9"> <!-- El iframe es como una etiqueta para integrar una función de una página web dentro de mi página -->
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d96714.68291250926!2d-74.05953969406828!3d40.75468158321536!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2588f046ee661%3A0xa0b3281fcecc08c!2sManhattan%2C%20Nowy%20Jork%2C%20Stany%20Zjednoczone!5e0!3m2!1spl!2spl!4v1672242259543!5m2!1spl!2spl"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                  </div>
            </div>
        </div>

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
        // HORARIO DE LA PELUQUERÍA (modifícalo si quieres)
        const horasDisponibles = [
            "09:00", "09:30", "10:00", "10:30",
            "11:00", "11:30", "12:00", "12:30",
            "17:00", "17:30", "18:00"
        ];

        document.getElementById("fecha").addEventListener("change", function () {
            const fechaSeleccionada = this.value;

            if (!fechaSeleccionada) return;

            fetch("horas_ocupadas.php?fecha=" + fechaSeleccionada)
                .then(response => response.json())
                .then(ocupadas => {
                    const horaSelect = document.getElementById("hora");
                    horaSelect.innerHTML = ""; // limpiar opciones

                    horasDisponibles.forEach(hora => {
                        const option = document.createElement("option");
                        option.value = hora;
                        option.textContent = hora;

                        if (ocupadas.includes(hora)) {
                            option.disabled = true;
                            option.textContent += " (ocupada)";
                        }

                        horaSelect.appendChild(option);
                    });
                });
        });
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