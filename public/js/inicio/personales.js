function datosPersonalesInicio(idUsuario) {
    console.log("ID usuario:", idUsuario);

    $.ajax({
        type: "POST",
        data: { idUsuario: idUsuario },
        url: "../procesos/usuarios/crud/obtenerDatosUsuario.php",
        success: function(respuesta) {
            console.log("Respuesta:", respuesta);

            let datos = JSON.parse(respuesta);

            // Campos en pantalla
            $('#paterno').text(datos.paterno);
            $('#materno').text(datos.materno);
            $('#nombre').text(datos.nombrePersona);
            $('#telefono').text(datos.telefono);
            $('#correo').text(datos.correo);

            // Edad (si la quieres)
            $('#edad').text(datos.fechaNacimiento ? calcularEdad(datos.fechaNacimiento) : "N/A");

            // Fecha de nacimiento en modal (input type="date")
            if(datos.fechaNacimiento){
                $('#fechaNacInicio').val(datos.fechaNacimiento); // debe ser YYYY-MM-DD
            } else {
                $('#fechaNacInicio').val("");
            }
        }
    });
}

// Función simple para calcular edad
function calcularEdad(fechaNacimiento) {
    let hoy = new Date();
    let nacimiento = new Date(fechaNacimiento);
    let edad = hoy.getFullYear() - nacimiento.getFullYear();
    let mes = hoy.getMonth() - nacimiento.getMonth();
    if (mes < 0 || (mes === 0 && hoy.getDate() < nacimiento.getDate())) {
        edad--;
    }
    return edad;
}