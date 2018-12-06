<?php

session_start();

$servidor = 'localhost';
$usuario = 'juanpablo';
$clave = '9886398319';
$database = 'proyecto';

$conexion = new PDO("mysql:host=$servidor;dbname=$database",$usuario,$clave);

$sql = "UPDATE chofer SET nombre='" . $_POST['nombre'] . "',apellido='" . $_POST['apellido'] . "',email='" . $_POST['email'] . "',dni='" . $_POST['dni'] . "',id_vehiculo='" . $_POST['vehiculo'] . "',id_empresa='" . $_POST['empresa'] . "' WHERE id_chofer=" . $_SESSION['id'];
$ejecucionSQLPDO = $conexion->prepare($sql);
$ejecucionSQLPDO->execute();

$sql = "UPDATE empresa_vehiculo SET id_vehiculo='" . $_POST['vehiculo'] . "',id_empresa='" . $_POST['empresa'] . "' WHERE id_empresavehiculo=" . $_SESSION['id'];
$ejecucionSQLPDO = $conexion->prepare($sql);
$ejecucionSQLPDO->execute();

	$usr = $_SESSION['usr'];
	$fecha = $_SESSION['fecha'];
	$tr = $_SESSION['tiempo'];

	$datos = array('fecha' => $fecha, 'usr' => $usr, 'tr' => $tr, 'serv' => 'Modificó Chofer');

	$sql = "INSERT INTO auditoria ( fecha_acceso, usr, tiempo_respuesta, servicio_consumido) VALUES (:fecha, :usr, :tr, :serv)";

	$ejecsql = $conexion -> prepare($sql);
	$ejecsql -> execute($datos);

header('location: Administracion.php')

?>