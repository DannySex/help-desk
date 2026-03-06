<?php
$idUsuario = $_POST['idUsuario'];
include "../../../clases/Usuarios.php";
$usuarios = new Usuarios();
echo json_encode($usuarios->obtenerDatosUsuario($idUsuario));
?>