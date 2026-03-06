<?php
    session_start();
    $datos = array(
    'idReporte' => $_POST['idReporte'], 
    'solucion' => $_POST['solucion'],
    'estatus'=> $_POST['estatus'],
    'idUsuario'=>$_SESSION['usuario']['id']
    );

include "../../clases/reportes.php";
$reportes = new Reportes();
echo $reportes->actualizarSoluucion($datos);