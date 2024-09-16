<?php

/**Ejercicio 4 – Crear una página “NuevaPersona.php” que contenga un formulario que permita solicitar todos
 los datos de una persona. Estos datos serán enviados a una página “accionNuevaPersona.php” que cargue
 un nuevo registro en la tabla persona de la base de datos. Se debe mostrar un mensaje que indique si se
 pudo o no cargar los datos de la persona. Utilizar css y validaciones javaScript cuando crea conveniente.
 Recordar usar la capa de control antes generada, no se puede acceder directamente a las clases del ORM.
 */


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Persona</title>

    <link rel="stylesheet" href="assets/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <script src="assets/js/jquery-3.7.1.min.js"></script>
    <script src="assets/js/jquery.validate.js"></script>
    <link rel="stylesheet" href="assets/css/validate.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="conteiner-fluid bg-secondary-subtle">

    <!-- Navbar -->
    <?php include_once("Estructura/Navbar.php"); ?>

    <main class="container my-1">

        <div class="conteiner-m conteiner-fluid bg-secondary-subtle">
            <div class="conteiner mx-5">
                <div class="conteiner mx-5 p-5 text-center">
                    <div class="bg-light-subtle border border-2 border-secondary rounded shadow mx-5 p-5">
                        <h3> Nueva Persona</h3>
                        <form id="formNuevaPersona" action="accion/accionNuevaPersona.php" method=POST class="needs-validation" novalidate>
                            <div class="mb-3">
                                <label for="NroDni" class="form-label">Ingrese el DNI</label>
                                <input type="text" class="form-control" name="NroDni" id="NroDni" required>

                            </div>
                            <div class="mb-3">
                                <label for="Apellido" class="form-label">Ingrese el Apellido</label>
                                <input type="text" class="form-control" name="Apellido" id="Apellido" required>

                            </div>
                            <div class="mb-3">
                                <label for="Nombre" class="form-label">Ingrese el Nombre</label>
                                <input type="text" class="form-control" name="Nombre" id="Nombre" required>

                            </div>
                            <div class="mb-3">
                                <label for="fechaNac" class="form-label">Ingrese la Fecha de Nacimiento</label>
                                <input type="date" class="form-control" name="fechaNac" id="fechaNac" required>

                            </div>
                            <div class="mb-3">
                                <label for="Telefono" class="form-label">Ingrese el Telefono</label>
                                <input type="text" class="form-control" name="Telefono" id="Telefono" required pattern="\d{10}">

                            </div>
                            <div class="mb-3">
                                <label for="Domicilio" class="form-label">Ingrese el Domicilio</label>
                                <input type="text" class="form-control" name="Domicilio" id="Domicilio" required>

                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    </div>

                </div>

            </div>
        </div>

    </main>
    <script src="assets/js/validarPersona.js"></script>

    <!-- Footer -->
    <script src="assets/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <?php include_once("Estructura/Footer.php"); ?>


</body>



</html>