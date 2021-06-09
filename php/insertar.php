<?php

	include('seguridad.php');

$contrasena = "12345678";
$usuario = "dev1";
$nombre_base_de_datos = "pruebas";
try{
	$base_de_datos = new PDO('mysql:host=localhost;dbname=' . $nombre_base_de_datos, $usuario, $contrasena);
	$base_de_datos->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "Conectado :)";

	$sentencia = $base_de_datos->prepare("INSERT INTO usuarios (id,nombre, password) VALUES (:id,:name, :value)");
	$sentencia->bindParam(':id', $id);
	$sentencia->bindParam(':name', $nombre);
	$sentencia->bindParam(':value', $password);

	// insertar una fila
	$id = 0000000003;
	$nombre = 'tres';
	$password = 3;
	$sentencia->execute();

	// insertar otra fila con diferentes valores
	$id = 0000000004;
	$nombre = 'cuatro';
	$valor = 4;
	$sentencia->execute();

}catch(Exception $e){
	echo "Ocurrió algo con la base de datos: " . $e->getMessage();
}

?>