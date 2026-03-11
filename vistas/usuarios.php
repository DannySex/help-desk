
<?php 
include "header.php";
if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rol']== 2) {
   
 ?>

<!-- Page Content -->
<div class="container">
  <div class="card border-0 shadow my-5">
    <div class="card-body p-5">
      <h1 class="fw-light">Administrar Usuarios</h1>
      <p class="lead"> 
      <button class="btn btn-primary" data-toggle="modal" data-target="#modalActualizarUsuario">Agregar Usuario</button>
      <hr>
      <div id="tablaUsuariosLoad"></div>
        
      </p>
    </div>
  </div>
</div>


        <?php include "usuarios/modalAgregar.php";?>
        <?php include "usuarios/modalActualizar.php";?>
<?php include "footer.php"; 
?>
  <script src="../public/js/usuario/usuarios.js"></script>
<?php
}else{
    header("Location:../index.html");
}?>
