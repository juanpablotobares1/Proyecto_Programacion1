<?php

session_start();

$servidor = 'localhost';
$usuario = 'juanpablo';
$clave = '9886398319';
$database = 'proyecto';

$conexion = new PDO("mysql:host=$servidor;dbname=$database",$usuario,$clave);

$sql = "UPDATE empresa SET empresa='" . $_POST['empresa'] . "',pais_procedencia='" . $_POST['pais'] . "' WHERE id_empresa=" . $_SESSION['id'];
$ejecucionSQLPDO = $conexion->prepare($sql);
$ejecucionSQLPDO->execute();

header('location: Administracione.php');

?>