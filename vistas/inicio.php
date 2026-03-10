
<?php 
include "header.php";
if (isset($_SESSION['usuario']) &&
 $_SESSION['usuario']['rol']== 1 || $_SESSION['usuario']['rol']== 2) {
   
 ?>

<!-- Page Content -->
<div class="container">
  <div class="card border-0 shadow my-5">
    <div class="card-body p-5">
      <h1 class="fw-light">Inicio</h1>
      <p class="lead"> but the image will remain in a fixed position!</p>
    </div>
  </div>
</div>


<?php include "footer.php"; 

}else{
    header("Location:../index.html");
}?>