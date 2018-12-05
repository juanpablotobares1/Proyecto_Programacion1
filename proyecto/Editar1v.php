<?php

session_start();

$servidor = 'localhost';
$usuario = 'juanpablo';
$clave = '9886398319';
$database = 'proyecto';

$conexion = new PDO("mysql:host=$servidor;dbname=$database",$usuario,$clave);

$sql = "UPDATE vehiculo SET marca='" . $_POST['marca'] . "',modelo='" . $_POST['modelo'] . "',patente='" . $_POST['patente'] . "',anho_fabricacion='" . $_POST['ano'] . "' WHERE id_vehiculo=" . $_SESSION['id'];
$ejecucionSQLPDO = $conexion->prepare($sql);
$ejecucionSQLPDO->execute();



header('location: Administracionv.php')

?>