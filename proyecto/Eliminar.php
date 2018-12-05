<?php

$servidor = 'localhost';
$usuario = 'juanpablo';
$clave = '9886398319';
$database = 'proyecto';

$conexion = new PDO("mysql:host=$servidor;dbname=$database",$usuario,$clave);
   
$sql = "DELETE FROM chofer WHERE id_chofer=".$_GET['id'];

$ejecsql = $conexion -> prepare($sql);
$ejecsql -> execute();

$sql = "DELETE FROM empresa_vehiculo WHERE id_empresavehiculo=".$_GET['id'];

$ejecsql = $conexion -> prepare($sql);
$ejecsql -> execute();

$sql = "DELETE FROM usuario WHERE id_usuario=".$_GET['id'];

$ejecsql = $conexion -> prepare($sql);
$ejecsql -> execute();

header('location: Administracion.php');
die();
?>
