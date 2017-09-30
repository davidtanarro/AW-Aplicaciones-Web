<?php

	
	$idViaje = $_POST["localizador"];
	$dni = $_POST["dni"];
	$calificacion = $_POST["calificacion"];



	require_once('valoracion.php');
	Valoracion::insertarCalificacionConductor($calificacion , $idViaje, $dni);


	header("Location:../consultarBillete.php");
	exit();

?>