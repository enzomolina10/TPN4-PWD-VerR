<?php

/**
 * Ejercicio 7 – Crear una página “BuscarPersona.html” que contenga un formulario que permita cargar un
 * numero de documento de una persona. Estos datos serán enviados a una página “accionBuscarPersona.php”
 * busque los datos de la persona cuyo documento sea el ingresado en el formulario los muestre en un nuevo
 *  formulario; a su vez este nuevo formulario deberá permitir modificar los datos mostrados (excepto el nro de documento) y estos serán enviados a otra página 
 * ActualizarDatosPersona.php” que actualiza los datos de la persona. Utilizar css y validaciones javaScript cuando crea conveniente. Recordar usar la capa de control antes generada, no se puede acceder
 * directamente a las clases del ORM.
 */


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Persona</title>
    <link rel="stylesheet" href="assets/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <script src="assets/js/jquery-3.7.1.min.js"></script>
    <script src="assets/js/jquery.validate.js"></script>
    <link rel="stylesheet" href="assets/css/validate.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="conteiner-fluid bg-secondary-subtle">

    <!-- Navbar -->
    <?php include_once("Estructura/Navbar.php"); ?>

    <main class="container my-5">
        <div class="conteiner-m conteiner-fluid bg-secondary-subtle">
            <div class="conteiner mx-5">
                <div class="conteiner mx-5 p-5 text-center">
                    <div class="bg-light-subtle border border-2 border-secondary rounded shadow mx-5 p-5">
                        <h3>Buscar Persona</h3>

                        <form id="formBuscarPersona" action="accion/accionBuscarPersona.php" method=POST>
                            <div class="mb-3">
                                <label for="NroDni">Ingrese el DNI de la persona</label><br>
                                <input type="text" name="NroDni" id="NroDni" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Buscar</button>
                        </form>
                    </div>

                </div>

            </div>
        </div>

    </main>
    <!-- Footer -->
    <script src="assets/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <?php include_once("Estructura/Footer.php"); ?>
</body>

<script src="assets/js/validarPersona.js"></script>


</html>