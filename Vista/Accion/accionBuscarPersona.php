<?php

include_once "../../configuracion.php";
include_once "../../Control/AbmPersona.php";

$datos = data_submitted();
$objAbmPersona = new AbmPersona();
$objPersona = $objAbmPersona->buscar($datos);




?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accion Buscar Persona</title>
    <link rel="stylesheet" href="../assets/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <script src="../assets/js/jquery-3.7.1.min.js"></script>
    <script src="../assets/js/jquery.validate.js"></script>
    <link rel="stylesheet" href="../assets/css/validate.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body class="conteiner-fluid bg-secondary-subtle">

    <!-- Navbar -->
    <?php include_once("../Estructura/Navbar.php"); ?>

    <main class="container my-1">
        <div class="row justify-content-center mx-auto">
            <div class="container m-5 w-75">
                <div class="container mx-5 p-5 text-center">
                    <div class="bg-light-subtle border border-2 border-secondary rounded shadow p-4">

                        <h3>Modificar Persona</h3>

                        <?php if (count($objPersona) > 0) { ?>
                            <!-- Persona encontrada -->
                            <p class="text-success">Persona encontrada</p>

                            <form id="formAccBuscarPer" action="ActualizarDatosPersona.php" method="post">
                                <div class="mb-3">
                                    <label for="NroDni">NroDni</label>
                                    <input type="text" class="form-control" name="NroDni" id="NroDni" value="<?php echo $objPersona[0]->getNroDni(); ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <label for="Apellido">Apellido</label>
                                    <input type="text" class="form-control" name="Apellido" id="Apellido" value="<?php echo $objPersona[0]->getApellido(); ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="Nombre">Nombre</label>
                                    <input type="text" class="form-control" name="Nombre" id="Nombre" value="<?php echo $objPersona[0]->getNombre(); ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="fechaNac">Fecha de Nacimiento</label>
                                    <input type="date" class="form-control" name="fechaNac" id="fechaNac" value="<?php echo $objPersona[0]->getFechaNac(); ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="Telefono">Teléfono</label>
                                    <input type="text" class="form-control" name="Telefono" id="Telefono" value="<?php echo $objPersona[0]->getTelefono(); ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="Domicilio">Domicilio</label>
                                    <input type="text" class="form-control" name="Domicilio" id="Domicilio" value="<?php echo $objPersona[0]->getDomicilio(); ?>">
                                </div>
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                                <a class="btn btn-secondary" href="../BuscarPersona.php">Volver</a>
                            </form>

                        <?php } else { ?>
                            <!-- Persona no encontrada -->
                            <p class="text-warning">No se encontró la persona en la lista</p>
                            <a class="btn btn-primary" href="../BuscarPersona.php">Volver</a>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="../assets/js/validarPersona.js"></script>
    <!-- Footer -->
    <script src="../assets/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <?php include_once("../Estructura/Footer.php"); ?>


</body>


</html>