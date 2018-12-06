<?php
session_start();
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

	$usr = $_SESSION['usr'];
	$fecha = $_SESSION['fecha'];
	$tr = $_SESSION['tiempo'];

	$datos = array('fecha' => $fecha, 'usr' => $usr, 'tr' => $tr, 'serv' => 'Eliminó Chofer');

	$sql = "INSERT INTO auditoria ( fecha_acceso, usr, tiempo_respuesta, servicio_consumido) VALUES (:fecha, :usr, :tr, :serv)";

	$ejecsql = $conexion -> prepare($sql);
	$ejecsql -> execute($datos);

header('location: Administracion.php');
die();
?>
