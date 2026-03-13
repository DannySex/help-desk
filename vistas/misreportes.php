<?php 
include "header.php";
if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 1) {
    include "../clases/conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
?>

<!-- Page Content -->
<div class="container">
  <div class="card border-0 shadow my-5">
    <div class="card-body p-5">
      <h1 class="fw-light">Reportes cliente</h1>
      <p class="lead"> 
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalCrearReporte">Crear reporte</button>
        <hr>
        <!-- Aquí se cargará la tabla dinámicamente -->
        <div id="tablaReportesClienteLoad"></div>
      </p>
    </div>
  </div>
</div>

<?php 
include "reportesCliente/modalCrearReporte.php";
include "footer.php"; 
?>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
<script src="../public/js/reportesCliente/reportesCliente.js"></script>



<?php
} else {
    header("Location:../index.html");
}
?>