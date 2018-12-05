<?php

session_start();

$servidor = 'localhost';
$usuario = 'juanpablo';
$clave = '9886398319';
$database = 'proyecto';

$conexion = new PDO("mysql:host=$servidor;dbname=$database",$usuario,$clave);

$sql = "UPDATE usuario SET usuario='" . $_POST['usuario'] . "',clave='" . $_POST['pass'] . "' WHERE id_usuario=" . $_SESSION['id'];
$ejecucionSQLPDO = $conexion->prepare($sql);
$ejecucionSQLPDO->execute();


header('location: Administracionu.php');

?>