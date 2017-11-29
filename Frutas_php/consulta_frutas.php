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
		<a class="active" href="consulta_frutas.php">Consulta</a>
		
		<div id="derecha">
	   	<span style="color:#999;font-size:0.8em"><?php echo "(".$_SESSION["username"].") "; ?></span>
	   	<a href="login.php" target="_blank">Iniciar Sesión</a>
	   	<a href="logout.php">Cerrar Sesión</a>
		</div>

		</div>

		<div style="padding-left:16px">
		  <h2>Consulta</h2>
		  <p>Aqui podras consultar los productos.</p>

		</div>

		<?php
		echo "<table style='border: solid 1px black;'>";
		 echo "<tr><th>Id</th><th>Clase</th><th>Nombre</th></tr>";

		class TableRows extends RecursiveIteratorIterator {
		    function __construct($it) {
			parent::__construct($it, self::LEAVES_ONLY);
		    }

		    function current() {
			return "<td style='width: 150px; border: 1px solid black;'>" . parent::current(). "</td>";
		    }

		    function beginChildren() {
			echo "<tr>";
		    }

		    function endChildren() {
			echo "</tr>" . "\n";
		    }
		}

		$servername = "localhost";
		$username = "julen";
		$password = "as3-2-04";
		$dbname = "frutas";

		try {
		    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    $stmt = $conn->prepare("SELECT * FROM productos");
		    $stmt->execute();

		    // set the resulting array to associative
		    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

		    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
			echo $v;
		    }
		}
		catch(PDOException $e) {
		    echo "Error: " . $e->getMessage();
		}
		$conn = null;
		echo "</table>";
		?>

	</body>
</html>
