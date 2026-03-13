function loginUsuario() {
    $.ajax({
        type: "POST",
        data: $('#frmLogin').serialize(),
        url: "procesos/usuarios/login/loginUsuario.php",
        success: function(respuesta) {
            respuesta = respuesta.trim();
            if (respuesta == 1) {
                window.location.href = "vistas/inicio.php";
            } else {
Swal.fire({
    title: 'Intenta de nuevo',
    text: 'Error al guardar',
    imageUrl: '../DESK/public/img/nami_enojada.jpeg',
    imageHeight: 150,
    imageWidth: 150

                });
            }
        }
    });
    return false;
}