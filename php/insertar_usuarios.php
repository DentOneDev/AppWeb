<?php
	include('seguridad.php');
	include_once('conexion.php');
/*
    if(isset($_GET['Id']) ){
        $id = $_GET['Id'];

        $sql = "INSERT INTO usuarios(Id, nombre,apellidos, password) VALUES(NULL, :nombre, :apellidos, :pwd);";
        $result = $conexion->prepare($sql);
        $result->execute(array(":id" => $id));
        $resultado = $result->fetch();
    }else{
        header("location:insertar_usuarios.php");
    }
	*/

if (isset($_POST['Actualizar'])) {
	$nombre = $_POST['nombre'];
	$apellidos = $_POST['apellidos'];
	$pwd = $_POST['pwd'];

	if (!empty($nombre) && !empty($apellidos) && !empty($pwd)) {

		$sql = "INSERT INTO usuarios(Id, nombre,apellidos, password) VALUES(NULL, :nombre, :apellidos, :pwd);";
		$result = $conexion->prepare($sql);
		$result->execute(array(
			':nombre' => $nombre,
			':apellidos' => $apellidos,
			':pwd' => $pwd
		));

		if ($result) {
			header("location:xonsulta_usuarios.php");
			echo "<script>alert('Registro guardado');</script>";
		} else {
			echo "Ocurrio un error al Insertar los datos :(";
		}
		$result->closeCursor();
		echo "<meta http-equiv='Refresh' content=0; url='insertar_usuarios.php'>";
	} else {
		echo "<script>alert('los campos estan vacios');</script>";
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Registro de Usuarios </title>
	<!--CSS-->
	<link rel="stylesheet" href="../css/style_usuarios.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300&display=swap" rel="stylesheet">
	<!--JS-->
	<script src="../js/mayusculas.js"></script>
</head>

<body>

	<div class="contenedor">
		<label class="titulo">Registro de Usuario</label>
		<form action="" name="formulario" method="POST">
			<label for="nombre">Nombre</label>
			<input type="text" name="nombre" id="nombre" value="<?php if ($resultado) echo $resultado['nombre']; ?>" placeholder="Escribe aqui tu nombre" onblur='mayusculas(this.name)'>
			<label for="apellidos">Apellidos</label>
			<input type="text" name="apellidos" id="apellidos" value="<?php if ($resultado) echo $resultado['apellidos']; ?>" placeholder="Escribe aqui tus apellidos" onblur="mayusculas(this.name)">
			<label for="pwd">Contraseña</label>
			<input type="password" name="pwd" id="pwd" value="<?php if ($resultado) echo $resultado['password']; ?>" placeholder="Escribe aqui tu contraseña">
			<div class="btn_group">
				<a href="../php/xonsulta_usuarios.php" class="cancelar">Cancelar</a>
				<input type="submit" name="Actualizar" id="guardar" value="Guardar" class="guardar">
			</div>
		</form>
	</div>
</body>

</html>