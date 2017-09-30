
<?php


	$idViaje = $_POST["parametro1"];
	$asientoSelecionado = $_POST["parametro2"];
	$suplementos = $_POST["parametro3"];
	$trayectoria = $_POST["parametro5"];

	/* Si tenemos el parametro 4, insertamos un billete de un usuario registrado */
	if ( isset($_POST['parametro4']) ){
		
		$dni = $_POST['parametro4'];

		require_once 'billete.php';
		Billete::insertarBillete($idViaje, $asientoSelecionado, $dni, $suplementos);

		header("Location:../general_impresion.php?idViaje=".$idViaje."&asientoSelecionado=".$asientoSelecionado."&parametro5=".$trayectoria);
		exit();
	}
	else { /* Si NO tenemos el parametro 4, insertamos un billete de un usuario NO registrado */

		$nombre = $_POST["nombre"];
		$apellido1 = $_POST["apellido1"];
		$apellido2 = $_POST["apellido2"];
		$apellido1 = $apellido1 . " " . $apellido2;
		$direccion1 = $_POST["direccion1"];
		$numero = $_POST["numero"];
		$direccion1 = $direccion1 . " " . $numero;
		$codPostal = $_POST["codigo_postal"];
		$dni = $_POST["dni"];
		$tlf = $_POST["contacto"];


		require_once 'usuario.php';
		
		if(! (Usuario::verificarDniUsuario($dni)) ) {
			Usuario::insertarUsuarioNoRegistrado($dni, $nombre, $apellido1, $direccion1, $codPostal, $tlf);
		}
		else {
			Usuario::modificarUsuarioNoRegistrado($dni, $nombre, $apellido1, $direccion1, $codPostal, $tlf);
		}


		require_once 'billete.php';
		if ( Billete::tieneBillete($idViaje, $dni) ) {
			$mensaje = "Lo sentimos, no puedes viajar en más de un asiento, su localizador es el ".$idViaje;
			header("Location: ../comprarBillete.php?mensajeError=".$mensaje);
			exit;
		}
		else {
			Billete::insertarBillete($idViaje, $asientoSelecionado, $dni, $suplementos);

			header("Location:../noRegistrado_comprobarDatos.php?idViaje=".$idViaje."&asientoSelecionado=".$asientoSelecionado."&trayectoria=".$trayectoria);
			exit();
		}
	}

?>
