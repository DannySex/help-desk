<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- BOOTSTRAP -->
<link rel="stylesheet" href="../public/bootstrap/bootstrap.min.css">

<!-- FONT AWESOME -->
<link rel="stylesheet" href="../public/fontawesome/css/all.min.css">

<!-- DATATABLE BOOTSTRAP -->
<link rel="stylesheet" href="../public/datatable/dataTables.bootstrap4.min.css">

<!-- DATATABLE RESPONSIVE -->
<link rel="stylesheet" href="../public/datatable/responsive.bootstrap4.min.css">

<!-- DATATABLE BUTTONS -->
<link rel="stylesheet" href="../public/datatable/buttons.bootstrap4.min.css">

<!-- TU PLANTILLA -->
<link rel="stylesheet" href="../public/css/platilla.css">
    
    <title>Helpdesk</title>

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light static-top mb-5 shadow">

    <div class="container">

        <a class="navbar-brand" href="inicio.php">help-desk</a>

        <button 
            class="navbar-toggler" 
            type="button" 
            data-bs-toggle="collapse" 
            data-bs-target="#navbarResponsive" 
            aria-controls="navbarResponsive" 
            aria-expanded="false" 
            aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">

            <ul class="navbar-nav ms-auto">

                <li class="nav-item active">
                    <a class="nav-link" href="inicio.php">Inicio</a>
                </li>

                <?php if ($_SESSION['usuario']['rol'] == 1) { ?>

                    <li class="nav-item">
                        <a class="nav-link" href="MisDispositivos.php">Dispositivos</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="misreportes.php">Reportes Soporte</a>
                    </li>

                <?php } else if ($_SESSION['usuario']['rol'] == 2) { ?>

                    <!-- Vistas administrador -->

                    <li class="nav-item">
                        <a class="nav-link" href="usuarios.php">Usuarios</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="asignacion.php">Asignacion</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="reportes.php">Reportes</a>
                    </li>

                <?php } ?>

                <li class="nav-item dropdown">

                    <a 
                        style="color:red"
                        class="nav-link dropdown-toggle"
                        href="#"
                        id="dropdownMenuButton"
                        data-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false">

                        Usuario: <?php echo $_SESSION['usuario']['nombre']; ?>

                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#actualizarDatosPersonales"
                        onclick="obtenerDatosPersonalesInicio('<?php echo $_SESSION ['usuario']['id'] ?>')">
                            Editar datos</a>

                        <a class="dropdown-item" href="../procesos/usuarios/login/salir.php">
                            Salir
                        </a>

                    </div>

                </li>

            </ul>

        </div>

    </div>

</nav>

<?php include "inicio/modalActualizarDatosPersonales.php" ?>