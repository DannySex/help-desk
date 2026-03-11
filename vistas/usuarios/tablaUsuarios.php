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
    ON usuarios.id_persona = persona.id_persona;";
$result = mysqli_query($conexion, $Sql);
if(!$result){
    die("Error en la consulta: " . mysqli_error($conexion));
}
?>
<table class="table table-sm dt-responsive nowrap" id="tablaUsuariosDataTable" style="width:100%">
<thead>
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
    <tbody>
        <?php
            while($mostrar = mysqli_fetch_array($result)){?>
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
            <td>
                <button class="btn btn-success btn-sm">
                    Cambiar Password
                </button>
            </td>
            <td>
                <?php if($mostrar['estatus'] == 1){?>
                <button class="btn btn-info btn-sm">
                    Activo
                </button>
                <?php } else{?>
                <button class="btn btn-secondary btn-sm">
                    Inactivo
                </button>
                <?php } ?>
                 
            </td>
            <td>
                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modalActualizarUsuario" onclick="obtenerDatosUsuario(<?php echo $mostrar['idUsuario'] ?>)">
                    <i class="fas fa-edit">Editar</i>
                </button>
            </td>
            <td>
                <button class="btn btn-danger btn-sm">
                    <i class="fas fa-trash">Eliminar</i>
                </button>
            </td>
        </tr>
        <?php }?>
    </tbody>
</thead>
</table>
<script>
    $(document).ready(function() {
        $('#tablaUsuariosDataTable').DataTable();
    });
</script>