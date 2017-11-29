<?php
// Start the session
session_start();
if (isset($_POST["env"])){
	$username = $_POST["uname"];
	$password = $_POST["psw"];
	try {
		$conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"));
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    $_SESSION["username"] = $_POST["uname"];
	    $_SESSION["password"] = $_POST["psw"];
	    	
	
	    header('Location: index.php'); //redireccion
        exit;
    
	}
	catch (PDOException $e){
	    echo "Usuario o contraseña incorrectos";
    }
}
else {
	
echo '
<html>
<head>
  <title>ASIR(Web2)</title>
  <meta charset="UTF-8">
  <meta name="description" content="Probando bordes">
  <meta name="keywords" content="HTML, CSS, bordes">
  <meta name="author" content="root" >
  <link rel="stylesheet" type="text/css" href="css/estilos2.css">
  
</head>
<body>
	
<form method="post" action="';
echo addslashes(htmlspecialchars($_SERVER["PHP_SELF"]));
echo '">
<div class="container">
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>
    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
    <button type="submit" name="env">Login</button>
  </div>
</form> 
</body>
</html>';
}
?>
