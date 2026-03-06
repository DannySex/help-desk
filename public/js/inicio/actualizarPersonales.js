function actualizarDatosPersonales() {
    $.ajax({
        type: "POST",
        data: $('#frmActualizarDatosPersonales').serialize(),
        url: "../procesos/inicio/actualizarPersonales.php",
        success: function(respuesta) {
            console.log(respuesta);
            respuesta = respuesta.trim();
            if (respuesta == 1) {
                Swal.fire("listo", "Actualizado con exito", "success");
            } else {
                Swal.fire("No", "no se logro", "error");
            }
        }
    });
    return false;
}

function obtenerDatosPersonalesInicio(idUsuario) {
    $.ajax({
        type: "POST",
        data: "idUsuario=" + idUsuario,
        url: "../procesos/usuarios/crud/obtenerDatosUsuario.php",
        success: function(respuesta) {
            respuesta = jQuery.parseJSON(respuesta);
            $('#paternoInicio').val(respuesta['paterno']);
            $('#maternoInicio').val(respuesta['materno']);
            $('#nombreInicio').val(respuesta['nombrePersona']);
            $('#telefonoInicio').val(respuesta['telefono']);
            $('#correoInicio').val(respuesta['correo']);
            $('#fechaInicio').val(edad(respuesta['fechaNacimiento']));
        }
    });
}