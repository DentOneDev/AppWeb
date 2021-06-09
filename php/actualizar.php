<?php
	include('seguridad.php');
?>
<?php
    include_once('conexion.php');

    if(isset($_GET['Id']) ){
        $id = $_GET['Id'];

        $sql = "SELECT * FROM usuarios WHERE Id = :id LIMIT 1";
        $result = $conexion->prepare($sql);
        $result->execute(array(":id" => $id));
        $resultado = $result->fetch();
    }else{
        header("location:xonsulta_usuarios.php");
    }

	if (isset($_POST['Actualizar'])){
		$nombre = $_POST['nombre'];
		$apellidos = $_POST['apellidos'];
		$pwd = $_POST['pwd'];
		
		$id = (int) $_GET['Id'];

		if( !empty($nombre) && !empty($apellidos) && !empty($pwd)){

			$sql = "UPDATE usuarios SET nombre = :nombre, apellidos = :apellidos, password = :pwd WHERE Id = :id";
			$result = $conexion->prepare($sql);
			$result->execute(array(
				':nombre' => $nombre,
				':apellidos' => $apellidos,
				':pwd' => $pwd,
				':id' => $id,
			));

			if ($result) {
				header("location:xonsulta_usuarios.php");
				
			}else{
				echo "Ocurrio un error al actualizar los datos :(";
			}		
			$result->closeCursor();
				echo "<meta http-equiv='Refresh' content='0;url=xonsulta_usuarios.php'>";
		}else {
			echo"<script>alert('los campos estan vacios');</script>";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Actualizar | Usuarios </title>
	<!--CSS-->
	<link rel="stylesheet" href="../css/style_usuarios.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300&display=swap" rel="stylesheet"> 
	<!--JS-->
	<script src="../js/mayusculas.js"></script>
	<script src="../js/jquery-1.11.1.js"></script>
</head>
<body>

	<div class="contenedor">
		<label class="titulo">Actulaizar Datos de Usuario</label>
		<form action="" name="formulario" method="POST">
			<label for="nombre">Nombre</label>
			<input type="text" name="nombre" id="nombre" value="<?php if($resultado) echo $resultado['nombre']; ?>" placeholder="Escribe aqui tu nombre" onblur='mayusculas(this.name)' onkeyup="checaMensaje(this.value)" >
			<label for="apellidos" >Apellidos</label>
			<input type="text" name="apellidos" id="apellidos" value="<?php if($resultado) echo $resultado['apellidos']; ?>" placeholder="Escribe aqui tus apellidos" onblur="mayusculas(this.name)" onkeyup="checaMensaje(this.value)">
			<label for="pwd">Contraseña</label>
			<input type="password" name="pwd" id="pwd" value="<?php if($resultado) echo $resultado['password']; ?>" placeholder="Escribe aqui tu contraseña" onkeyup="checaMensaje2(this.value) ">
			<div class="btn_group">
				<a href="../php/xonsulta_usuarios.php" class="cancelar">Cancelar</a>
				<input type="submit" name="Actualizar" id="guardar" value="Actualizar" class="guardar">
			</div>
		</form>
	</div>
	<script src="../js/vlogin.js"></script>
</body>
</html>