<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Consulta de datos </title>
</head>

<body>
  <?php
  echo '<link href="../css/consulta_tabla.css" type="text/css" rel="stylesheet">';
  /*contenedor */
  echo "<div class=contenedor><table class=table>";
  echo "<tr class=tr >
        <th class=th >Id</th>
        <th class=th >Nombre</th>
        <th class=th >Apellido</th>
        <th class=th >Acciones</th>
      </tr>";
  class TableRows extends RecursiveIteratorIterator
  {
    function __construct($it)
    {
      parent::__construct($it, self::LEAVES_ONLY);
    }

    function current()
    {
      return "<td class=td>" . parent::current() . "</td>";
      echo " <button> </button>";
    }

    function beginChildren()
    {
      echo "<tr class=tr>";
    }

    function endChildren()
    {
      echo "<td> <a class=enlace href=../html/alta_usuarios.html><button class='btn'> Editar </button></a> <a><button class='btn'>Eliminar</button> </td></a> </tr>" . "\n";
      echo "<td>";
    }
  }

  //CAMBIAR EL HOST Y DATOS DE LA BASE DE DATOS Y LA TABLA EN LA  LINEA 28
  try {
    $user = "dev1";
    $conn = new PDO("mysql:host=localhost;dbname=pruebas", $user, 12345678);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT Id, nombre, apellidos FROM usuarios");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    foreach (new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k => $v) {
      echo $v;
    }
  } catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
  }
  $conn = null;
  echo "</table></div>";
  ?>
</body>

</html>