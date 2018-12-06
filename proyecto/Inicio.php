<?php  
	
	function microtime_float(){
    	list($usec, $sec) = explode(" ", microtime());
    	return ((float)$usec + (float)$sec);
	}

	session_start();

	$tiempo1 = microtime_float();

	$servidor = 'localhost';
	$usuario = 'juanpablo';
	$clave = '9886398319';
	$database = 'proyecto';

	$usr = $_POST['usr'];
	$pass = $_POST['pass'];
	$fecha = date('j/n/y');

	$conexion = new PDO("mysql:host=$servidor;dbname=$database",$usuario,$clave);

	$datos = array('usr' => $usr, 'pass' => $pass);

	$sql = "SELECT usuario, clave FROM usuario WHERE usuario = :usr AND clave = :pass";

	$ejecsql = $conexion -> prepare($sql);
	$ejecsql -> execute($datos);

	while ($fila=$ejecsql -> fetch(PDO::FETCH_ASSOC)) {
		$c++;
	}

	if ($c>0) {
		$_SESSION['usr'] = $usr;
		$tiempo2 = microtime_float();
		$tiempo = $tiempo2 - $tiempo1;
		$_SESSION['login'] = 1;
		$_SESSION['fecha'] = $fecha;
		$_SESSION['tiempo'] = $tiempo;
		header('location: Home.php');
	} else {
		header('location: index.html');
	}

?>