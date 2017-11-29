<?php
// Start the session
session_start();
if (!isset($_SESSION["username"])){
	$_SESSION["username"] = "webuser";
	$_SESSION["password"] = "webuser";
}
?>
<html>
	<head>
		<link rel=stylesheet href="css/style.css" type="text/css">
	</head>
	
	<body background="Imagenes/Frutas_fondo.jpg">
		
		<div class="topnavtitle">
			<div class="titulo">
				<h3>Web frutas</h3>
			</div>
		</div>
		
		<div class="topnav">
		  <a href="index.php">Inicio</a>
		  <a href="productos.php">Productos</a>
		  <a href="contacto.php">Contacto</a>
		  <li><a href="tipos.php">Tipos de fruta</a>
					<ul>
						<li><a href="de_temporada.php">De temporada</a></li>
						<li><a href="tropicales.php">Tropicales</a></li>
						<li><a href="frutas_del_bosque.php">Frutas del bosque</a></li>
						
					</ul>
			</li>
		<a href="comentarios.php">Comentarios</a>
		<a href="consulta_frutas.php">Consulta</a>
		
		<div id="derecha">
	   	<span style="color:#999;font-size:0.8em"><?php echo "(".$_SESSION["username"].") "; ?></span>
	   	<a href="login.php" target="_blank">Iniciar Sesión</a>
	   	<a href="logout.php">Cerrar Sesión</a>
		</div>
		</div>

		<div style="padding-left:16px">
		  <h2>Tipos de fruta</h2>
		  <p>Aqui tendras todo los tipos de fruta: tropical, de temporada, ...</p>
		</div>

	</body>
</html>
