<?php
	include('seguridad.php');
?>
<?php  
	try{
		$conexion = new PDO('mysql:host=localhost; dbname=pruebas', 'dev1', '12345678');
		$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$conexion->exec("SET CHARACTER SET utf8");	
	}catch(PDOException $e){
		die('Error: ' . $e->getMessage());
	}
?>