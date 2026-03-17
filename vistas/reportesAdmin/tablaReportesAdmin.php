<?php 
session_start();
include "../../clases/conexion.php";

$con = new Conexion(); 
$conexion = $con->conectar();

$idUsuario = $_SESSION['usuario']['id'];

$sql = "SELECT 
        reporte.id_reportes AS idReporte,
        reporte.id_usuario AS idUsuario,
        persona.paterno,
        persona.materno,
        persona.nombre,
        equipo.id_equipo AS idEquipo,
        equipo.nombre AS nombreEquipo,
        reporte.descripcion_problema AS descripcionProblema,
        reporte.solucion_problema AS solucionProblema,
        reporte.estatus AS estatusReporte,
        reporte.fecha AS fechaReporte
        FROM t_reportes AS reporte
        INNER JOIN t_usuarios AS usuario 
            ON reporte.id_usuario = usuario.id_usuario
        INNER JOIN t_persona AS persona 
            ON usuario.id_persona = persona.id_persona
        INNER JOIN t_cat_equipo AS equipo 
            ON reporte.id_equipo = equipo.id_equipo
        ORDER BY reporte.fecha DESC";

$respuesta = mysqli_query($conexion, $sql);
$contador = 1;
?>

<table id="tablaReporteAdminDataTable"
       class="table table-sm table-bordered dt-responsive nowrap"
       style="width:100%">

    <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>Nombre Completo</th>
            <th>Fecha</th>
            <th>Dispositivo</th>
            <th>Descripción</th>
            <th>Estatus</th>
            <th>Solución</th>
            <th>Eliminar</th>
        </tr>
    </thead>

    <tbody>

        <?php while ($mostrar = mysqli_fetch_array($respuesta)) { ?>

        <tr>
            <td><?php echo $contador++; ?></td>

            <td>
                <?php 
                echo $mostrar['paterno'] . " " . 
                     $mostrar['materno'] . " " . 
                     $mostrar['nombre']; 
                ?>
            </td>

            <td>
                <?php echo date("d/m/Y H:i:s", strtotime($mostrar['fechaReporte'])); ?>
            </td>

            <td><?php echo $mostrar['nombreEquipo']; ?></td>

            <td><?php echo $mostrar['descripcionProblema']; ?></td>

            <td>
                <?php 
                if ($mostrar['estatusReporte'] == 1) {
                    echo '<span class="badge badge-success">Abierto</span>';
                } else {
                    echo '<span class="badge badge-danger">Cerrado</span>';
                }
                ?>
            </td>

            <td class="text-center">
                <button class="btn btn-info btn-sm"
                        onclick="obtenerDatosSolucion('<?php echo $mostrar['idReporte']; ?>')"
                        data-toggle="modal"
                        data-target="#modalAgregarSolucionReporte">
                    Solución
                </button>
            </td>

            <td class="text-center">
                <button class="btn btn-danger btn-sm"
                        onclick="eliminarReporteAdmin(<?php echo $mostrar['idReporte']; ?>)">
                    Eliminar
                </button>
            </td>

        </tr>

        <?php } ?>

    </tbody>

</table>


<script>

$(document).ready(function(){

$('#tablaReporteAdminDataTable').DataTable({

destroy:true,
responsive:true,
scrollX:true,

pageLength:10,

lengthMenu:[
[5,10,25,50,100],
[5,10,25,50,100]
],

dom:
"<'row mb-2'<'col-md-4'l><'col-md-4'f><'col-md-4 text-right'B>>" +
"<'row'<'col-12'tr>>" +
"<'row mt-2'<'col-md-5'i><'col-md-7'p>>",

buttons:[

{
extend:'copy',
className:'btn btn-outline-secondary btn-sm',
text:'Copiar'
},

{
extend:'excel',
className:'btn btn-outline-success btn-sm',
text:'Excel',
title:'Reporte_Asignaciones'
},

{
extend:'pdf',
className:'btn btn-outline-danger btn-sm',
text:'PDF',
title:'Reporte_Asignaciones'
},

{
extend:'print',
className:'btn btn-outline-info btn-sm',
text:'Imprimir'
}

],

language:{
url:"https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
}

});

});

</script>
