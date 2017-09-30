<?php 

	  require_once 'conductor.php';

	  $id = $_POST['parametro'];
	  $c = new Conductor($id);
	  $c->eliminarConductor();
	  
	  header("Location: ../admin_gestionarConductores.php");
	  exit();

?> 