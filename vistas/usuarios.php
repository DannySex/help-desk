<?php 
include "header.php";

if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 2) {
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
    <div class="card border-0 shadow my-5" style="background: rgba(255,255,255,0.75); border-radius:12px; backdrop-filter: blur(5px);">

        <div class="card-body p-5">

            <h1 class="fw-light">Administrar Usuarios</h1>

            <p class="lead">

                <button 
                    class="btn btn-primary"
                    data-toggle="modal"
                    data-target="#modalAgregarUsuario">
                    
                    Agregar Usuario

                </button>

            </p>

            <hr>

            <div id="tablaUsuariosLoad"></div>

        </div>

    </div>

</div>

<?php 
include "usuarios/modalAgregar.php";
include "usuarios/modalActualizar.php";
include "usuarios/modalResetPasword.php";
include "footer.php";
?>

<script src="../public/js/usuario/usuarios.js"></script>

<?php

} else {

    header("Location: ../index.html");

}
?>