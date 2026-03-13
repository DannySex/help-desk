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

if (!$result) {
    die("Error en la consulta: " . mysqli_error($conexion));
}
?>

<table class="table table-sm dt-responsive nowrap" id="tablaUsuariosDataTable" style="width:100%">

    <thead>
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

            <td>
                <button class="btn btn-info btn-sm">
                    Cambiar Password
                </button>
            </td>

            <td>
                <?php if ($mostrar['estatus'] == 1) { ?>
                    <button class="btn btn-success btn-sm" onclick="cambioEstatusUsuario(<?php echo $mostrar['idUsuario']; ?>, <?php echo $mostrar['estatus']; ?>)">
                        Activo
                    </button>
                <?php } else if ($mostrar['estatus'] == 0) { ?>
                    <button class="btn btn-secondary btn-sm" onclick="cambioEstatusUsuario(<?php echo $mostrar['idUsuario']; ?>, <?php echo $mostrar['estatus']; ?>)">
                        Inactivo
                    </button>
                <?php } ?>
            </td>00000

            <td>
                <button 
                    class="btn btn-warning btn-sm"
                    data-toggle="modal"
                    data-target="#modalActualizarUsuario"
                    onclick="obtenerDatosUsuario(<?php echo $mostrar['idUsuario']; ?>)">
                    
                    <i class="fas fa-edit"></i> Editar
                </button>
            </td>

            <td>
                <button class="btn btn-danger btn-sm">
                    <i class="fas fa-trash"></i> Eliminar
                </button>
            </td>

        </tr>

        <?php } ?>

    </tbody>

</table>

<script>
$(document).ready(function () {
    $('#tablaUsuariosDataTable').DataTable();
});
</script>