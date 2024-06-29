<?php
  //Declarando variables para la conexion
  $servidor = "localhost"; //El servidor que utilizaremos, en este caso sera el localhost.
  $usuario = "root"; //El usuario del servidor.
  $contrasenha = "Todo.Rock-777-"; //La contraseña de usuario del servidor.
  $db = "abrilstore"; //El nombre de la base de datos.

  //Creando la conexion.
  $conexion = mysqli_connect($servidor, $usuario, $contrasenha, $db);

  //Verificando la conexion.
  if (!$conexion) {
    echo "Fallo la conexión <br>";
    die("Connection failed: " . mysqli_connect_error());
  }else {
    echo "Conexión exitosa!<br>";


    


  }

  // Cierra la conexión
  //$conexion->close();
?>

