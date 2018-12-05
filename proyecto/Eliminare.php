<?php

$servidor = 'localhost';
$usuario = 'juanpablo';
$clave = '9886398319';
$database = 'proyecto';

$conexion = new PDO("mysql:host=$servidor;dbname=$database",$usuario,$clave);
   
$sql = "DELETE FROM empresa WHERE id_empresa=".$_GET['id'];

$ejecsql = $conexion -> prepare($sql);
$ejecsql -> execute();

$sql = "DELETE FROM empresa_vehiculo WHERE id_empresa=".$_GET['id'];

$ejecsql = $conexion -> prepare($sql);
$ejecsql -> execute();

header('location: Administracione.php');
die();
?>
