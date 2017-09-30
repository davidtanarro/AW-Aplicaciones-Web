
<?php
	require_once 'viaje.php';

	$origen=$_POST['origen'];
	$destino=$_POST['destino'];
	$fechaSalida=$_POST['fechaSalida'];
	$horaSalida=$_POST['horaSalida'];
	$numBus=$_POST['numBus'];
	$fechaFinalizacion=$_POST['fechaFinalizacion'];
	$frecuencia=$_POST['frecuencia'];

	if($frecuencia=="diario")
		$f=1;
	else if ($frecuencia=="semanal") 
		$f=7;
	else if ($frecuencia=="SoloUno"){
		$fechaFinalizacion = $fechaSalida;
		$f=0;
	}

	/* FOR para VALIDAR de conductores */
	for ($i = 1; $i <= $numBus; $i++) {
		$conductore = $_POST['conductor'.$i];
		if ( $conductore == '' ) {
			$mensajeError = "No has rellenado todos los conductores";
			header("Location:../admin_anadirViaje.php?mensajeError=".$mensajeError);
			exit();
		}
		else {
			$indice = $i+1;
			for ($j = $indice; $j <= $numBus; $j++) {
				$aux_conductore = $_POST['conductor'.$j];
				if ( $conductore === $aux_conductore ) {
					$mensajeError = "Has seleccionado al menos el mismo conductor para dos viajes";
					header("Location:../admin_anadirViaje.php?mensajeError=".$mensajeError);
					exit();
				}
			}
		}
	}
	

	if ($f == 0) {
		for ($i = 1; $i <= $numBus; $i++) {
			$conductore= $_POST['conductor'.$i];

			Viaje::insertar($origen, $destino, $fechaSalida, $horaSalida, $numBus, $conductore, $fechaFinalizacion, $frecuencia);
		}
	}
	else {
		while($fechaSalida <= $fechaFinalizacion) {
			for ($i = 1; $i <= $numBus; $i++) {
				  $conductore= $_POST['conductor'.$i];

				  Viaje::insertar($origen, $destino, $fechaSalida, $horaSalida, $numBus, $conductore, $fechaFinalizacion, $frecuencia);
			}

			$fechaSalida= date("Y-m-d", strtotime("$fechaSalida + ". $f ." days")); //se suman los $x dias
			
		}
	}      

	header("Location:../admin_gestionarViajes.php");
	
?>
