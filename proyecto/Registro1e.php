<?php  
	$servidor = 'localhost';
	$usuario = 'juanpablo';
	$clave = '9886398319';
	$database = 'proyecto';

	$empresa = $_POST['empresa'];
	$pais = $_POST['pais'];


	$conexion = new PDO("mysql:host=$servidor;dbname=$database",$usuario,$clave);

	$datos = array('empresa' => $empresa, 'pais' => $pais);

	$sql = "INSERT INTO empresa (empresa, pais_procedencia) VALUES(:empresa, :pais)";

	$ejecsql = $conexion -> prepare($sql);
	$ejecsql -> execute($datos);

	header('location: Administracione.php');
?>