
<?php


	require_once 'usuario.php';
	require_once 'funciones.php';

	$user=$_POST['usuario'];
	$pw=$_POST['clave'];
	

	//Necesito saber el dni del usuario para luego si ver si es vip.
	$dni = Usuario::extraerDniUsuario($user);
	

	//si hay más de una fila inicia sesion porque hay un usuario con esa contraseña
	if(Usuario::loguearUsuario($user,$pw) > 0){

		session_start();

		$_SESSION["login"] = true;
		
		if($user == "admin") {
			$_SESSION['esAdmin'] = true;
			$_SESSION["nombre"] = "administrador";
			header("Location: ../admin_index.php");
		}
		else {
			$_SESSION["nombre"] = $user;
			
			$us = new Usuario($dni);
			if ($us->esVip() ) {
				$_SESSION["vip"] = true;
			}
			else {
				$_SESSION["vip"] = false;
			}

			header("Location: ../index.php");
		}
		exit();

	}

	else {
		$mensaje = "Usuario no registrado, por favor intentelo de nuevo";
		header("Location: ../mostrarRegistro.php?mensajeError=".$mensaje);
		exit;
	}
?>

