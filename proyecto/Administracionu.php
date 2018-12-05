<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	   <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
	<title>Usuarios</title>
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
	if (empty($_SESSION['loginadmin'])) {
		header('location: Inicio.html');
		exit;
	}
	?>
	<header>
		<div class="overlay">
			<h2>Usuarios</h2>
			<div class="row">
				<div class="col-md-1"><form action="Home_a.php"><button class="button button3"><img src="imagenes/home.png" class="icono3"> Home</button></form></div>
				<div class="col-md-9"></div>
				<div class="col-md-2">
				<?php  
					echo "Administrador: ".$_SESSION['admin'];
					echo "<br><a href='Salir.php'>Cerrar Sesión</a>";
				?>
				</div>
			</div>
		</div>
	</header>
	<br><br>
<div class="panel panel-danger" id="margen" style="border-radius: 20px">
  <div class="panel-heading" style="border-radius: 20px"><center><h3>Usuarios Registrados <img src="imagenes/usuario.png" class="icono2"></h3></center></div>
  <table class="table">
	<th>USUARIO</th><th>CLAVE</th><th>EDITAR</th><th>BORRAR</th>
	<?php  
	$servidor = 'localhost';
	$usuario = 'juanpablo';
	$clave = '9886398319';
	$database = 'proyecto';

	$conexion = new PDO("mysql:host=$servidor;dbname=$database",$usuario,$clave);

	$sql = "SELECT id_usuario, usuario, clave FROM usuario ORDER BY usuario ASC";


	$ejecsql = $conexion -> prepare($sql);
	$ejecsql -> execute();

	$datos = $ejecsql -> fetchall();

	foreach ($datos as $key => $value) {
		echo "<tr>";
		echo "<td>".$value['usuario']."</td>";
		echo "<td>".$value['clave']."</td>";
		echo "<td><a href='Editaru.php?id=".$value['id_usuario']."'><img src='imagenes/lapiz.png' class='icono'></a></td>";
		echo "<td><a href='Eliminaru.php?id=".$value['id_usuario']."'><img src='imagenes/basura.png' class='icono'></a></td>";
		echo "</tr>";
	}
	?>
	<tr><td><a href="Registrou.php"><img src="imagenes/mas.png" class="icono3"></a></td></tr>
</table>
</div>
</body>
</html>