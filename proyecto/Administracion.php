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
		<div class="overlay">
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
	<br><br>
<div class="panel panel-danger" id="margen" style="border-radius: 20px">
  <div class="panel-heading" style="border-radius: 20px"><center><h3>Choferes registrados <img src="imagenes/persona.png" class="icono2"></h3></center></div>
  <table class="table">
	<th>APELLIDO</th><th>NOMBRE</th><th>CORREO</th><th>DOCUMENTO</th><th>VEHÍCULO</th><th>EMPRESA</th><th>EDITAR</th><th>BORRAR</th>
	<?php  
	$servidor = 'localhost';
	$usuario = 'juanpablo';
	$clave = '9886398319';
	$database = 'proyecto';

	$conexion = new PDO("mysql:host=$servidor;dbname=$database",$usuario,$clave);

	$sql = "SELECT id_chofer, nombre, apellido, email, dni, marca, modelo, empresa FROM chofer INNER JOIN vehiculo ON chofer.id_vehiculo = vehiculo.id_vehiculo INNER JOIN empresa ON chofer.id_empresa = empresa.id_empresa ORDER BY apellido ASC ";


	$ejecsql = $conexion -> prepare($sql);
	$ejecsql -> execute();

	$datos = $ejecsql -> fetchall();

	foreach ($datos as $key => $value) {
		echo "<tr>";
		echo "<td>".$value['apellido']."</td>";
		echo "<td>".$value['nombre']."</td>";
		echo "<td>".$value['email']."</td>";
		echo "<td>".$value['dni']."</td>";
		echo "<td>".$value['marca']." ".$value['modelo']."</td>";
		echo "<td>".$value['empresa']."</td>";
		echo "<td><a href='Editar.php?id=".$value['id_chofer']."'><img src='imagenes/lapiz.png' class='icono'></a></td>";
		echo "<td><a href='Eliminar.php?id=".$value['id_chofer']."'><img src='imagenes/basura.png' class='icono'></a></td>";
		echo "</tr>";
	}
	?>
	<tr><td><a href="Registro.php"><img src="imagenes/mas.png" class="icono3"></a></td></tr>
</table>
</div>
</body>
</html>