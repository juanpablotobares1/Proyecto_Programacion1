<?php

$servidor = 'localhost';
$usuario = 'juanpablo';
$clave = '9886398319';
$database = 'proyecto';

$conexion = new PDO("mysql:host=$servidor;dbname=$database",$usuario,$clave);
   
$sql = "DELETE FROM usuario WHERE id_usuario=".$_GET['id'];

$ejecsql = $conexion -> prepare($sql);
$ejecsql -> execute();


header('location: Administracionu.php');
die();
?>
