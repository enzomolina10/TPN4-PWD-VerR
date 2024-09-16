<?php

include_once "../../configuracion.php";
include_once "../../Control/AbmAuto.php";
include_once "../../Control/AbmPersona.php";

$datos = data_submitted();

$objAbmAuto = new AbmAuto();
$objAbmPersona = new AbmPersona();



$objAuto = $objAbmAuto->buscar($datos);


$objPersona = $objAbmPersona->buscar(['NroDni' => $datos['DniDuenio']]);

if(count($objPersona) > 0){
    //Existe la persona

    if(count($objAuto) > 0){
        $mensaje = "<p class='text-warning'>Ya existe un auto con esa patente</p><a class='btn btn-primary' href='../nuevoAuto.php'>Volver</a>";

    }else{
        $res = $objAbmAuto->alta($datos);


        if($res){
            $mensaje = "<p class='text-success'>Auto cargado correctamente</p><a class='btn btn-primary' href='../nuevoAuto.php'>Volver</a>";

        }else{
            $mensaje = "<p class='text-danger'>No se pudo cargar el auto</p><a class='btn btn-primary' href='../nuevoAuto.php'>Volver</a>";
        }
    }
}else{
    $mensaje = "<p class='text-danger'>La persona no existe</p><a class='btn btn-primary' href='../nuevoAuto.php'>Volver</a><a class='btn btn-primary' href='../nuevaPersona.php'>Agregar Persona</a>";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accion Nuevo Auto</title>
    
    <link rel="stylesheet" href="../assets/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="conteiner-fluid bg-secondary-subtle">
    <!-- Navbar -->
    <?php include_once("../Estructura/Navbar.php"); ?>

    <main class="conteiner my-1"> 
    <div class="row justify-content-center m-auto">
        <div class="conteiner m-5 w-75 ">
            <div class="conteiner mx-5 p-5 text-center  ">
                <div class="bg-light-subtle border border-2 border-secondary rounded shadow mx-5 p-2 ">

                <h3> Accion Nuevo Auto</h3>

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