<?php 
include "../../clases/Conexion.php";

$con = new Conexion();
$conexion = $con->conectar();

$Sql = "SELECT 
            usuarios.id_usuario AS idUsuario,
            usuarios.usuario AS nombreUsuario,
            roles.nombre AS rol,
            usuarios.id_rol AS idRol,
            usuarios.ubicacion AS ubicacion,
            usuarios.activos AS estatus,
            usuarios.id_persona AS idPersona,
            persona.nombre AS nombrePersona,
            persona.paterno AS paterno,
            persona.materno AS materno,
            persona.fecha_nacimiento AS fecha_nacimiento,
            persona.sexo AS sexo,
            persona.correo AS correo,
            persona.telefono AS telefono
        FROM t_usuarios AS usuarios
        INNER JOIN t_cat_roles AS roles 
            ON usuarios.id_rol = roles.id_rol
        INNER JOIN t_persona AS persona 
            ON usuarios.id_persona = persona.id_persona";

$result = mysqli_query($conexion, $Sql);

if (!$result) {
    die("Error en la consulta: " . mysqli_error($conexion));
}
?>

<table id="tablaUsuariosDataTable" class="table table-sm table-bordered dt-responsive nowrap" style="width:100%">

<thead class="thead-dark">
<tr>
<th>Nombre</th>
<th>Apellido Paterno</th>
<th>Apellido Materno</th>
<th>Edad</th>
<th>Telefono</th>
<th>Correo</th>
<th>Usuario</th>
<th>Ubicacion</th>
<th>Sexo</th>
<th>Reset Password</th>
<th>Activar</th>
<th>Editar</th>
<th>Eliminar</th>
</tr>
</thead>

<tbody>

<?php while ($mostrar = mysqli_fetch_array($result)) { ?>

<tr>

<td><?php echo $mostrar['nombrePersona']; ?></td>
<td><?php echo $mostrar['paterno']; ?></td>
<td><?php echo $mostrar['materno']; ?></td>
<td><?php echo $mostrar['fecha_nacimiento']; ?></td>
<td><?php echo $mostrar['telefono']; ?></td>
<td><?php echo $mostrar['correo']; ?></td>
<td><?php echo $mostrar['nombreUsuario']; ?></td>
<td><?php echo $mostrar['ubicacion']; ?></td>
<td><?php echo $mostrar['sexo']; ?></td>

<td class="text-center">
<button class="btn btn-info btn-sm"
data-toggle="modal"
data-target="#modalResetPassword"
onclick="agregarIdUsuarioReset(<?php echo $mostrar['idUsuario'] ?>)">
<i class="fas fa-key"></i> Password
</button>
</td>

<td class="text-center">

<?php if ($mostrar['estatus'] == 1) { ?>

<button class="btn btn-success btn-sm"
onclick="cambioEstatusUsuario(<?php echo $mostrar['idUsuario']; ?>, <?php echo $mostrar['estatus']; ?>)">
<i class="fas fa-check-circle"></i> Activo
</button>

<?php } else { ?>

<button class="btn btn-secondary btn-sm"
onclick="cambioEstatusUsuario(<?php echo $mostrar['idUsuario']; ?>, <?php echo $mostrar['estatus']; ?>)">
<i class="fas fa-times-circle"></i> Inactivo
</button>

<?php } ?>

</td>

<td class="text-center">

<button 
class="btn btn-warning btn-sm"
data-toggle="modal"
data-target="#modalActualizarUsuario"
onclick="obtenerDatosUsuario(<?php echo $mostrar['idUsuario']; ?>)">

<i class="fas fa-user-edit"></i> Editar
</button>

</td>

<td class="text-center">

<form action="frmEliminarUsuario.php" method="POST" onsubmit="return eliminarUsuario()">

<input type="hidden" name="idUsuarioEliminar" value="<?php echo $mostrar['idUsuario']; ?>">
<input type="hidden" name="idPersonaEliminar" value="<?php echo $mostrar['idPersona']; ?>">

<button type="submit" class="btn btn-danger btn-sm">
<i class="fas fa-trash"></i> Eliminar
</button>

</form>

</td>

</tr>

<?php } ?>

</tbody>

</table>

<script>

$(document).ready(function () {

$('#tablaUsuariosDataTable').DataTable({

responsive:true,
scrollX:true,

language:{
url:"https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json"
}

});

});

</script>