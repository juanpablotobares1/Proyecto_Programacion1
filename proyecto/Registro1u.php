<?php  
	$servidor = 'localhost';
	$usuario = 'juanpablo';
	$clave = '9886398319';
	$database = 'proyecto';

	$usr = $_POST['usr'];
	$pass = $_POST['pass'];


	$conexion = new PDO("mysql:host=$servidor;dbname=$database",$usuario,$clave);

	$datos = array('usr' => $usr, 'pass' => $pass);

	$sql = "INSERT INTO usuario (usuario, clave) VALUES(:usr, :pass)";

	$ejecsql = $conexion -> prepare($sql);
	$ejecsql -> execute($datos);

	header('location: Administracionu.php');
?>