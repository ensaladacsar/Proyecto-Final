<?php
	session_start();
    // Incluir el archivo login.php para obtener los datos de conexión
    include '../login.php';
    if (!isset($_SESSION["id_usu"])) {
        echo '<script>
            window.location.href = "../index.html";
        </script>';
        exit();
        exit();
    }
    // Se obtienen los datos del formulario
    if ($_POST != NULL) { 
        $tipo_comida = $_POST['tipo_comida'];
        $fecha = $_POST['fecha'];
        $gl_1h = $_POST['gl_1h'];
        $raciones = $_POST['raciones'];
        $insulina = $_POST['insulina'];
        $gl_2h = $_POST['gl_2h'];
        $id_usu = $_SESSION['id_usu'];
        
        // Actualizar la tabla comidas
        $sql = "UPDATE comida SET fecha=?, gl_1h=?, gl_2h=?, raciones=?, insulina=?, tipo_comida=? WHERE id_usu=? AND fecha=? AND tipo_comida=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("siiississ", $fecha, $gl_1h, $gl_2h, $raciones, $insulina, $tipo_comida, $id_usu, $fecha, $tipo_comida);
        
        if ($stmt->execute()) {
            // Insertar en hiperglucemia si se activó la casilla
            if (!empty($_POST['glucosa_hiper'])) {
                $glucosa_hiper = $_POST['glucosa_hiper'];
                $hora_hiper = $_POST['hora_hiper'];
                $correccion = $_POST['correccion'];
                
                $sql_hiper = "UPDATE hiperglucemia SET glucosa=?, hora=?, correccion=? WHERE id_usu=? AND fecha=? AND tipo_comida=?";
                $stmt_hiper = $conn->prepare($sql_hiper);
                $stmt_hiper->bind_param("isiiss", $glucosa_hiper, $hora_hiper, $correccion, $id_usu, $fecha, $tipo_comida);
                $stmt_hiper->execute();
            }
            
            // Insertar en hipoglucemia si se activó la casilla
            if (!empty($_POST['glucosa_hipo'])) {
                $glucosa_hipo = $_POST['glucosa_hipo'];
                $hora_hipo = $_POST['hora_hipo'];
                
                $sql_hipo = "UPDATE hipoglucemia SET glucosa=?, hora=? WHERE id_usu=? AND fecha=? AND tipo_comida=?";
                $stmt_hipo = $conn->prepare($sql_hipo);
                $stmt_hipo->bind_param("isiss", $glucosa_hipo, $hora_hipo, $id_usu, $fecha, $tipo_comida);
                $stmt_hipo->execute();
            }
            
            $_SESSION['log'] = "<span style='color: green;'>Registro actualizado exitosamente.</span>";
        } else {
            $_SESSION['log'] = "<span style='color: red;'>Error al actualizar el registro: </span>" . $stmt->error;
        }
        $conn->close();
    }
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Registro</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function toggleFields(id, display) {
            document.getElementById(id).style.display = display ? "block" : "none";
        }
    </script>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #ea6f66, #764ba2);
            font-family: Arial, sans-serif;
            margin: 0;
        }
        .container {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            width: 100%;
            max-width: 500px; /* Reducido de 600px a 500px */
            box-sizing: border-box;
            margin: 2rem 0; /* Añadido margen superior e inferior */
        }
        .container h2 {
            margin-bottom: 1rem;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1rem;
        }
        input, select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            box-sizing: border-box;
        }
        .btn-action {
            background: #965fce;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: 0.3s;
            box-sizing: border-box;
        }
        .btn-action:hover {
            background: #764ba2;
        }
        .register-link {
            margin-top: 15px;
            display: block;
            color: #764ba2;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: bold;
            text-align: center;
        }
        .register-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Modificar registro en la Agenda de Control</h2>
        <form action="modTabla.php" method="post">
            <label for="tipo_comida">Tipo de Comida:</label>
            <select id="tipo_comida" name="tipo_comida" required>
                Selecciona una opción
                <option value="Desayuno">Desayuno</option>
                <option value="Mediodia">Medio Día</option>
                <option value="Comida">Comida</option>
                <option value="Merienda">Merienda</option>
                <option value="Cena">Cena</option>
            </select>
        <div class="row">
            <div class="col-12">
                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha" name="fecha" required>
            </div>
            <div class="col-6">
                <label for="gl_1h">Glucosa 1 hora antes:</label>
                <input type="number" id="gl_1h" name="gl_1h" min="80" max="150" required>
            </div>
            <div class="col-6">
                <label for="raciones">Raciones de comida:</label>
                <input type="number" id="raciones" name="raciones" min="1" max="10" required>
            </div>
            <div class="col-6">
                <label for="insulina">Dosis de insulina:</label>
                <input type="number" id="insulina" name="insulina" min="1" max="20" required>
            </div>
            <div class="col-6">
                <label for="gl_2h">Glucosa 2 horas después:</label>
                <input type="number" id="gl_2h" name="gl_2h" min="80" max="150" required>
            </div>
            <label>
                <input type="radio" name="radio-btn" value="hiper" id="hiper_check"> ¿Tuvo hiperglucemia?
            </label>
            <div id="hiper_fields" style="display: none;">
                <label for="glucosa_hiper">Glucosa (mg/dL):</label>
                <input type="number" id="glucosa_hiper" name="glucosa_hiper" min="80" max="600">

                <label for="hora_hiper">Hora:</label>
                <input type="time" id="hora_hiper" name="hora_hiper">

                <label for="correccion">Corrección (insulina):</label>
                <input type="number" id="correccion" name="correccion" min="0" max="50">
            </div>

            <label>
                <input type="radio" name="radio-btn" value="hipo" id="hipo_check"> ¿Tuvo hipoglucemia?
            </label>
            <div id="hipo_fields" style="display: none;">
                <label for="glucosa_hipo">Glucosa (mg/dL):</label>
                <input type="number" id="glucosa_hipo" name="glucosa_hipo" min="20" max="70">

                <label for="hora_hipo">Hora:</label>
                <input type="time" id="hora_hipo" name="hora_hipo">
            </div>
                <script>
                    document.addEventListener("DOMContentLoaded", function() { 
                        let hiperCheck = document.getElementById("hiper_check");
                        let hipoCheck = document.getElementById("hipo_check");
                        let hiperFields = document.getElementById("hiper_fields");
                        let hipoFields = document.getElementById("hipo_fields");
                        let form = document.querySelector("form");

                        function toggleFields() {
                            if (hiperCheck.checked) {
                                hiperFields.style.display = "block";
                                hipoFields.style.display = "none";
                                hipoCheck.checked = false;
                            } else {
                                hiperFields.style.display = "none";
                            }

                            if (hipoCheck.checked) {
                                hipoFields.style.display = "block";
                                hiperFields.style.display = "none";
                                hiperCheck.checked = false;
                            } else {
                                hipoFields.style.display = "none";
                            }
                        }

                        hiperCheck.addEventListener("click", function() {
                            if (this.checked && this.dataset.checked === "true") {
                                this.checked = false;
                                hiperFields.style.display = "none";
                            }
                            this.dataset.checked = this.checked;
                            hipoCheck.dataset.checked = false;
                        });

                        hipoCheck.addEventListener("click", function() {
                            if (this.checked && this.dataset.checked === "true") {
                                this.checked = false;
                                hipoFields.style.display = "none";
                            }
                            this.dataset.checked = this.checked;
                            hiperCheck.dataset.checked = false;
                        });

                        hiperCheck.addEventListener("change", toggleFields);
                        hipoCheck.addEventListener("change", toggleFields);

                        form.addEventListener("submit", function(event) {
                            let errorMsg = "";

                            if (hiperCheck.checked) {
                                let glucosaHiper = document.getElementById("glucosa_hiper").value;
                                let horaHiper = document.getElementById("hora_hiper").value;
                                let correccion = document.getElementById("correccion").value;

                                if (!glucosaHiper || !horaHiper || !correccion) {
                                    errorMsg = "Debe llenar todos los campos de hiperglucemia.";
                                }
                            }

                            if (hipoCheck.checked) {
                                let glucosaHipo = document.getElementById("glucosa_hipo").value;
                                let horaHipo = document.getElementById("hora_hipo").value;

                                if (!glucosaHipo || !horaHipo) {
                                    errorMsg = "Debe llenar todos los campos de hipoglucemia.";
                                }
                            }

                            if (errorMsg) {
                                alert(errorMsg);
                                event.preventDefault();
                            }
                        });
                    });
                </script>
        </div>
        <button type="submit" class="btn-action">Modificar registro</button>
        <a href="../menu.php" class="register-link">Volver al inicio</a>
        </form>
    </div>
</body>
</html>
