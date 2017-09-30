
<?php

	$nombre=$_POST['nombre'];
	$apellido1=$_POST['apellido1'];
	$apellido2=$_POST['apellido2'];
	$apellido1 = $apellido1 . " " . $apellido2;
	$fechaContratacion=$_POST['fechaContratacion'];
	

	require_once 'conductor.php';
 	Conductor::insertar($nombre, $apellido1, $fechaContratacion);

	header("Location: ../admin_gestionarConductores.php");
	exit();

?>
