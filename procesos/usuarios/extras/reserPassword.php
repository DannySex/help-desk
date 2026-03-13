<?php  
include "../../../clases/usuarios.php";
$usuarios = new usuarios;
$datos = array(
    "password"=>sha1($_POST['passwordReset']),
    "idUsuario"=>$_POST['idUsuarioReset']
);
echo $usuarios->resetPassword($datos);
?>