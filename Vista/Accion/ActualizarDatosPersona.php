<?php

include_once "../../Control/AbmPersona.php";
include_once "../../configuracion.php";

$datos = data_submitted();


if(count($datos)>0){
    $objAbmPersona = new AbmPersona();

    $res = $objAbmPersona->modificacion($datos);

    if($res){
        $mensaje = "<p class='text-success'>La persona ha sido modificada correctamente</p><a class='btn btn-primary' href='../BuscarPersona.php'>Volver</a>";
    } else {
        $objPersona = $objAbmPersona->buscar($datos);
        $mensaje = "<p class='text-danger'>No se pudo modificar la persona" . $objPersona[0]->getMensajeOperacion() . "</p><a class='btn btn-primary' href='../BuscarPersona.php'>Volver</a>";
    }

}else{
    $mensaje = "<p class='text-warning'>El N° de Dni o patente ingresada no se encuentran en la lista</p><a class='btn btn-primary' href='../BuscarPersona.php'>Volver</a>";
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accion Cambio Duenio</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>
<body class="conteiner-fluid bg-secondary-subtle">
    <!-- Navbar -->
    <?php include_once("../Estructura/Navbar.php"); ?>

    <main class="container my-1">
    <div class="conteiner-m conteiner-fluid bg-secondary-subtle">
        <div class="conteiner mx-5">
            <div class="conteiner mx-5 p-5 text-center">
                <div class="bg-light-subtle border border-2 border-secondary rounded shadow mx-5 p-5">
                <h3>Accion Cambio Duenio</h3>
                <?php
                
                echo $mensaje;
                
                ?>
                
                </div>

            </div>
            
        </div>
    </div>

    </main>
    <!-- Footer -->
     <script src="assets/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <?php include_once("../Estructura/Footer.php"); ?>
</body>
</html>