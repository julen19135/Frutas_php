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
		<a class="active" href="comentarios.php">Comentarios</a>
		<a href="consulta_frutas.php">Consulta</a>
		
		<div id="derecha">
	   	<span style="color:#999;font-size:0.8em"><?php echo "(".$_SESSION["username"].") "; ?></span>
	   	<a href="login.php" target="_blank">Iniciar Sesión</a>
	   	<a href="logout.php">Cerrar Sesión</a>
		</div>
		</div>

		<div style="padding-left:16px">
		  <h2>Comentarios</h2>
		  <p>Aqui podras comentar tus opiniones sobre las compras realizadas y que opinas sobre los productos que ofrecemos.</p>

		
		<?php
		 
		if(isset($_POST['submit']))
		 
		{
		 
		$name = $_POST['name'];

		$comentario = $_POST['comentario'];
		 
		echo "Has enviado este nombre a la base de datos : <b> $name </b>";

		echo "Has enviado este comentario a la base de datos : <b> $comentario </b>";
		 
		$servername = "localhost";
		$username = "julen";
		$password = "as3-2-04";
		$dbname = "frutas";

		try {
		    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		    // set the PDO error mode to exception
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    $sql = "INSERT INTO Comentarios (Nombre, Comentario)
		    VALUES ('$name', '$comentario')";
		    // use exec() because no results are returned
		    $conn->exec($sql);
		    echo "Comentario enviado correctamente. (solo se vera en la base de datos porque no me interesa que se muestre en pantalla)";
		    }
		catch(PDOException $e)
		    {
		    echo $sql . "<br>" . $e->getMessage();
		    }

		$conn = null;
		 
		}
		 
		?>
		 
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		 
		<p>Nombre: </p>
		<input type="text" name="name"><br>

		<p>Comenta lo que quieras: <br/>
				<textarea name="comentario" rows="5" cols="50">Comentario: </textarea> <br/>
				<input type="submit" name="submit" value="Enviar">
				   <input type="reset" value="Borrar todo"></p>
		 
		</form>
		

		</div>

	</body>
</html>
