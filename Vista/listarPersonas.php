<?php

/**
 *  Ejercicio 3 – Crear una página "listaPersonas.php" que muestre un listado con las personas que se
 * encuentran cargadas y un link a otra página “autosPersona.php” que recibe un dni de una persona y muestra
 *  los datos de la persona y un listado de los autos que tiene asociados. Recordar usar la capa de control antes
 * generada, no se puede acceder directamente a las clases del ORM. 
 */
include_once "../configuracion.php";
include_once "../Control/AbmPersona.php";

$objAbmPersona = new AbmPersona();

$listarPersonas = $objAbmPersona->buscar(null);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Personas</title>
    <link rel="stylesheet" href="assets/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="conteiner-fluid bg-secondary-subtle">

    <!-- Navbar -->
    <?php include_once("Estructura/Navbar.php"); ?>

    <main class="container my-1">

        <div class="container-fluid bg-secondary-subtle">
            <div class="container p-5">
                <div class="container text-center p-5">
                    <div class="bg-light-subtle border border-2 border-secondary rounded shadow mx-auto p-5">
                        <h3>ABM - Persona</h3>

                        <table class="table table-striped">
                            <?php if (count($listarPersonas) > 0) { ?>
                                <thead>
                                    <tr>
                                        <th style="width: auto;">DNI</th>
                                        <th style="width: auto;">Apellido</th>
                                        <th style="width: auto;">Nombre</th>
                                        <th style="width: auto;">Fecha Nacimiento</th>
                                        <th style="width: auto;">Teléfono</th>
                                        <th style="width: auto;">Domicilio</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listarPersonas as $objPersona) { ?>
                                        <tr>
                                            <td><?php echo $objPersona->getNroDni(); ?></td>
                                            <td><?php echo $objPersona->getApellido(); ?></td>
                                            <td><?php echo $objPersona->getNombre(); ?></td>
                                            <td><?php echo $objPersona->getFechaNac(); ?></td>
                                            <td><?php echo $objPersona->getTelefono(); ?></td>
                                            <td><?php echo $objPersona->getDomicilio(); ?></td>
                                            <td>
                                                <a class="btn btn-primary" href="autosPersona.php?DniDuenio=<?php echo $objPersona->getNroDni(); ?>">Autos</a>
                                                <a class="btn btn-danger" href="accion/accionEliminarPersona.php?NroDni=<?php echo $objPersona->getNroDni() ?>">Eliminar</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="7" class="text-center  text-warning">No hay Personas cargadas</td>
                                </tr>
                            <?php } ?>
                        </table>

                    </div>
                </div>
            </div>
        </div>

    </main>


    <!-- Footer -->
    <script src="assets/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <?php include_once("Estructura/Footer.php"); ?>

</body>

</html>