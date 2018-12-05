<?php  

$servidor = 'localhost';
$usuario = 'juanpablo';
$clave = '9886398319';
$database = 'proyecto';

$conexion = new PDO("mysql:host=$servidor;dbname=$database",$usuario,$clave);

$sql = 'SELECT usr, fecha_acceso FROM auditoria WHERE id_auditoria='.$_GET['id'];

$ejecsql = $conexion -> prepare($sql);
$ejecsql -> execute();

$datos = $ejecsql -> fetch(PDO::FETCH_ASSOC);

$exp = $datos['usr'] . " ; " . $datos['fecha_acceso'];
$_SESSION['exp'] = $exp;

$archivo = fopen('usr.txt', 'w+');
fwrite($archivo, $_SESSION['exp'].PHP_EOL);
fclose($archivo);

header("Content-disposition: attachment; filename: usr.txt");
header("Content-type: MIME");
readfile("usr.txt");
?>