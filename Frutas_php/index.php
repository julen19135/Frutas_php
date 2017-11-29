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
		
		<script>
			function startTime() {
				var today = new Date();
				var h = today.getHours();
				var m = today.getMinutes();
				var s = today.getSeconds();
				m = checkTime(m);
				s = checkTime(s);
				document.getElementById('txt').innerHTML =
				h + ":" + m + ":" + s;
				var t = setTimeout(startTime, 500);
			}
			function checkTime(i) {
				if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
				return i;
			}
		</script>
		
	</head>
	
	<body background="Imagenes/Frutas_fondo.jpg" onload="startTime()">
		
		<div class="topnavtitle">
			<div class="titulo">
				<h3>Web frutas</h3>
			</div>
		</div>
		
		<div class="topnav">
		  <a class="active" href="index.php">Inicio</a>
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
		  <h2>Inicio</h2>
		  <p>Somos una tienda de fruta que vende fruta muy fresca.</p>
		  <p>Las frutas constituyen un grupo de alimentos indispensable para nuestra salud y bienestar, especialmente por su aporte de fibra, vitaminas y minerales y sustancias de acción antioxidante (vitamina C, Vitamina E, beta-caroteno, licopeno, luteína, flavonoides, antocianinas, etc.). Junto con verduras y hortalizas, son casi fuente exclusiva de vitamina C. La gran diversidad de especies, con sus distintas propiedades organolépticas (aquellas que apreciamos mediante los sentidos, como el sabor, aroma, color, textura...) y la distinta forma de prepararlas, hacen de ellas productos de gran aceptación por parte de los consumidores, sobre todo del sur de Europa.
		  </p>
		</div>
		
		<div class="info_nutricional">
			<img src="Imagenes/info_nutricional.jpg">
		</div>
		
		<p>Hora</p>
		<div id="txt"></div>
		
	</body>
</html>
