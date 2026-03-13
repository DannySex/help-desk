<?php
    $idReporte = $_POST['idReporte'];
    include "../../clases/reportes.php";
    $reportes = new Reportes();
    echo json_encode($reportes->obtenerSolucion($idReporte));
?>