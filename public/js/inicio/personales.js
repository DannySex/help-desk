function datosPersonalesInicio(idUsuario) {

    console.log("ID usuario:", idUsuario);

    $.ajax({
        type: "POST",
        data: { idUsuario: idUsuario },
        url: "../procesos/usuarios/crud/obtenerDatosUsuario.php",
        success: function(respuesta) {

            console.log("Respuesta:", respuesta);

            respuesta = JSON.parse(respuesta);

            $('#paterno').text(respuesta.paterno);
            $('#materno').text(respuesta.materno);
            $('#nombre').text(respuesta.nombrePersona);
            $('#telefono').text(respuesta.telefono);
            $('#correo').text(respuesta.correo);
            $('#edad').text(edad(respuesta.fechaNacimiento));
        }
    });
}