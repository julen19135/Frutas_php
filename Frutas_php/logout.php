
<?php
session_start();
session_unset(); 
session_destroy(); 
	
header('Location: /home/julen/public_html/html/Frutas_php(copia)/index.php');
exit;
	
?>
