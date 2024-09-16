<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top p-3">
    <div class="container-fluid">
        <?php
        $ruta = $_SERVER['PHP_SELF'];
        function cambioHeader($ruta)
        {
            $strHtml = "
			<ul class='navbar-nav me-auto mb-2 mb-lg-0'>
            <li class='nav-item dropdown'>
                <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                    Opciones
                </a>
                <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>
                    <li><a class=dropdown-item href='buscarAuto.php'>Buscar Auto</a></li>
                    <li><a class=dropdown-item href='BuscarPersona.php'>Buscar Persona</a></li>
                    <li><a class=dropdown-item href='listarPersonas.php'>Listar Personas</a></li>
                    <li><a class=dropdown-item href='CambioDuenio.php'>Cambiar Duenio</a></li>
                    <li><a class=dropdown-item href='nuevaPersona.php'>Nueva Persona</a></li>
                    <li><a class=dropdown-item href='nuevoAuto.php'>Nuevo Auto</a></li>
                    <li><a class=dropdown-item href='VerAutos.php'>Ver Autos</a></li>
                </ul>
            </li>
        </ul>
        <a class='navbar-brand ms-auto' href='../index.php' >Volver al menú principal</a>
			";
            if (strpos($ruta, "accion") !== false) {
                $strHtml  = "
				<ul class='navbar-nav me-auto mb-2 mb-lg-0'>
            <li class='nav-item dropdown'>
                <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                    Opciones
                </a>
                <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>
                    <li><a class=dropdown-item href='../buscarAuto.php'>Buscar Auto</a></li>
                    <li><a class=dropdown-item href='../BuscarPersona.php'>Buscar Persona</a></li>
                    <li><a class=dropdown-item href='../listarPersonas.php'>Listar Personas</a></li>
                    <li><a class=dropdown-item href='../CambioDuenio.php'>Cambiar Duenio</a></li>
                    <li><a class=dropdown-item href='../nuevaPersona.php'>Nueva Persona</a></li>
                    <li><a class=dropdown-item href='../nuevoAuto.php'>Nuevo Auto</a></li>
                    <li><a class=dropdown-item href='../VerAutos.php'>Ver Autos</a></li>
                </ul>
            </li>
        </ul>
        <a class='navbar-brand ms-auto' href='../../index.php' >Volver al menú principal</a>
				";
            }
            return $strHtml;
        }
        $codHtml = cambioHeader($ruta);
        echo $codHtml;
        ?>
    </div>
</nav>