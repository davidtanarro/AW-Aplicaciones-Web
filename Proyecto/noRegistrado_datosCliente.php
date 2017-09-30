<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Datos clientes</title>
	<link rel="shortcut icon" href="img/logo.ico" />
	<link rel="stylesheet" type="text/css" href="style.css">

	<script src="js/validarFormularioCliente.js" type="text/javascript"></script>
	
</head>


<body>

	<?php
		session_start();
		include('mostrar_cabecera.php');
		include('mostrar_toolbar.php');

	?>

	<div class="contenedor_formulario">

		<form name="formulario" id="formularioReg4" class="form_register" action="logica/insertar_billete.php" method="post" onsubmit="return validarFormDatos(this);" enctype="multipart/form-data">
			<h2 class="form_titulo">Datos del cliente</h2>
			<cite id="error"></cite>
			<div class="contenedor-inputs">
				<cite id="error"></cite>
		   		<input name="nombre" id="nombre"	placeholder="Nombre" 		 class="input_100x20">
		    	<input name="apellido1" placeholder="Primer apellido" class="input_100x20">
		    	<input name="apellido2" placeholder="Segundo apellido" class="input_100x20">

		    	<input name="direccion1" 	placeholder="Calle" 	class="input_100x20">
		    	<input name="numero" 		placeholder="Numero" 	class="input_48x20">
		    	<input name="codigo_postal" placeholder="Codigo postal" class="input_48x20">

		    	<input name="dni"		placeholder="Dni" 				class="input_100x20">
		    	<input name="contacto" 	placeholder="Nº telefono/movil" class="input_100x20">
		    	
		    	<?php
					$idViaje = $_REQUEST['parametro1'];
					$asientoSelecionado = $_REQUEST['parametro2'];
					$suplementos = $_REQUEST['parametro3'];
					$trayectoria = $_REQUEST['parametro5'];

					require_once 'logica/viaje.php';
					require_once 'logica/billete.php';

					// Verificación de control de parametros: el idViaje existe y que asientoSelecionado se encuentra disponible
					if (!Viaje::existeViaje($idViaje) || !asientoDisponible($idViaje, $asientoSelecionado) ) {
						$mensaje = "Lo sentimos, el viaje o el asiento no se encuentra disponible";
						header("Location: comprarBillete.php?mensajeError=".$mensaje);
						exit;
					}
				?>

				<input type="hidden" value= "<?php echo $idViaje			;?>" name="parametro1">
				<input type="hidden" value= "<?php echo $asientoSelecionado	;?>" name="parametro2">
				<input type="hidden" value= "<?php echo $suplementos		;?>" name="parametro3">
				<input type="hidden" value= "<?php echo $trayectoria		;?>" name="parametro5">

            	<input type="submit" value="Siguiente" name="siguiente" class="input_100x20" onclick="enviarFormulario('formularioReg4');" />
			</div>

		</form>

		<form class="form_register" action="#" method="post">
			<h2 class="form_titulo">Datos de la tarjeta</h2>
			<div class="contenedor-inputs">
		   		<input name="numero"  	placeholder="Nº Tarjeta" 					class="input_100x20">
		    	<input name="caducidad" placeholder="Fecha de caducidad: mm/aaaa" 	class="input_100x20">
		    	<input name="validacion" placeholder="verificación/validación: xxx" class="input_100x20">
			</div>
		</form>
		
	</div>


	<?php
		include('mostrar_pie.php');
	?>

</body>
</html>

