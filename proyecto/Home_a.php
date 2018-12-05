<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>HOME</title>
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
		<div class="overlay" >
			<h2>HOME</h2>
			<div class="row">
				<div class="col-md-10"></div>
				<div class="col-md-2">
				<?php  
					echo "Administrador: ".$_SESSION['admin'];
					echo "<br><a href='Salir.php'>Cerrar Sesión</a>";
					?>
				</div>
			</div>
		</div>
	</header><br>
<center>
<div class="row">
<div class="col-md-6">
<form action="Administracionu.php"><button class="button button1">Usuarios <img src="imagenes/usuario.png" class="icono2"></button></form>
</div>
<div class="col-md-6">
<form action="Auditoria.php"><button class="button button1">Auditoría <img src="imagenes/registro.png" class="icono2"></button></form>
</div>
</div>
</center>
</body>

</html>