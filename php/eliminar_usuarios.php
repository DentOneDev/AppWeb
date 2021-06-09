<?php
    require('seguridad.php');
    $id = $_GET["Id"];

    require("conexion.php");

    $sql = "DELETE FROM usuarios WHERE Id = :Id ";
    $result = $conexion->prepare($sql);
    $result->execute(array(":Id" =>$id));

    if ($result) {
        require("xonsulta_usuarios.php");
        echo '<script>alert("El registro se dio de baja correctamente");</script>';
    }
    $result->closeCursor();
    echo "<meta http-equiv='Refresh' content='0;url=xonsulta_usuarios.php>";
?>