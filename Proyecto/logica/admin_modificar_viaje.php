
<?php

	$idViaje=$_POST['parametro'];
	$fechaSalida=$_POST['fechaSalida'];
	$horaSalida=$_POST['horaSalida'];
	$numBus=$_POST['numBus'];
	$idConductor=$_POST['conductor'];

	require_once 'viaje.php';

	Viaje::modificarViaje($idViaje, $fechaSalida, $horaSalida, $numBus, $idConductor);
	header("Location:../admin_gestionarViajes.php");
	exit();
	
	
?>
