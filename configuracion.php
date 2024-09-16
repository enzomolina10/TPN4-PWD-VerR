<?php header('Content-Type: text/html; charset=utf-8');
header ("Cache-Control: no-cache, must-revalidate ");

/////////////////////////////
// CONFIGURACION APP//
/////////////////////////////

$PROYECTO ='PWD-2018/PDO';

//variable que almacena el directorio del proyecto
$ROOT = __DIR__ . "/";
//$ROOT =$_SERVER['DOCUMENT_ROOT']."/$PROYECTO/";

include_once "{$ROOT}util/funciones.php";
include_once "{$ROOT}Modelo/Auto.php";
include_once "{$ROOT}Modelo/Persona.php";


// Variable que define la pagina de autenticacion del proyecto
$INICIO = "Location:http://".$_SERVER['HTTP_HOST']."/$PROYECTO/vista/login/login.php";

// variable que define la pagina principal del proyecto (menu principal)
$PRINCIPAL = "Location:http://".$_SERVER['HTTP_HOST']."/$PROYECTO/principal.php";


$_SESSION['ROOT']=$ROOT;

?>