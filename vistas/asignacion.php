
<?php 
include "header.php";
if (!isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] != 2) {
    include "../clases/Conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
   
 ?>

<!-- Page Content -->
<div class="container">
  <div class="card border-0 shadow my-5">
    <div class="card-body p-5">
      <h1 class="fw-light">Asignacion de equipos</h1>
      <p class="lead">
        <button class="btn btn-primary">Asignar equipo</button>
      </p>
      <hr>
      <div id="tablaAsignacionesLoad"></div>
    </div>
  </div>
</div>


<?php include "footer.php"; 

}else{
    header("Location:../index.html");
}?>