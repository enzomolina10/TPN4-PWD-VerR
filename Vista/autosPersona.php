<?php

include_once "../configuracion.php";
include_once "../Control/AbmPersona.php";
include_once "../Control/AbmAuto.php";

$datos = data_submitted();

$objAbmAuto = new AbmAuto();

$listaAutos = $objAbmAuto->buscar($datos);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autos Personas</title>
    <link rel="stylesheet" href="assets/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="conteiner-fluid bg-secondary-subtle">
    <!-- Navbar -->
    <?php include_once("Estructura/Navbar.php"); ?>

    <main class="container my-5">
        <div class="row justify-content-center">
            <div class="container w-75">
                <div class="container p-5 text-center">
                    <div class="bg-light-subtle border border-2 border-secondary rounded shadow p-4">
                        <?php if (count($listaAutos) > 0) { ?>
                            <h3>Autos de la persona</h3>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: auto;">Patente</th>
                                        <th style="width: auto;">Marca</th>
                                        <th style="width: auto;">Modelo</th>
                                        <th style="width: auto;">DNI Dueño</th>
                                        <th style="width: auto;">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listaAutos as $objAuto) { ?>
                                        <tr>
                                            <td><?php echo $objAuto->getPatente(); ?></td>
                                            <td><?php echo $objAuto->getMarca(); ?></td>
                                            <td><?php echo $objAuto->getModelo(); ?></td>
                                            <td><?php echo $objAuto->getDniDuenio()->getNroDni(); ?></td>
                                            <td> <a class="btn btn-danger" href="accion/accionEliminarAuto.php?Patente=<?php echo $objAuto->getPatente() ?>">Eliminar</a></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <a class="btn btn-primary" href="listarPersonas.php">Volver</a>

                        <?php } else { ?>
                            <p>No se encontraron autos para la persona</p>
                            <a class="btn btn-primary" href="listarPersonas.php">Volver</a>
                        <?php } ?>
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