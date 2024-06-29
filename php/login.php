<?php
  //include("connect.php"); //Include llama al archivo connect.php

  // Captura los datos del formulario en variables.
  $rol = $_POST['rol'];
  $contrasena = $_POST['contrasena'];

  //Encriptamos los valores de la variable contrasena y se guarda en la variable contrasenaHash.
  $contrasenaHash = password_hash($contrasena, PASSWORD_BCRYPT); //BCRYPT es el algoritmo de encriptacion, devuelve una cadena de 60 caracteres.

  // Consulta la tabla de usuarios
  $sql = "SELECT * FROM usuario WHERE rol = '$rol'";
  $result = $conexion->query($sql);


  if ($result->num_rows > 0) {
    // Usuario encontrado, verifica la contraseña
    $row = $result->fetch_assoc();
    if (password_verify($contrasena, $row['contrasena'])) {
        // Contraseña correcta, puedes redirigir al usuario o realizar otras acciones
        echo "Usuario autenticado correctamente";
    } else {
        // Contraseña incorrecta
        echo "Contraseña incorrecta";
    }
  } else {
      // Usuario no encontrado
      echo "Usuario no encontrado";
  }


  
?>