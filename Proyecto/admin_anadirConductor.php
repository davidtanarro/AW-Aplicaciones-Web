<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<title>Añadir conductor</title>
	<link rel="shortcut icon" href="img/logo.ico" />
	<link rel="stylesheet" type="text/css" href="style.css">
	<!-- para funcion calendario -->
	<script type='text/javascript' src='js/calendario/datepicker.js'></script>
	<link href='cssComponentes/datepicker.css' rel='stylesheet' type='text/css'>
	<script src="js/validarFormularioAdmin.js" type="text/javascript"></script>
	
</head>


<body>

	<?php
		session_start();
		require_once 'logica/funciones.php';
			sesionActivada("esAdmin");
		include('mostrar_cabecera.php');
		include('admin_mostrar_toolbar.php');

	?>


	<div class="contenedor_formulario">
	
		<form class="form_register" id="formularioReg" action="logica/admin_insertar_conductor.php" method="post" onsubmit="return validarFormConductor(this);" enctype="multipart/form-data">
			<h2 class="form_titulo">Nuevo conductor</h2>
			
			<div class="contenedor-inputs">
				<cite id="error"></cite>
				<input name="nombre" placeholder="Nombre" class="input_100x20" type="text" >
				<input name="apellido1" placeholder="Primer apellido" class="input_100x20">
				<input name="apellido2" placeholder="Segundo apellido" class="input_100x20">
				<input name='fechaContratacion' placeholder='Fecha de contratación' class='w8em format-y-m-d' type='text' id='finalDate' ></input>
				
				<input type="submit" name="cmdNuevo" value="Añadir Conductor" class="input_100x20" onclick="enviarFormulario('formularioReg');">

			</div>

		</form>
		
	</div>


</body>
</html>

