<?php
    require('seguridad.php');
    require('conexion.php');

    $user = htmlentities(addslashes($_POST['inputusuario']));
    $pwd = htmlentities(addslashes($_POST['inputpwd']));

    $sql = "SELECT * FROM usuarios WHERE nombre = :user AND password = :pwd";
    $result = $conexion->prepare($sql);
    $result->bindValue(":user", $user);
    $result->bindValue(":pwd", $pwd);
    $result->execute();
    $numero_registro = $result->rowCount();

    if($numero_registro != 0 ){
            
        $row = $result->fetch(PDO::FETCH_ASSOC);

        if($user === $row['nombre'] & $pwd === $row['password']){

            session_start();
            $_SESSION["usuario"] = $user;
            header("location: xonsulta_usuarios.php");

        }else{
            
            require("location: index.html");
            echo '<script>alert("El usuario y/o contraseña son incorrectos");</script>';
            
        }
        $result->closeCursor();
        echo "<meta http-equiv='Refresh' content='0'; url= 'index.html' >";

    }else{
        header("location: ../index.html");
    }

?>