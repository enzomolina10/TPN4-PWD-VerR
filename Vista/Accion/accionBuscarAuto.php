<?php
include_once "../../configuracion.php";
include_once "../../Control/AbmAuto.php";

$datos = data_submitted();
$objAbmAuto = new AbmAuto();

$objAuto = $objAbmAuto->buscar($datos);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accion_Buscar_Auto</title>
    <link rel="stylesheet" href="../assets/bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body class="conteiner-fluid bg-secondary-subtle"> 

<!-- Navbar -->
<?php include_once("../Estructura/Navbar.php"); ?>

<main class="container my-5">

    <div class="row justify-content-center m-auto">
        <div class="conteiner m-5 w-75 ">
            <div class="conteiner mx-5 p-5 text-center  ">
                <div class="bg-light-subtle border border-2 border-secondary rounded shadow mx-5 p-3 ">

                <h3>Accion Buscar Auto</h3>
                <?php
                
                if(count($objAuto)>0){
                    echo "<table class='table table-striped'>";
                    echo "<thead><tr>";
                    echo "<th scope='col' >Patente</th>";
                    echo "<th scope='col'>Marca</th>";
                    echo "<th scope='col'>Modelo</th>";
                    echo "<th scope='col'>DniDuenio</th>";
                    echo "<th scope='col'>Apellido_Duenio</th>";
                    echo "<th scope='col'>Nombre_Duenio</th>";
                    echo "</tr></thead><tbody><tr>";
                
                    echo "<td >".$objAuto[0]->getPatente()."</td>";
                    echo "<td >".$objAuto[0]->getMarca()."</td>";
                    echo "<td >".$objAuto[0]->getModelo()."</td>";
                    echo "<td >".$objAuto[0]->getDniDuenio()->getNroDni()."</td>";
                    echo "<td >".$objAuto[0]->getDniDuenio()->getApellido()."</td>";
                    echo "<td >".$objAuto[0]->getDniDuenio()->getNombre()."</td>";
                    echo "</tr></tbody></table>";

                    echo"<a class='btn btn-primary' href='../buscarAuto.php'>Volver</a>";
                }else{
                    echo "<p  class='text-warning'>No se han encontrado Autos con esa patente</p>";
                    echo"<a class='btn btn-primary' href='../buscarAuto.php'>Volver</a>";
                }

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