<?php  
	session_start();
	$servidor = 'localhost';
	$usuario = 'juanpablo';
	$clave = '9886398319';
	$database = 'proyecto';


	$conexion = new PDO("mysql:host=$servidor;dbname=$database",$usuario,$clave);

	$datos = array('empresa' => $_POST['empresa'], 'pais' => $_POST['pais']);

	$sql = "INSERT INTO empresa (empresa, pais_procedencia) VALUES(:empresa, :pais)";

	$ejecsql = $conexion -> prepare($sql);
	$ejecsql -> execute($datos);

	$usr = $_SESSION['usr'];
	$fecha = $_SESSION['fecha'];
	$tr = $_SESSION['tiempo'];

	$datos = array('fecha' => $fecha, 'usr' => $usr, 'tr' => $tr, 'serv' => 'Registró Empresa');

	$sql = "INSERT INTO auditoria ( fecha_acceso, usr, tiempo_respuesta, servicio_consumido) VALUES (:fecha, :usr, :tr, :serv)";

	$ejecsql = $conexion -> prepare($sql);
	$ejecsql -> execute($datos);

	header('location: Administracione.php');

?>