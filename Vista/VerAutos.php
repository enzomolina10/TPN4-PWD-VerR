<?php

/**
 * Ejercicio 3 –Crear una pagina php “VerAutos.php”, en ella usando la capa de control correspondiente
 *  mostrar todos los datos de los autos que se encuentran cargados, de los dueños mostrar nombre y apellido.
 *  En caso de que no se encuentre ningún auto cargado en la base mostrar un mensaje indicando que no hay
 *  autos cargados.
 */


include_once "../configuracion.php";
include_once "../Control/AbmAuto.php";

$objAbmAuto = new AbmAuto();

$listarAutos = $objAbmAuto->buscar(null);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Autos</title>
    <link rel="stylesheet" href="assets/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="conteiner-fluid bg-secondary-subtle">

    <!-- Navbar -->
    <?php include_once("Estructura/Navbar.php"); ?>

    <main class="container my-5">

        <div class="row justify-content-center m-auto">
            <div class="container mx-5">
                <div class="container p-5 text-center">
                    <div class="bg-light-subtle border border-2 border-secondary rounded shadow mx-auto p-5">
                        <h3>ABM - Auto</h3>

                        <?php if (count($listarAutos) > 0): ?>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Patente</th>
                                        <th>Marca</th>
                                        <th>Modelo</th>
                                        <th>DNI Dueño</th>
                                        <th>Apellido Dueño</th>
                                        <th>Nombre Dueño</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listarAutos as $objAuto): ?>
                                        <tr>
                                            <td><?php echo $objAuto->getPatente(); ?></td>
                                            <td><?php echo $objAuto->getMarca(); ?></td>
                                            <td><?php echo $objAuto->getModelo(); ?></td>
                                            <td><?php echo $objAuto->getDniDuenio()->getNroDni(); ?></td>
                                            <td><?php echo $objAuto->getDniDuenio()->getApellido(); ?></td>
                                            <td><?php echo $objAuto->getDniDuenio()->getNombre(); ?></td>
                                            <td> <a class="btn btn-danger" href="accion/accionEliminarAuto.php?Patente=<?php echo $objAuto->getPatente() ?>">Eliminar</a></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php else: ?>
                            <p class="text-warning">No hay autos cargados</p>
                        <?php endif; ?>
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