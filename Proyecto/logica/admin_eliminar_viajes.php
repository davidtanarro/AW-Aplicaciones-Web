<?php 

  $idViaje = $_POST['parametro1'];
  $idConductor = $_POST['parametro2'];
  $fechaSalida = $_POST['parametro3'];


  require_once 'viaje.php';
  $v = new Viaje($idViaje);

  $v->eliminarViaje();
  
  // Retornamos a diferentes vistas dependiendo si el viaje eliminado se ha realizado o no
  if ($v->esViajeRealizado($fechaSalida)) { 
        header("Location: ../admin_estadisticas.php");
        exit();
  }
  else {
        header("Location: ../admin_gestionarViajes.php");
        exit();
  }

?> 