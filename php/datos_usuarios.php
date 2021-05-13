<?php  
	require_once("conexion.php");

	$nombre = $_POST["nombre"];
	$apellidos = $_POST["apellidos"];
	$pwd = $_POST["pwd"];

	if( isset($_POST['Actualizar']) ){
		$nombre = $_POST['nombre'];
		$apellidos = $_POST['apellidos'];
		$pwd = $_POST['pwd'];
		
		$id = (int) $_GET['Id'];

		if( !empty($nombre) && !empty($apellidos) && !empty($pwd)){
			$sql = "INSERT INTO usuarios(Id, nombre,apellidos, password) VALUES(NULL, :nombre, :apellidos, :pwd);";
			$result = $conexion->prepare($sql);
			$result->execute(array(
				':nombre' => $nombre,
				':apellidos' => $apellidos,
				':pwd' => $pwd,
				':id' => $id,
			));

			if($result) {

				require("../html/alta_usuarios.html");
				echo '<script>alert("El registro se guardo correctamente");</script>';
			}else{
				echo "Ocurrio un error al guardar los datos :(";
			}
			$result->closeCursor();
			echo "<meta http-equiv='Refresh' content='0;url='../html/alta_usuarios.html' '>";
		 }
	}
?>