<?php
	require_once 'billete.php';
	require_once 'viaje.php';

	// Si se cumple, cancelamos el billete de un usuario no registrado que ha introducido mal sus datos
	if ( isset($_REQUEST['parametro4']) ) { 

		$idViaje = $_REQUEST['parametro1'];
		$asientoSelecionado = $_REQUEST['parametro2'];
		$suplementos = $_REQUEST['parametro3'];
		$dni = $_REQUEST['parametro4'];
		$trayectoria = $_REQUEST['parametro5'];

		$b = new Billete($idViaje, $dni);
		$b->borrarBillete();

		header("Location:../noRegistrado_datosCliente.php?parametro1=".$idViaje."&parametro2=".$asientoSelecionado."&parametro3=".$suplementos."&parametro5=".$trayectoria);
		exit();
	}
	// Cancelamos el billete de ida de un usuario que no ha podido sacar un billete de vuelta, parametro procedente de noRegistrado_biletesDisponibles
	else if ( isset($_REQUEST['parametro6']) ) { 
		$idViaje = $_POST["parametro1"];
		$dni = $_POST["parametro2"];

		$b = new Billete($idViaje, $dni);
		$b->borrarBillete();

		header("Location:../comprarBillete.php");
		exit();
	}
	// Cancelamos el billete de un usuario registrado
	else { 
		$idViaje = $_POST["localizador"];
		$dni = $_POST["dni"];

		$v = new Viaje($idViaje);
		if (!($v->cancelacionCaducada($dni))  ) {

			$b = new Billete($idViaje, $dni);
			$b->borrarBillete();
			
			header("Location:../consultarBillete.php");
			exit();
		}
		else {
			$mensaje = "Su fecha de cancelacion ha caducado";

			header("Location:../consultarBillete.php?mensaje=".$mensaje);
			exit();
		}
	}

?>
