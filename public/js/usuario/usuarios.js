$(document).ready(function() {
    $('#tablaUsuariosLoad').load("usuarios/tablaUsuarios.php");
});

function agregarNuevoUsuario() {
    $.ajax({
        type: "POST",
        data: $('#frmAgregarUsuario').serialize(),
        url: "../procesos/usuarios/crud/agregarNuevoUsuario.php",
        success: function(respuesta) {
            console.log(respuesta);
            respuesta = respuesta.trim();
            if (respuesta == 1) {
                $('#tablaUsuariosLoad').load("usuarios/tablaUsuarios.php");
                $('#frmAgregarUsuario')[0].reset();
                swal.fire("agregado con exito", "success");
            } else {
                swal.fire(":(", "Error al agregar" + respuesta, "error");
            }
        }
    });
    return false;
}

function obtenerDatosUsuario(idUsuario) {
    $.ajax({
        type: "POST",
        data: "idUsuario=" + idUsuario,
        url: "../procesos/usuarios/crud/obtenerDatosUsuario.php",
        success: function(respuesta) {
            respuesta = jQuery.parseJSON(respuesta);
            $('#idUsuario').val(respuesta['idUsuario']);
            $('#paternou').val(respuesta['paterno']);
            $('#maternou').val(respuesta['materno']);
            $('#nombreu').val(respuesta['nombrePersona']);
            $('#fechaNacimientou').val(edad(respuesta['fechaNacimiento']));
            $('#sexou').val(respuesta['sexo']);
            $('#telefonou').val(respuesta['telefono']);
            $('#correou').val(respuesta['correo']);
            $('#usuariou').val(respuesta['nombreUsuario']);
            $('#idRolu').val(respuesta['idRol']);
            $('#ubicacionu').val(respuesta['ubicacion']);

        }
    });
}

function edad(dateString) {
    let hoy = new Date()
    let fechaNacimiento = new Date(dateString)
    let edad = hoy.getFullYear() - fechaNacimiento.getFullYear()
    let diferenciaMeses = hoy.getMonth() - fechaNacimiento.getMonth()
    if (
        diferenciaMeses < 0 ||
        (diferenciaMeses === 0 && hoy.getDate() < fechaNacimiento.getDate())
    ) {
        edad--
    }
    return edad
}

function actualizarUsuario() {
    $.ajax({
        type: "POST",
        data: $('#frmActualizarUsuario').serialize(),
        url: "../procesos/usuarios/crud/actualizarUsuario.php",
        success: function(respuesta) {
            respuesta = respuesta.trim();
            if (respuesta == 1) {
                $('#tablaUsuariosLoad').load("usuarios/tablaUsuarios.php");
                $('#modalActualizarUsuarios').modal('hide');
                $('#frmAgregarUsuario')[0].reset();
                swal.fire("actualizado con exito", "success");
            } else {
                swal.fire(":(", "Error al actualizar" + respuesta, "error");
            }

        }
    });
    return false;
}

function agregarIdUsuarioReset(idUsuario) {
    $('#idUsuarioReset').val(idUsuario);
}

function resetPassword() {
    $.ajax({
        type: "POST",
        data: $('#frmActualizaPassword').serialize(),
        url: "../procesos/usuarios/extras/reserPassword.php",
        success: function(respuesta) {
            respuesta = respuesta.trim();
            if (respuesta == 1) {
                $('#modalResetPassword').modal('hide');
                swal.fire("si", "actualizado con exito", "success");
            } else {
                swal.fire(":(", "Error al actualizar" + respuesta, "error");
            }
        }
    })
    return false;
}

function cambioEstatusUsuario(idUsuario, estatus) {
    $.ajax({
        type: "POST",
        data: "idUsuario=" + idUsuario + "&estatus=" + estatus,
        url: "../procesos/usuarios/extras/cambioEstatus.php",
        success: function(respuesta) {
            respuesta = respuesta.trim();
            if (respuesta == 1) {
                $('#tablaUsuariosLoad').load("usuarios/tablaUsuarios.php");
                swal.fire("si", "actualizado con exito", "success");
            } else {
                swal.fire(":(", "Error al actualizar" + respuesta, "error");
            }
        }
    });
}

function eliminarUsuario(idUsuario, idPersona) {
    Swal.fire({
        title: 'Estas seguro de eliminar este registro',
        text: "una vez eliminado no podra ser recuperado!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                data: "idUsuario= " + idUsuario + "&idPersona=" + idPersona,
                url: "../procesos/usuarios/crud/eliminarUsuario.php",
                success: function(respuesta) {
                    respuesta = respuesta.trim();
                    if (respuesta == 1) {
                        $('#tablaUsuariosLoad').load("usuarios/tablaUsuarios.php");
                        swal.fire("si", "actualizado con exito", "success");
                    } else {
                        swal.fire(":(", "Error al actualizar" + respuesta, "error");
                    }
                }
            });
        }
    })
    return false;
}