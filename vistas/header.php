<?php 
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/platilla.css">
    <link rel="stylesheet" href="../../DESK/public/datatables/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../public/datatable/responsive.bootstrap4.min.css">
    <title>Helpdesk</title>
    
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light static-top mb-5 shadow"> 
  <div class="container">
    <a class="navbar-brand" href="inicio.php">help-desk</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item active">
          <a class="nav-link" href="inicio.php">inicio</a>
        </li>
        <?php if($_SESSION['usuario']['rol']== 1){ ?>
        <li class="nav-item">
          <a class="nav-link" href="MisDispositivos.php">dispositivos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="misreportes.php">Reportes Soporte</a>
        </li>
        <?php } else if ($_SESSION['usuario']['rol']== 2) { ?>
        
        <!--vistas administrador-->
        <li class="nav-item">
          <a class="nav-link" href="usuarios.php">Usuario</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="asignacion.php">Asignacion</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="reportes.php">Reportes</a>
        </li>
        <?php }?>
        <div class="dropdown">
        <a  style="color:red"class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Usuario: <?php echo $_SESSION['usuario']['nombre']; ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="#">Editar datos</a>
          <a class="dropdown-item" href="../procesos/usuarios/login/salir.php">salir</a>
        </div>
      </div>
      </ul>
    </div>
  </div>
</nav>
</head>
<body>