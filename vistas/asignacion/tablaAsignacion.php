<?php 
    include "../../clases/Conexion.php";
    $con = new Conexion();
    $conexion = $con->conectar();
    $sql = "SELECT 
CONCAT(p.paterno,' ',p.materno,' ',p.nombre) AS nombrePersona,
e.nombre AS nombreEquipo,
a.marca,
a.modelo,
a.color,
a.descripcion,
a.memoria,
a.disco_duro AS discoDuro,
a.procesador,
a.id_asignacion
FROM t_asignacion a
INNER JOIN t_persona p 
ON a.id_persona = p.id_persona
INNER JOIN t_cat_equipo e 
ON a.id_equipo = e.id_equipo
GROUP BY a.id_asignacion";
$respuesta = mysqli_query($conexion, $sql); 
?>

<table class="table table-sm dt-responsive nowrap" id="tablaAsignacionDataTable" style="width:100%">
<thead>
<tr>
   <th>Persona</th>
   <th>Equipo</th>
   <th>Marca</th>
   <th>Modelo</th>
   <th>Color</th>
   <th>Descripcion</th>
   <th>Memoria</th>
   <th>Disco Duro</th>
   <th>Procesador</th>
   <th>Eliminar</th>
</tr>
</thead>

<tbody>
<?php
while($mostrar = mysqli_fetch_array($respuesta)){
?>
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
    <td>
<button class="btn btn-danger btn-sm"
onclick="eliminarAsignacion('<?php echo $mostrar['id_asignacion']; ?>')">
Eliminar
</button>
</td>
</tr>
<?php } ?>
</tbody>

</table>
<script>
    $(document).ready(function() {
        $('#tablaAsignacionDataTable').DataTable();
    });
</script>