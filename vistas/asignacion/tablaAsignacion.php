<?php 
include "../../clases/Conexion.php";

$con = new Conexion();
$conexion = $con->conectar();

$sql = "SELECT 
    persona.id_persona AS idPersona,
    CONCAT(persona.paterno,' ',persona.materno,' ',persona.nombre) AS nombrePersona,
    equipo.nombre AS nombreEquipo,
    asignacion.id_asignacion AS idAsignacion,
    asignacion.marca,
    asignacion.modelo,
    asignacion.color,
    asignacion.descripcion,
    asignacion.memoria,
    asignacion.disco_duro AS discoDuro,
    asignacion.procesador
FROM t_asignacion AS asignacion
INNER JOIN t_persona AS persona 
    ON asignacion.id_persona = persona.id_persona
INNER JOIN t_cat_equipo AS equipo 
    ON asignacion.id_equipo = equipo.id_equipo";

$resultado = mysqli_query($conexion,$sql);
?>

<table id="tablaAsignacionDataTable" 
class="table table-sm table-bordered dt-responsive nowrap" 
style="width:100%">

<thead class="thead-dark">
<tr>
<th>Persona</th>
<th>Equipo</th>
<th>Marca</th>
<th>Modelo</th>
<th>Color</th>
<th>Descripción</th>
<th>Memoria</th>
<th>Disco Duro</th>
<th>Procesador</th>
<th>Eliminar</th>
</tr>
</thead>

<tbody>

<?php while($mostrar = mysqli_fetch_array($resultado)){ ?>

<tr>

<td><?php echo $mostrar['nombrePersona']; ?></td>
<td><?php echo $mostrar['nombreEquipo']; ?></td>
<td><?php echo $mostrar['marca']; ?></td>
<td><?php echo $mostrar['modelo']; ?></td>
<td><?php echo $mostrar['color']; ?></td>
<td><?php echo $mostrar['descripcion']; ?></td>
<td><?php echo $mostrar['memoria']; ?></td>
<td><?php echo $mostrar['discoDuro']; ?></td>
<td><?php echo $mostrar['procesador']; ?></td>

<td class="text-center">

<button 
class="btn btn-danger btn-sm"
onclick="eliminarAsignacion('<?php echo $mostrar['idAsignacion']; ?>')">

<i class="fas fa-trash"></i> Eliminar

</button>

</td>

</tr>

<?php } ?>

</tbody>

</table>

<script>

$(document).ready(function () {

$('#tablaAsignacionDataTable').DataTable({

responsive:true,
scrollX:true,

pageLength:10,

lengthMenu:[
[5,10,25,50,100],
[5,10,25,50,100]
],

language:{
url:"https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
}

});

});

</script>