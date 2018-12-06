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

	$usr = $_SESSION['usr'];
	$fecha = $_SESSION['fecha'];
	$tr = $_SESSION['tiempo'];

	$datos = array('fecha' => $fecha, 'usr' => $usr, 'tr' => $tr, 'serv' => 'Modificó Vehículo');

	$sql = "INSERT INTO auditoria ( fecha_acceso, usr, tiempo_respuesta, servicio_consumido) VALUES (:fecha, :usr, :tr, :serv)";

	$ejecsql = $conexion -> prepare($sql);
	$ejecsql -> execute($datos);


header('location: Administracionv.php')

?>