<?php  
include "../../../clases/usuarios.php";
$usuarios = new usuarios();
$datos = array(
"idUsuario" => $_POST['idUsuario'],
"idPersona" => $_POST['idPersona']
);
echo $usuarios->eliminarUsuario($datos);
?>