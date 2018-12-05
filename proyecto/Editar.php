<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Choferes</title>
	<link rel="stylesheet" type="text/css" href="estilos/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<style type="text/css">
*{padding: 0; margin: 0; box-sizing: border-box;}
body{height: 900px;}
header {
	background: url('http://www.autodatz.com/wp-content/uploads/2017/05/Old-Car-Wallpapers-Hd-36-with-Old-Car-Wallpapers-Hd.jpg');
	text-align: center;
	width: 100%;
	height: auto;
	background-size: cover;
	background-attachment: fixed;
	position: relative;
	overflow: hidden;
	border-radius: 0 0 85% 85% / 30%;
}
header .overlay{
	width: 100%;
	height: 100%;
	padding: 50px;
	color: #FFF;
	text-shadow: 1px 1px 1px #333;
  background-image: linear-gradient( 135deg, #9f05ff69 10%, #fd5e086b 100%);
	
}

h2 {
	font-family: 'Dancing Script', cursive;
	font-size: 50px;
	margin-bottom: 30px;
}
</style>
</head>
<body background="imagenes/fondo2.jpg">
	<?php  
	session_start(); 
	if (empty($_SESSION['login'])) {
		header('location: index.html');
		exit;
	}
	?>
	<header>
		<div class="overlay" >
			<h2>Choferes</h2>
			<div class="row">
				<div class="col-md-1"><form action="Home.php"><button class="button button3"><img src="imagenes/home.png" class="icono3"> Home</button></form></div>
				<div class="col-md-9"></div>
				<div class="col-md-2">
				<?php  
					echo "Usuario: ".$_SESSION['usr'];
					echo "<br><a href='Salir.php'>Cerrar Sesión</a>";
				?>
				</div>
			</div>
		</div>
	</header>
	<br>
<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<div style="background-color: #8258FA; border-radius: 20px;">
<?php
$servidor = 'localhost';
$usuario = 'juanpablo';
$clave = '9886398319';
$database = 'proyecto';

$conexion = new PDO("mysql:host=$servidor;dbname=$database",$usuario,$clave);

$sql = 'SELECT * FROM chofer WHERE id_chofer='.$_GET['id'];

$ejecsql = $conexion -> prepare($sql);
$ejecsql -> execute();

$datos = $ejecsql -> fetch(PDO::FETCH_ASSOC);

echo "
			<form action='Editar1.php' method='POST' enctype='multipart/form-data' class='margen'>
			<h1>Modificar datos de ".$datos['nombre']." ".$datos['apellido'].":</h1><br>
				<table>
					<tr><td><p>Nombre:</p></td><td><input type='text' name='nombre' value='".$datos['nombre']."'></td></tr>
					<tr><td><p>Apellido:</p></td><td><input type='text' name='apellido' value='".$datos['apellido']."'></td></tr>
					<tr><td><p>Email:</p></td><td><input type='text' name='email' value='".$datos['email']."'></td></tr>
					<tr><td><p>Documento:</p></td><td><input type='text' name='dni' value='".$datos['dni']."'></td></tr>
					<tr><td>Vehículos disponibles:</td><td><select name='vehiculo' value='".$datos['id_vehiculo']."'>";
					
					$sql ='SELECT id_vehiculo, marca, modelo FROM vehiculo'; 

					$ejecsql = $conexion -> prepare($sql);
					$ejecsql -> execute();

					while ($fila=$ejecsql -> fetch(PDO::FETCH_ASSOC)) {
						echo "<option value='".$fila['id_vehiculo']."' ".($datos['id_vehiculo'] == $fila['id_vehiculo'] ? "selected='selected'" : "").">".$fila['marca']." ".$fila['modelo']."</option>"; 
					} 

					
echo "				</select></td></tr>
					<tr><td>Empresa:</td><td><select name='empresa' value='".$datos['id_empresa']."'>";
					
					$sql ='SELECT id_empresa, empresa FROM empresa'; 

					$ejecsql = $conexion -> prepare($sql);
					$ejecsql -> execute();

					while ($fila=$ejecsql -> fetch(PDO::FETCH_ASSOC)) {
						echo "<option value='".$fila['id_empresa']."' ".($datos['id_empresa'] == $fila['id_empresa'] ? "selected='selected'" : "").">".$fila['empresa']."</option>"; 
					} 

echo "					</select></td></tr>
				</table><br>
				<input type='submit' name='enviar' value='Aceptar'>
			</form>
	";
	$_SESSION['id'] = $_GET['id'];
?>
</div>
	</div>
	<div class="col-md-3"></div>
</div>
</body>
</html>
