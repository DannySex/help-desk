<?php 
include "header.php";

if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 2) {

    include "../clases/Conexion.php";

    $con = new Conexion();
    $conexion = $con->conectar();
?>

<!-- Page Content -->
<div class="container">
<div style="
        position:absolute;
        top:50px;
        left:50%;
        transform:translateX(-150%);
        z-index:10;">
        <img src="../public/img/luffy.png" 
        style="width:200px;">
</div>
    <div class="row"></div>
    <div class="card border-0 shadow my-5" style="background: 
    rgba(255,255,255,0.75); border-radius:12px; backdrop-filter: blur(5px);" >
        <div class="card-body p-5">
            <h1 class="fw-light">Asignacion de equipos</h1>

            <p class="lead">
                <button 
                    class="btn btn-primary" 
                    data-toggle="modal" 
                    data-target="#modalAsignarEquipo">
                    Asignar equipo
                </button>
            </p>

            <hr>

            <div id="tablaAsignacionesLoad"></div>

        </div>
    </div>
</div>

<?php 
include "asignacion/modalAsignacion.php";
include "footer.php";
?>

<script src="../public/js/asignacion/asignacion.js"></script>

<?php 

} else {

    header("Location:../index.html");

}
?>

<div style="text-align:center; margin-top:-50px;">
    <img src="../public/img/brook.png"
         style="width:200px;">
</div>
<div style=" position:absolute;
        top:300px;
        left:50%;
        transform:translateX(-370%);
        z-index:10;">
    <img src="../public/img/choper.png"
         style="width:200px;">
</div>
<!-- Button trigger modal -->