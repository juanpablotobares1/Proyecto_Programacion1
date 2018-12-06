<?php  

	session_start();

	$servidor = 'localhost';
	$usuario = 'juanpablo';
	$clave = '9886398319';
	$database = 'proyecto';

	$marca = $_POST['marca'];
	$modelo = $_POST['modelo'];
	$patente = $_POST['patente'];
	$ano = $_POST['ano'];

	$conexion = new PDO("mysql:host=$servidor;dbname=$database",$usuario,$clave);

	$datos = array('marca' => $marca, 'modelo' => $modelo, 'patente' => $patente, 'ano' => $ano);

	$sql = "INSERT INTO vehiculo (marca, modelo, patente, anho_fabricacion) VALUES(:marca, :modelo, :patente, :ano)";

	$ejecsql = $conexion -> prepare($sql);
	$ejecsql -> execute($datos);

	$usr = $_SESSION['usr'];
	$fecha = $_SESSION['fecha'];
	$tr = $_SESSION['tiempo'];

	$datos = array('fecha' => $fecha, 'usr' => $usr, 'tr' => $tr, 'serv' => 'Registró Vehículo');

	$sql = "INSERT INTO auditoria ( fecha_acceso, usr, tiempo_respuesta, servicio_consumido) VALUES (:fecha, :usr, :tr, :serv)";

	$ejecsql = $conexion -> prepare($sql);
	$ejecsql -> execute($datos);

	header('location: Administracionv.php');
?>