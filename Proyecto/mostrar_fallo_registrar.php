<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Registro</title>
	<link rel="shortcut icon" href="img/logo.ico" />
	<link rel="stylesheet" type="text/css" href="style.css">
	
	<script type="text/javascript">
		// haces referencia al elemento (en este caso div) e indicas el tiempo de espera en segundos
		var strCmd = "document.getElementById('textomuestra').style.display = 'none'";
		var waitseconds = 5;

		// Calculas el tiempo en milisegundos y ejecutas la acción
		var timeOutPeriod = waitseconds * 1000;
		var hideTimer = setTimeout(strCmd, timeOutPeriod);

		setTimeout("document.getElementById('anuncio').style.display='table'",timeOutPeriod);
	</script>
</head>

<body>

	<?php
		include("mostrar_cabecera.php");
		include('mostrar_toolbar.php');
	?>


	<div class="contenedor_formulario">
		<form name="formulario" id="formularioReg" class="form_register" action=enctype="multipart/form-data">
			<h2 class="form_titulo">REGISTRO</h2>
			<div class="contenedor-inputs">
				
				<div class="textomuestra" id="textomuestra">
					<p>Registrando usuario, espere por favor..</p>
					<div class="fotoCarga" id="fotoCarga"><img id="fotoCargaBus" src="img/bus.gif"/></div>
					<div class="fotoCarga" id="fotoCarga"><img id="fotoCargaBarra" src="img/barra.gif"/></div>
				</div>
				
				<div class="anuncio" id="anuncio">
					<h3>Este usuario o DNI ya existe.</h3>
					<button type="button" onclick="window.location.href='mostrarRegistro.php'" class="boton_provisional">Volver</button>
				</div>
			</div>
		</form>
	</div>


</body>
</html>