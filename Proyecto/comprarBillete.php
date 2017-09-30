<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<title>Compra de billetes</title>
	<link rel="shortcut icon" href="img/logo.ico" />
	<link rel="stylesheet" type="text/css" href="style.css">
	

		<!-- para funcion calendario -->
		<script type='text/javascript' src='js/calendario/datepicker.js'></script>
		<link href='cssComponentes/datepicker.css' rel='stylesheet' type='text/css'>
		

		<!-- para funcion mapas -->
		<script type="text/javascript" src="js/mapas/raphael-min.js"></script>
		<script type="text/javascript" src="js/mapas/spain-map.js"></script>
		<script type="text/javascript" src="js/mapas/raphael-min2.js"></script>
		<script type="text/javascript" src="js/mapas/spain-map2.js"></script>
		<script type="text/javascript" src="js/mapas/mapa.js"></script>
		<script src="js/validarFormularioComprarBillete.js" type="text/javascript"></script>
			
			<script type="text/javascript">
				//Funcion para ocultar o mostrar el div que contiene los mapas
				function ocultar_mostrar(div);	
			</script>

			
</head>



<body>

	<?php
		session_start();
		include('mostrar_cabecera.php');
		include('mostrar_toolbar.php');

		// Si surge algun fallo en el flujo de la pagina por introducir parametros en la url, se redirige aqui y muestra el error
		if ( isset($_REQUEST['mensajeError']) ) {
	?>
			<div class="titulo_texto">
				<p> <?php echo $_REQUEST['mensajeError'];?> </p>
			</div>
	<?php
		}
	?>
	<div class="informacion_contenedor_gestion2">
		<div class="contenedor_formulario">
			<form name="formulario" id="formularioReg" class="form_register" action="billetesDisponibles.php" method="post" onsubmit="return validarForm(this);" enctype="multipart/form-data">
				<h2 class="form_titulo">Busque el billete</h2>
				<cite id="error"></cite>
				<div class="contenedor-inputs">			
			   		<select name='origen'  class="input_100x15" id="origen">
						<option value='' SELECTED>Seleccionar origen *</option>
						<option value='madrid'>Madrid</option>
						<option value='barcelona'>Barcelona</option>
						<option value='pontevedra'>Pontevedra</option>
						<option value='cantabria'>Cantabria</option>
						<option value='vizcaya'>Vizcaya</option>
						<option value='la rioja'>La rioja</option>
						<option value='leon'>León</option>
						<option value='palencia'>Palencia</option>
						<option value='burgos'>Burgos</option>
						<option value='zaragoza'>Zaragoza</option>
						<option value='lleida'>Lleida</option>
						<option value='sevilla'>Sevilla</option>
						<option value='a corunya'>A coru&ntilde;a</option>
						<option value='lugo'>Lugo</option>
						<option value='ourense'>Ourense</option>
						<option value='asturias'>Asturias</option>
						<option value='guipuzcoa'>Guipuzcoa</option>
						<option value='alava'>Álava</option>
						<option value='navarra'>Navarra</option>
						<option value='valladolid'>Valladolid</option>
						<option value='zamora'>Zamora</option>
						<option value='soria'>Soria</option>
						<option value='segovia'>Segovia</option>
						<option value='salamanca'>Salamanca</option>
						<option value='avila'>Ávila</option>
						<option value='huesca'>Huesca</option>
						<option value='teruel'>Teruel</option>
						<option value='tarragona'>Tarragona</option>
						<option value='girona'>Girona</option>
						<option value='castellon'>Castellón</option>
						<option value='valencia'>Valencia</option>
						<option value='alicante'>Alicante</option>
						<option value='murcia'>Murcia</option>
						<option value='guadalajara'>Guadalajara</option>
						<option value='cuenca'>Cuenca</option>
						<option value='toledo'>Toledo</option>
						<option value='ciudad real'>Ciudad real</option>
						<option value='albacete'>Albacete</option>
						<option value='caceres'>Cáceres</option>
						<option value='cordoba'>Córdoba</option>
						<option value='jaen'>Jaen</option>
						<option value='huelva'>Huelva</option>
						<option value='granada'>Granada</option>
						<option value='almeria'>Almería</option>
						<option value='malaga'>Málaga</option>
						<option value='cadiz'>Cádiz</option>
						<option value='badajoz'>Badajoz</option>
					</select>
					
					<a href="#" onclick="ocultar_mostrar('map'); return false;"><IMG class="imagenMAP" src="img/mapa.png" ></a>
					<div id="map" class="MAPADIV" ></div>
					<script type="text/javascript">
						mapaOrigen();
					</script>

			   		<select name='destino' class="input_100x15" id="destino">
						<option value='' SELECTED>Seleccionar destino *</option>
						<option value='madrid'>Madrid</option>
						<option value='barcelona'>Barcelona</option>
						<option value='pontevedra'>Pontevedra</option>
						<option value='cantabria'>Cantabria</option>
						<option value='vizcaya'>Vizcaya</option>
						<option value='la rioja'>La rioja</option>
						<option value='leon'>León</option>
						<option value='palencia'>Palencia</option>
						<option value='burgos'>Burgos</option>
						<option value='zaragoza'>Zaragoza</option>
						<option value='lleida'>Lleida</option>
						<option value='sevilla'>Sevilla</option>
						<option value='a corunya'>A coru&ntilde;a</option>
						<option value='lugo'>Lugo</option>
						<option value='ourense'>Ourense</option>
						<option value='asturias'>Asturias</option>
						<option value='guipuzcoa'>Guipuzcoa</option>
						<option value='alava'>Álava</option>
						<option value='navarra'>Navarra</option>
						<option value='valladolid'>Valladolid</option>
						<option value='zamora'>Zamora</option>
						<option value='soria'>Soria</option>
						<option value='segovia'>Segovia</option>
						<option value='salamanca'>Salamanca</option>
						<option value='avila'>Ávila</option>
						<option value='huesca'>Huesca</option>
						<option value='teruel'>Teruel</option>
						<option value='tarragona'>Tarragona</option>
						<option value='girona'>Girona</option>
						<option value='castellon'>Castellón</option>
						<option value='valencia'>Valencia</option>
						<option value='alicante'>Alicante</option>
						<option value='murcia'>Murcia</option>
						<option value='guadalajara'>Guadalajara</option>
						<option value='cuenca'>Cuenca</option>
						<option value='toledo'>Toledo</option>
						<option value='ciudad real'>Ciudad real</option>
						<option value='albacete'>Albacete</option>
						<option value='caceres'>Cáceres</option>
						<option value='cordoba'>Córdoba</option>
						<option value='jaen'>Jaen</option>
						<option value='huelva'>Huelva</option>
						<option value='granada'>Granada</option>
						<option value='almeria'>Almería</option>
						<option value='malaga'>Málaga</option>
						<option value='cadiz'>Cádiz</option>
						<option value='badajoz'>Badajoz</option>
					</select>
					
					<a href="#" onclick="ocultar_mostrar('map2'); return false;"><IMG class="imagenMAP" src="img/mapa.png" ></a>
							
					<div id="map2" class="MAPADIV" ></div>
					<script type="text/javascript">
						mapaDestino();
					</script>

					<select name="trayectoria" class="input_100x20">
						<option value="Ida" SELECTED>Ida</option>
			        	<option value="IdayVuelta">Ida y Vuelta</option>
					</select>

					<input type="hidden" name="idViajeIda" value="Ida"> </input>

					
					<input type='text' class='w8em format-y-m-d' id='finalDate' name='fecha' placeholder='Fecha*'></input>


					<select name="suplementos" class="input_100x20">
						<option value="" SELECTED>Seleccione suplemento *</option>
						<option value="Ninguno">Ninguno</option>
			       		<option value="Animales">Animales</option>
			        	<option value="Bicicletas">Bicicletas</option>
			        	<option value="Material Delicado">Material Delicado</option>
			        	<option value="Material Pesado">Material Pesado</option>
			        </select>


					<input type="submit" class="input_100x20" value="Busque el billete" onclick="enviarFormulario('formularioReg');" />
				</div>

			</form>
		</div>
	</div>

	<?php
		include('mostrar_pie.php');
	?>
	

</body>
</html>

