<?php  
include "../../../clases/usuarios.php";
$usuarios = new usuarios;
$idUsuario = $_POST['idUsuario'];
$estatus = $_POST['estatus'];
echo $usuarios->cambioEstatusUsuario($idUsuario,$estatus);
?>