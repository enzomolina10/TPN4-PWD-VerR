<?php
include_once "../../configuracion.php";
include_once "../../Control/AbmPersona.php";
include_once "../../Control/AbmAuto.php";

$datos = data_submitted();

$abmPersona = new AbmPersona();
$abmAuto = new AbmAuto();
$objAuto = $abmAuto->buscar($datos);
$objPersona = $abmPersona->buscar($datos);

if ($datos) {
	if (count($objPersona) === 1) {
		if (count($objAuto) > 0) {
			$tieneAuto = false;
			$i = 0;
			do {
				if ($objAuto[$i]->getDniDuenio()->getNroDni() == $objPersona[0]->getNroDni()) {
					$tieneAuto = true;
				}
				$i++;
			} while ($i < count($objAuto) && !$tieneAuto);

			if (!$tieneAuto) {
				if ($abmPersona->baja($datos)) {
					$mensaje = "<p class='text-warning'>La persona fue eliminada con éxito.</p><a class='btn btn-primary' href='../listarPersonas.php'>Volver</a>";
				}
			} else {
				$mensaje = "<p class='text-warning'>La persona no pudo ser eliminada ya que posee un auto.</p><a class='btn btn-primary' href='../listarPersonas.php'>Volver</a>";
			}
		} else {
			if ($abmPersona->baja($datos)) {
				$mensaje = "<p class='text-warning'>La persona fue eliminada con éxito.</p><a class='btn btn-primary' href='../listarPersonas.php'>Volver</a>";
			}
		}
	}
} else {
	$mensaje = "<p class='text-warning'>No se encontraron datos.</p><a class='btn btn-primary' href='../listarPersonas.php'>Volver</a>";
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Accion Eliminar Persona</title>
	<link rel="stylesheet" href="../assets/css/style.css">
	<link rel="stylesheet" href="../assets/bootstrap-5.3.3-dist/css/bootstrap.min.css">
</head>

<body class="conteiner-fluid bg-secondary-subtle">
	<!-- Navbar -->
	<?php include_once("../Estructura/Navbar.php"); ?>

	<main class="container my-1">
		<div class="row justify-content-center">
			<div class="container w-75">
				<div class="container p-5 text-center">
					<div class="bg-light-subtle border border-2 border-secondary rounded shadow p-4">
						<h3>Acción Eliminar Persona</h3>
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