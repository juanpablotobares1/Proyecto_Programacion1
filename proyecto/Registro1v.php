<?php  
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

	header('location: Administracionv.php');
?>