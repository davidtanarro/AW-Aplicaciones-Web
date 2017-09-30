<?php 

  require_once 'usuario.php';

  $id = $_POST['parametro'];

  $us = new Usuario($id);
  if ($us->eliminarUsuario()) {
      header("Location: ../admin_gestionarUsuarios.php");
      exit(); 
  }
  else{
    echo "no se ha eliminado";
  }

?> 