<?php 
    include("seguridad.php");
?>
<?php
        include_once 'conexion.php';

        $sql = "SELECT * FROM  usuarios ORDER BY Id ASC";
        $result = $conexion->prepare($sql);
        $result->execute();
        $tot_rows = $result->rowCount();
        $row = $result->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido: <?php echo $_SESSION['usuario'];?> </title>
    <link rel="stylesheet" href="../css/estilos_consulta.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
</head>

<body>
    <header>
        <nav>
            <div class="logo"><img src="../img/logo.png" alt="Logo UMB" title="UMB" ></div>
            <div class="elaces">
                <a href="xonsulta_usuarios.php"> <img class="logos" src="../img/home.svg" alt=""></a>
                <a href="../html/alta_usuarios.html"> <img class="logos" src="../img/plus.svg" alt=""></a>
                <a href="xonsulta_usuarios.php"><img class="logos" src="../img/users.svg" alt=""></a>
                <a href="logout.php"><img class="logos" src="../img/power-off.svg" alt=""></a>
            </div>
        </nav>
    </header>

    <div class="contenedor">
    <div class="title"><h2>Consulta general de usuarios</h2></div>
        <div class="total title">
            <div><a href="" class="texto"> <?php echo"Existen en total:   ". $tot_rows." Registros"; ?> </a></div>
            <div><a href="insertar_usuarios.php" class="nuevo">+ Nuevo Usuario</a></div>
        </div>
        <table>
            <thead>
                <tr>
                    <td>Clave</td>
                    <td>Nombre</td>
                    <td>Apellidos</td>
                    <td>Contraseña</td>
                    <td>Eliminar</td>
                    <td>Editar</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($row as $fila):?>
                    <tr class="registro">
                        <td> <?php echo $fila['Id']; ?></td>
                        <td> <?php echo $fila['nombre']; ?></td>
                        <td> <?php echo $fila['apellidos']; ?></td>
                        <td> <?php echo $fila['password']; ?></td>
                        <td><a href="eliminar_usuarios.php?Id=<?php echo $fila['Id'];?> " class="btn_delete">Eliminar</a></td>
                        <td><a href="actualizar.php?Id=<?php echo $fila['Id']; ?>" class="btn_update">Editar</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</body>

</html>