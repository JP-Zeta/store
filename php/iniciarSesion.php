<?php
  include("connect.php");//Invoca al archivo connect.

  session_start(); // Inicia una nueva sesion o reanuda la existente.
  $_SESSION['login'] = false;

  // Captura los datos del formulario en variables.
  $rol = $_POST['rol'];
  $contrasena = $_POST['contrasena'];

  //Encriptamos los valores de la variable contrasena y se guarda en la variable contrasenaHash.
  //$contrasenaHash = password_hash($contrasena, PASSWORD_BCRYPT); //BCRYPT es el algoritmo de encriptacion, devuelve una cadena de 60 caracteres.

  // Consulta la tabla de usuarios
  $consult = "SELECT * FROM usuarios WHERE rol = '$rol'";
  $consult = mysqli_query($connect, $consult); // Se ejecuta la consulta.
  $consult = mysqli_fetch_array($consult);

  if ($consult) {
    //Validar Password. Compara la variable $contrasena y campo 'contrasena'. 
    if (password_verify($contrasena, $consult['contrasena'])) {
      $_SESSION['login'] = true;
      $_SESSION['rol'] = $rol;
      //Redirecciona a content.html
      header('Location: .../content.html');
    }else {
      echo "Contraseña incorrecta";
      echo "<br><a href='../index.html'>Intentalo de nuevo.</a>";
    }
  }else {
    //Si la consulta esta vacia entonces entonces significa que no hay usuario.
    echo "El usuario no existe";
    echo "<br><a href='../index.html'>Intentalo de nuevo.</a>";
  }

  //Cerrando la conexion.
  mysqli_close($connect);
?>