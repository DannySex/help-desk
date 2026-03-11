<?php
session_start();
$usuario = $_POST['login'];
$password = sha1($_POST['password']);

include "../../../clases/usuarios.php";
$usuarios = new usuarios();
echo $usuarios->loginUsuario($usuario,$password);
?>