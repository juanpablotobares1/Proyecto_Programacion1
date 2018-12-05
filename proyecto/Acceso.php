<?php  

session_start();

$servidor = 'localhost';
$usuario = 'juanpablo';
$clave = '9886398319';
$database = 'proyecto';

$conexion = new PDO("mysql:host=$servidor;dbname=$database",$usuario,$clave);

$usr = $_SESSION['usr'];
$fecha = $_SESSION['fecha'];
$tr = $_SESSION['tr'];

$datos = array('usr' => $usr, 'fecha' => $fecha);

$sql = "SELECT usr, fecha_acceso, tiempo_respuesta FROM auditoria WHERE usr = :usr AND fecha_acceso = :fecha";

$ejecsql = $conexion -> prepare($sql);
$ejecsql -> execute($datos);

while ($fila=$ejecsql -> fetch(PDO::FETCH_ASSOC)) {
	$c++;
}

if ($c>0) {
	header('location: Home.php');
} else {
	$datos = array('usr' => $usr, 'fecha' => $fecha);

	$sql = "INSERT INTO auditoria (fecha_acceso, usr) VALUES (:fecha, :usr)";

	$ejecsql = $conexion -> prepare($sql);
	$ejecsql -> execute($datos);

	header('location: Home.php');
}

?>