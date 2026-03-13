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
        WHERE reporte.id_usuario = '$idUsuario'";

$respuesta = mysqli_query($conexion, $sql);

$contador = 1;
?>

<table class="table table-sm table-bordered dt-responsive nowrap" 
       style="width:100%" 
       id="tablaReporteClienteDataTable">

    <thead>
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
            <td><?php echo $mostrar['paterno'] . " " . $mostrar['materno'] . " " . $mostrar['nombre']; ?></td>
            <td><?php echo date("d/m/Y H:i:s", strtotime($mostrar['fechaReporte'])); ?></td>
            <td><?php echo $mostrar['nombreEquipo']; ?></td>
            <td><?php echo $mostrar['descripcionProblema']; ?></td>
            <td>
                <?php 
                $estatus = $mostrar['estatusReporte'];
                if ($estatus == 1) {
                    echo '<span class="badge badge-success">Abierto</span>';
                } else {
                    echo '<span class="badge badge-danger">Cerrado</span>';
                }
                ?>
            </td>
            <td>
                <?php 
                echo ($mostrar['solucionProblema'] == "") 
                    ? "Pendiente" 
                    : $mostrar['solucionProblema'];
                ?>
            </td>
            <td>
                <button class="btn btn-danger btn-sm" 
                        onclick="eliminarReporteCliente(<?php echo $mostrar['idReporte']; ?>)">
                    Eliminar
                </button>
            </td>
        </tr>

        <?php } ?>

    </tbody>

</table>

<script>
$(document).ready(function(){
    $('#tablaReporteClienteDataTable').DataTable({
        language: {
            url: "https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
        }
    });
});
</script>