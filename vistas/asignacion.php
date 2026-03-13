<?php 
include "header.php";

if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 2) {

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

<!-- Button trigger modal -->