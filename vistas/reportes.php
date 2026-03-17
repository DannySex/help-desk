
<?php 
include "header.php";
if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rol']== 2) {
   
 ?>

<!-- Page Content -->
<div class="container">
  <div class="card border-0 shadow my-5" style="background: rgba(255,255,255,0.75); border-radius:12px; backdrop-filter: blur(5px);">
    <div class="card-body p-5">
      <h1 class="fw-light">GESTIÓN DE REPORTES DE USUARIOS</h1>
      <p class="lead"> 
        <hr>
        <div id="tablaReporteAdminLoad"></div>
      </p>
    </div>
  </div>
</div>


<?php
  include "reportesAdmin/modalAgregarSolucion.php";
 include "footer.php"; 
?>
<script src="../public/js/reportesAdmin/reportesAdmin.js"></script>
<?php
}else{
    header("Location:../index.html");
}?>