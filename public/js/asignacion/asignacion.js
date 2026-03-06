$(document).ready(function() {
    $('#tablaAsignacionesLoad').load('asignacion/tablaAsignacion.php');
});

function asignarEquipo() {
    $.ajax({
        type: "POST",
        data: $('#frmAsignarEquipo').serialize(),
        url: "../procesos/asignacion/asignar.php",
        success: function(respuesta) {
            respuesta = respuesta.trim();
            if (respuesta == 1) {
                $('#frmAsignarEquipo')[0].reset();
                $('#tablaAsignacionesLoad').load('asignacion/tablaAsignacion.php')
                Swal.fire("Asignado con exito", "success");
            } else {
                Swal.fire("Fallo al asignar" + respuesta, "error");
            }
        }
    });
    return false;
}

function eliminarAsignacion(idAsignacion) {
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
                data: "idAsignacion=" + idAsignacion,
                url: "../procesos/asignacion/eliminarAsignacion.php",
                success: function(respuesta) {
                    if (respuesta == 1) {
                        $('#tablaAsignacionesLoad').load('asignacion/tablaAsignacion.php')
                        Swal.fire("Eliminado con exito", "success");
                    } else {
                        Swal.fire("Fallo al eliminar" + respuesta, "error");
                    }
                }
            });
        }
    })
    return false;
}