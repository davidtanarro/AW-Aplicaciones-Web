<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Registro</title>
	<link rel="shortcut icon" href="img/logo.ico" />
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="js/validarFormularioRegistro.js" type="text/javascript"></script>
	
</head>



<body>

	<?php
			
		include("mostrar_cabecera.php");
		include('mostrar_toolbar.php');

		if ( isset($_REQUEST['mensajeError']) ) { // si existe algun de error
	?>
			<div class="titulo_texto">
				<p> <?php echo $_REQUEST['mensajeError'];?> </p>
			</div>
	<?php
		}
	?>



	<div class="contenedor_formulario">
		<form name="formulario" id="formularioReg" class="form_register" action="logica/registro.php" method="post" onsubmit="return validarForm(this);" enctype="multipart/form-data">
				<h2 class="form_titulo">REGISTRO</h2>
				<div class="contenedor-inputs">

					<cite id="error"></cite>
					<input name="nombre"  placeholder="Nombre *" class="input_100x20">
					<input name="apellido1" placeholder="Primer apellido *" class="input_100x20">
					<input name="apellido2" placeholder="Segundo apellido *" class="input_100x20">

					<input name="direccion" placeholder="Calle *" class="input_100x20">
					<input name="numero" placeholder="Numero *" class="input_48x20">
					<input name="codigo_postal" placeholder="Codigo postal *" class="input_48x20">
					<input name="dni" placeholder="Dni *" class="input_100x20">
					<input name="contacto" placeholder="Nº telefono/movil *" class="input_100x20">
					
					<input name="email" placeholder="Correo *" class="input_100x20">
					<input name="nick" placeholder="Usuario *" class="input_48x20">
					<input type="password" name="password" placeholder="Contraseña *" class="input_48x20">

					<input type="submit" name="cmdNuevo" value="Registrese" class="input_100x20" onclick="enviarFormulario('formularioReg');"/>

				</div>

		
		</form>

		<form name="formularioLogin" id="formularioReg2" class="form_register" action="logica/login.php" method="post" onsubmit="return validarFormUsuario(this);" enctype="multipart/form-data">
				<h2 class="form_titulo">INICIE SESIÓN</h2>
				<div class="contenedor-inputs">
					<cite id="errorLogin"></cite>
					<input type="text" name="usuario" placeholder="Usuario" class="input_100x20">
					
					<input type="password" name="clave" placeholder="Contraseña" class="input_100x20">
					<!--<input type="submit" value="Iniciar sesión" class="btn_standar"-->
					
					<input type="submit" name="cmdNuevo" value="Iniciar sesión" class="input_100x20" onclick="enviarFormulario('formularioReg2');"/>
				</div>
		</form>
	</div>

	<?php
		include('mostrar_pie.php');
	?>

</body>
</html>