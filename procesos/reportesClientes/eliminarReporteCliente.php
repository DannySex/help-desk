<?php 
    $idReporte = $_POST['idReporte'];
    include "../../clases/reportes.php";
    $reportes = new Reportes();
    echo $reportes->eliminarReporteCliente($idReporte);
?>