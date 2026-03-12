<?php 
    $datos = array(
        'idPersona' => $_POST['idPersona'],
        'idEquipo' => $_POST['idEquipo'],
        'marca' => $_POST['marca'],
        'modelo' => $_POST['modelo'],
        'color' => $_POST['color'],
        'descripcion' => $_POST['descripcion'],
        'memoria' => $_POST['memoria'],
        'discoDuro' => $_POST['discoDuro'],
        'Procesador' => $_POST['Procesador']
    );
    include"../../clases/asignacion.php";
    $asignacion = new Asignacion();
    echo $asignacion->agregarAsignacion($datos);
?>