<?php
//Inicia una nueva sesion o reanuda la existente.
  session_start();
  $login = $_SESSION['login'];

  if (!$login) {
    header('Location: index.html');
  }else {
    //Por es estrictamente necesario, pero facilitara el codigo mas adelante.
    $rol = $_SESSION['rol'];
  }
?>