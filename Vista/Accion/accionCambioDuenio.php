<?php
include_once "../../Control/AbmAuto.php";
include_once "../../Control/AbmPersona.php";
include_once "../../configuracion.php";

$datos = data_submitted();

$objAbmAuto = new AbmAuto();
$objAbmPersona = new AbmPersona();

$objAuto = $objAbmAuto->buscar($datos);
$objPersona = $objAbmPersona->buscar($datos);

if(count($objAuto)>0 && count($objPersona)>0){
    
    // Modificar el DniDuenio del auto
    $param = [
        'Patente' => $objAuto[0]->getPatente(),
        'Marca' => $objAuto[0]->getMarca(),
        'Modelo' => $objAuto[0]->getModelo(),
        'DniDuenio' => $objPersona[0]->getNroDni()
    ];

    $res = $objAbmAuto->modificacion($param);

    if($res){
        $mensaje = "<p class='text-success'>El dueño del auto ha sido modificado correctamente</p><a class='btn btn-primary' href='../CambioDuenio.php'>Volver</a>";
    } else {
        $mensaje = "<p class='text-danger'>No se pudo modificar el dueño del auto: " . $objAuto[0]->getMensajeOperacion() . "</p><a class='btn btn-primary' href='../CambioDuenio.php'>Volver</a>";
    }

}else{
    $mensaje = "<p class='text-warning'>El N° de Dni o patente ingresada no se encuentran en la lista</p><a class='btn btn-primary' href='../CambioDuenio.php'>Volver</a>";
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accion Cambio Duenio</title>
    <link rel="stylesheet" href="../assets/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="conteiner-fluid bg-secondary-subtle">

<!-- Navbar -->
<?php include_once("../Estructura/Navbar.php"); ?>

<main class="container my-5">
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
     <script src="../assets/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <?php include_once("../Estructura/Footer.php"); ?>
</body>
</html>