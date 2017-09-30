<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<title>Crear viaje</title>
	<link rel="shortcut icon" href="img/logo.ico" />
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="js/validarFormularioAdmin.js" type="text/javascript"></script>
	<!-- para funcion calendario -->
	<script type='text/javascript' src='js/calendario/datepicker.js'></script>
	<link href='cssComponentes/datepicker.css' rel='stylesheet' type='text/css'>
	<script src="js/validarFormularioAdmin.js" type="text/javascript"></script>
	<!-- para funcion hora -->
	<link href="cssComponentes/timedropper.css" rel="stylesheet" type="text/css">
	<script src="http://code.jquery.com/jquery-1.12.1.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	<script src="js/hora/timedropper.js"></script>
	<script type='text/javascript' src='js/hora/hora.js'></script>
	
</head>


<body>

	<?php
		session_start();
		require_once 'logica/usuario.php';
		require_once 'logica/funciones.php';
			sesionActivada("esAdmin");
		include('mostrar_cabecera.php');	
		include('admin_mostrar_toolbar.php');

		if (isset($_REQUEST['mensajeError'])) { // si existe algun mensaje
	?>
				<div class="titulo_texto">
					<p> <?php echo $_REQUEST['mensajeError'];?> </p>
				</div>
	<?php
			}
	?>

	<div class="contenedor_formulario">
	
		<form class="form_register" id="formularioReg" action="admin_anadirViaje_conductores.php" method="post" onsubmit="return validarFormViaje(this);" enctype="multipart/form-data">
			
			<h2 class="form_titulo">Nuevo viaje</h2>
			
			<div class="contenedor-inputs">
				<cite id="error"></cite>
		   		<select name='origen' class="input_100x20">
					<option value='' SELECTED>Seleccionar Origen</option>
					<option value='Madrid'>Madrid</option>J
					<option value='Barcelona'>Barcelona</option>
					<option value='Pontevedra'>Pontevedra</option>
					<option value='Cantabria'>Cantabria</option>
					<option value='Vizcaya'>Vizcaya</option>
					<option value='La rioja'>La rioja</option>
					<option value='Leon'>Leon</option>
					<option value='Palencia'>Palencia</option>
					<option value='Burgos'>Burgos</option>
					<option value='Zaragoza'>Zaragoza</option>
					<option value='Lleida'>Lleida</option>
					<option value='Sevilla'>Sevilla</option>
					<option value='A coruña'>A coru&ntilde;a</option>
					<option value='Lugo'>Lugo</option>
					<option value='Ourense'>Ourense</option>
					<option value='Asturias'>Asturias</option>
					<option value='Guipuzcoa'>Guipuzcoa</option>
					<option value='Alava'>Alava</option>
					<option value='Navarra'>Navarra</option>
					<option value='Valladolid'>Valladolid</option>
					<option value='Zamora'>Zamora</option>
					<option value='Soria'>Soria</option>
					<option value='Segovia'>Segovia</option>
					<option value='Salamanca'>Salamanca</option>
					<option value='Avila'>Avila</option>
					<option value='Huesca'>Huesca</option>
					<option value='Teruel'>Teruel</option>
					<option value='Tarragona'>Tarragona</option>
					<option value='Girona'>Girona</option>
					<option value='Castellon'>Castellon</option>
					<option value='Valencia'>Valencia</option>
					<option value='Alicante'>Alicante</option>
					<option value='Murcia'>Murcia</option>
					<option value='Guadalajara'>Guadalajara</option>
					<option value='Cuenca'>Cuenca</option>
					<option value='Toledo'>Toledo</option>
					<option value='Ciudad real'>Ciudad real</option>
					<option value='Albacete'>Albacete</option>
					<option value='Caceres'>Caceres</option>
					<option value='Cordoba'>Cordoba</option>
					<option value='Jaen'>Jaen</option>
					<option value='Huelva'>Huelva</option>
					<option value='Granada'>Granada</option>
					<option value='Almeria'>Almeria</option>
					<option value='Malaga'>Malaga</option>
					<option value='Cadiz'>Cadiz</option>
					<option value='Badajoz'>Badajoz</option>
				</select>


		   		<select name='destino' class="input_100x20">
					<option value='' SELECTED>Seleccionar Destino</option>
					<option value='Madrid'>Madrid</option>J
					<option value='Barcelona'>Barcelona</option>
					<option value='Pontevedra'>Pontevedra</option>
					<option value='Cantabria'>Cantabria</option>
					<option value='Vizcaya'>Vizcaya</option>
					<option value='La rioja'>La rioja</option>
					<option value='Leon'>Leon</option>
					<option value='Palencia'>Palencia</option>
					<option value='Burgos'>Burgos</option>
					<option value='Zaragoza'>Zaragoza</option>
					<option value='Lleida'>Lleida</option>
					<option value='Sevilla'>Sevilla</option>
					<option value='A coruña'>A coru&ntilde;a</option>
					<option value='Lugo'>Lugo</option>
					<option value='Ourense'>Ourense</option>
					<option value='Asturias'>Asturias</option>
					<option value='Guipuzcoa'>Guipuzcoa</option>
					<option value='Alava'>Alava</option>
					<option value='Navarra'>Navarra</option>
					<option value='Valladolid'>Valladolid</option>
					<option value='Zamora'>Zamora</option>
					<option value='Soria'>Soria</option>
					<option value='Segovia'>Segovia</option>
					<option value='Salamanca'>Salamanca</option>
					<option value='Avila'>Avila</option>
					<option value='Huesca'>Huesca</option>
					<option value='Teruel'>Teruel</option>
					<option value='Tarragona'>Tarragona</option>
					<option value='Girona'>Girona</option>
					<option value='Castellon'>Castellon</option>
					<option value='Valencia'>Valencia</option>
					<option value='Alicante'>Alicante</option>
					<option value='Murcia'>Murcia</option>
					<option value='Guadalajara'>Guadalajara</option>
					<option value='Cuenca'>Cuenca</option>
					<option value='Toledo'>Toledo</option>
					<option value='Ciudad real'>Ciudad real</option>
					<option value='Albacete'>Albacete</option>
					<option value='Caceres'>Caceres</option>
					<option value='Cordoba'>Cordoba</option>
					<option value='Jaen'>Jaen</option>
					<option value='Huelva'>Huelva</option>
					<option value='Granada'>Granada</option>
					<option value='Almeria'>Almeria</option>
					<option value='Malaga'>Malaga</option>
					<option value='Cadiz'>Cadiz</option>
					<option value='Badajoz'>Badajoz</option>
				</select>

				<input type='text' name='fechaSalida' class='w8em format-y-m-d' id='finalDate' placeholder='Fecha de salida (yyyy-mm-dd)'></input>
				<input type='text' name='fechaFinalizacion' class='w8em format-y-m-d' id='finalDate2' placeholder='Fecha de finalización (yyyy-mm-dd)'></input>
				
				<input name="horaSalida" id="hora" placeholder="Hora de salida" class="input_100x20" autocomplete="off">
				
				<script type="text/javascript">
					//LLamada a la función externa del reloj
					hora();
				</script>
				

				<select name="frecuencia" class="input_100x20">
					<option value='' SELECTED>Seleccionar frecuencia</option>
		       		<option value="SoloUno">Solo uno</option>
		       		<option value="diario">Diario</option>
		        	<option value="semanal">Semanal</option>
		        	<!--<option value="laborable">laborable</option>-->
		        	<!--<option value="Fin de semana">Fin de semana</option>-->
				</select>

				<input name="numBus" placeholder="Nº de autobuses" class="input_100x20" autocomplete="off">
				
				<input type="submit" name="cmdNuevo" value="Añadir Viaje" class="input_100x20" onclick="enviarFormulario('formularioReg');">

			</div>

		</form>
	</div>


</body>
</html>

