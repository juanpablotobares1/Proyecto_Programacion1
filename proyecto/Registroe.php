<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Empresa</title>
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
			<h2>Empresas</h2>
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
		<div style="background-color: #BCA9F5; border-radius: 20px;">
			<form class="margen">
				<h1>Agregar Empresa</h1><br>
				<table>
					<tr><td><p>Empresa:</p></td><td><input id="empresa" type="text" name="empresa"></td></tr>
					<tr><td><p>País de procedencia:</p></td><td><input id="pais" type="text" name="pais"></td></tr>
				</table>
				<button type="button" onclick="sendTheAJAX()">Registrar</button>
			</form>
			</div>
	</div>
	<div class="col-md-3"></div>
</body>
</html>

<script type="text/javascript">
	// 1. create a new XMLHttpRequest object -- an object like any other!
// 3. write a function that runs anytime the state of the AJAX request changes
function sendTheAJAX() {

	var empresa = document.getElementById('empresa').value;
	var pais = document.getElementById('pais').value;
	var data = new FormData();
	data.append("empresa", empresa);
	data.append("pais", pais);

	var myRequest = new XMLHttpRequest();
	// 2. open the request and pass the HTTP method name and the resource as parameters
	myRequest.open('POST', 'Registro1e.php', true);

	myRequest.send(data);

	myRequest.onreadystatechange = function () { 
    // 4. check if the request has a readyState of 4, which indicates the server has responded (complete)
	    if (myRequest.readyState === 4) {

	    	alert('Registro exitoso');

	       window.location = 'Administracione.php';
	    }
	}

	myRequest.send();
    //document.getElementById('reveal').style.display = 'none';
}
</script>