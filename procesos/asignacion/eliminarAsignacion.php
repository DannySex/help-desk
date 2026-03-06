<?php
    $idAsignacion = $_POST['idAsignacion'];

    include "../../clases/asignacion.php";

    $Asignacion = new Asignacion();
    
    echo $Asignacion->eliminarAsignacion($idAsignacion);
?>