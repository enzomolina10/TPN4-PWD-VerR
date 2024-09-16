<?php

include_once "../../configuracion.php";
include_once "../../Control/AbmAuto.php";

$datos = data_submitted();

$abmAuto = new AbmAuto();

if ($datos) {
	if ($abmAuto->baja($datos)) {
		$mensaje = "<p class='text-warning'>El auto fue eliminado con éxito.</p><a class='btn btn-primary' href='../VerAutos.php'>Volver</a>";
	} else {
		$mensaje = "<p class='text-warning'>El auto no pudo ser eliminado.</p><a class='btn btn-primary' href='../VerAutos.php'>Volver</a>";
	}
}else {
	$mensaje = "<p class='text-warning'>No se ingresaron datos.</p><a class='btn btn-primary' href='../VerAutos.php'>Volver</a>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Accion Eliminar Auto</title>
	<link rel="stylesheet" href="../assets/css/style.css">
	<link rel="stylesheet" href="../assets/bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>

<body class="conteiner-fluid bg-secondary-subtle">
	<!-- Navbar -->
	<?php include_once("../Estructura/Navbar.php"); ?>

	<main class="container my-5">
		<div class="row justify-content-center">
			<div class="container w-75">
				<div class="container p-5 text-center">
					<div class="bg-light-subtle border border-2 border-secondary rounded shadow p-4">
						<h3>Acción Eliminar Auto</h3>
						<?php echo $mensaje; ?>
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