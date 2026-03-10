$(document).ready(function() {
    $('#tablaUsuariosLoad').load("usuarios/tablaUsuarios.php");
});
function obtenerDatosUsuario(idUsuario) {
    $.ajax({
        type: "POST",
        data: { idUsuario: idUsuario },
        url: "../procesos/usuarios/crud/obtenerDatosUsuario.php",
        success: function(respuesta) {

            respuesta = JSON.parse(respuesta);

            $('#idUsuario').val(respuesta.idUsuario);
            $('#paternou').val(respuesta.paterno);
            $('#maternou').val(respuesta.materno);
            $('#nombreu').val(respuesta.nombrePersona);
            $('#fechaNacimientou').val(respuesta.fechaNacimiento);
            $('#sexou').val(respuesta.sexo);
            $('#telefonou').val(respuesta.telefono);
            $('#correou').val(respuesta.correo);
            $('#usuariou').val(respuesta.nombreUsuario);
            $('#idRolu').val(respuesta.idRol);
            $('#ubicacionu').val(respuesta.ubicacion);

        }
    });
}