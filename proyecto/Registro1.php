<?php  
	$servidor = 'localhost';
	$usuario = 'juanpablo';
	$clave = '9886398319';
	$database = 'proyecto';

	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$email = $_POST['email'];
	$dni = $_POST['dni'];
	$usr = $_POST['usr'];
	$pass = $_POST['pass'];
	$vehiculo = $_POST['vehiculo'];
	$empresa = $_POST['empresa'];

	$conexion = new PDO("mysql:host=$servidor;dbname=$database",$usuario,$clave);

	$datos = array('nombre' => $nombre, 'apellido' => $apellido, 'email' => $email, 'dni' => $dni, 'vehiculo' => $vehiculo, 'empresa' => $empresa);

	$sql = "INSERT INTO chofer (nombre, apellido, email, dni, id_vehiculo, id_empresa) VALUES(:nombre, :apellido, :email, :dni, :vehiculo, :empresa)";

	$ejecsql = $conexion -> prepare($sql);
	$ejecsql -> execute($datos);

	$datos = array('vehiculo' => $vehiculo, 'empresa' => $empresa);

	$sql = "INSERT INTO empresa_vehiculo (id_vehiculo, id_empresa) VALUES(:vehiculo, :empresa)";

	$ejecsql = $conexion -> prepare($sql);
	$ejecsql -> execute($datos);

	header('location: Administracion.php');
?>