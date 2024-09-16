<?php

include_once "../../configuracion.php";
include_once "../../Control/AbmPersona.php";

$datos = data_submitted();

$abmPersona = new AbmPersona();

$objPersona = $abmPersona->buscar($datos);



if(count($objPersona) > 0){
    $mensaje= "<p class='text-warning' >La persona ya existe</p><a class='btn btn-primary' href='../nuevaPersona.php'>Volver</a>";

}else{
    $res = $abmPersona->alta($datos);
    
    if($res){
        $mensaje = "<p class='text-success'>Persona cargada correctamente</p><a class='btn btn-primary' href='../nuevaPersona.php'>Volver</a>";

        
    }else{
        $mensaje="<p class='text-danger'>No se pudo cargar la persona</p><a class='btn btn-primary' href='../nuevaPersona.php'>Volver</a>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accion Nueva Persona</title>
    <link rel="stylesheet" href="../assets/css/style.css">    
    <link rel="stylesheet" href="../assets/bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>
<body class="conteiner-fluid bg-secondary-subtle">
    
<!-- Navbar -->
<?php include_once("../Estructura/Navbar.php"); ?>

<main class="container my-5">
    <div class="row justify-content-center m-auto">
        <div class="conteiner m-5 w-75 ">
            <div class="conteiner mx-5 p-5 text-center  ">
                <div class="bg-light-subtle border border-2 border-secondary rounded shadow mx-5 p-3 ">

                <h3>Accion Nueva Persona</h3>
                
                <?php
                
                    echo $mensaje;

                ?>
    

                </div>

            </div>
            
        </div>
    </div>
    </main>
    <!-- Footer -->
     <script src="../assets/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <?php include_once("../Estructura/Footer.php"); ?>
</body>
</html>