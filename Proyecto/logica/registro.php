<?php

	require_once 'usuario.php';	

	$nombre = $_POST["nombre"];
	$apellido1 = $_POST["apellido1"];
	$apellido2 = $_POST["apellido2"];
	$apellido1 = $apellido1 . " " . $apellido2;
	$direccion1 = $_POST["direccion"];
	$numero = $_POST["numero"];
	$direccion1 = $direccion1 . " " . $numero;
	$codPostal = $_POST["codigo_postal"];
	$dni = $_POST["dni"];
	$tlf = $_POST["contacto"];
	$email = $_POST["email"];
	$nick = $_POST["nick"];
	$pw = $_POST['password'];
	$fecha = date("Y-m-d");

	$pass_cifrado = password_hash($pw, PASSWORD_DEFAULT);
  
	if(Usuario::verificarUsuario($nick, $dni)){
	 	if(Usuario::insertar($dni, $nombre, $apellido1, $direccion1, $codPostal, $tlf, $email, $pass_cifrado, 0, 0, $fecha, 
	 		$nick)){

			session_start();
			
			$_SESSION["login"] = true;
			$_SESSION["nombre"] = $nick;

			header("Location: ../index.php");
			exit;
	 	}
	 }

	else {
		
		header("Location: ../mostrar_fallo_registrar.php");
		exit;
	}

?>