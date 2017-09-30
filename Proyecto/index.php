<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<title>MasterTravel</title>
	<link rel="shortcut icon" href="img/logo.ico" />
	<link rel="stylesheet" type="text/css" href="style.css">


		<!-- para funcion calendario -->
		<script type='text/javascript' src='js/calendario/datepicker.js'></script>
		<link href='cssComponentes/datepicker.css' rel='stylesheet' type='text/css'>
		<script src="js/validarFormularioComprarBillete.js" type="text/javascript"></script>

	<script>
		function carousel() {
			    var i;
			    var x = document.getElementsByClassName("mySlides");
			    for (i = 0; i < x.length; i++) {
			      x[i].style.display = "none"; 
			    }
			    slideIndex++;
			    if (slideIndex > x.length) {slideIndex = 1} 
			    x[slideIndex-1].style.display = "block"; 
			    setTimeout(carousel, 10000); // Change image every 2 seconds
			}
		</script>

</head>

<body>

	<?php
		session_start();
		
		include('mostrar_cabecera.php');
		include('mostrar_toolbar.php');
	?>

	<form class="form_register_slider" id="formularioReg" action="billetesDisponibles.php" method="post" onsubmit="return validarForm(this);" enctype="multipart/form-data">
			
			
		<cite id="error"></cite>
		<div class="contenedor-inputs">			
		   		<select name='origen'  class="input_100x20" id="origen">
					<option value='' SELECTED>Seleccionar origen</option>
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
				
				<!--<a href="#" onclick="ocultar_mostrar('map'); return false;"><IMG class="imagenMAP" src="img/mapa.png" ></a>-->
				<div id="map" class="MAPADIV" ></div>
				<script type="text/javascript">
					mapaOrigen();
				</script>

		   		<select name='destino' class="input_100x20" id="destino">
					<option value='' SELECTED>Seleccionar destino</option>
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
				
				<!-- <a href="#" onclick="ocultar_mostrar('map2'); return false;"><IMG class="imagenMAP" src="img/mapa.png" ></a> -->
						
				<div id="map2" class="MAPADIV" ></div>
				<script type="text/javascript">
					mapaDestino();
				</script>

				<select name="trayectoria" class="input_100x20">
					<option value="Ida" SELECTED>Ida</option>
		        	<option value="IdayVuelta">Ida y Vuelta</option>
				</select>

				<input type="hidden" name="idViajeIda" value="Ida"> </input>


				<input type='text' class='w8em format-y-m-d' id='finalDate' name='fecha' placeholder='Fecha'></input>

				<!--<select name="pasajeros" class="input_100x20">
					<option value="1" SELECTED>1</option>
		        	<option value="2">2</option>
				</select>-->

				<select name="suplementos" class="input_100x20">
					<option value="" SELECTED>Seleccione suplemento</option>
					<option value="Ninguno">Ninguno</option>
		       		<option value="Animales">Animales</option>
		        	<option value="Bicicletas">Bicicletas</option>
		        	<option value="Material Delicado">Material Delicado</option>
		        	<option value="Material Pesado">Material Pesado</option>
		        </select>


				<input type="submit" class="input_100x20" value="Busque el billete" onclick="enviarFormulario('formularioReg');" />
			</div>
	</form>




	<!-- Fotografias slider-->
	<div class="slider_contenedor">
		<div class="imagen_contenedor">
			
			<img class="mySlides" src="img/slider/playa.png"   alt="playa">
			<img class="mySlides" src="img/slider/neptuno.jpg" alt="neptuno">
			<img class="mySlides" src="img/slider/Family.jpg" alt="familia">
			<img class="mySlides" src="img/slider/skiing.jpg" alt="skiing">
			

			<script type="text/javascript">
				var slideIndex = 0;
				carousel();

			</script>
				
		</div>
	</div>
	<!-- /Fotografias slider-->


	<div class="informacion_contenedor_grande">	

		<div class="informacion_contenedor_grande_inside">
			
			<h2>¡Bienvenido a la mejor compañia de viajes nacionales!</h2>
			

			<p>Visita Madrid, Barcelona, Sevilla, Cádiz y el resto de ciudades de nuestra península con nosotros.</p>

			<p id="espacio">Será una experiencia maravillosa. Seguro que repetirá.</p>



		</div> 
	</div>



	<div class="informacion_contenedor_inicio1">	

		<div class="imagen_redondas_contenedor">
			

			<div class="bloque1">Asientos de primera Clase</div>

			<div class="bloque2">Elección de películas</div>

			<div class="bloque3">Cancelación billetes 24h antes</div>

		</div>

		<div class="bloque_center">
			

			<p>Descubre un mundo de ventajas con   <a href="general_ventajasMasterTravel.php"><strong>MasterTravel</strong></a></p>


		</div>


		<div class="bloque_right">
			<a href="mostrarRegistro.php">Registrese</a>

		</div>

	</div>

	<div class="informacion_contenedor_inicio2">	

		<div class="titulo_informacion_contenedor_inicio2">
			
			<p>¿Por qué viajar con MASTERTRAVEL?</p>

		</div>

		<div class="cuerpo">

			<div class="cuerpo_info_contenedor">

				<div class="contenedor_img_redonda">
					
					<a href="general_nuestraActividad.php" title="Rutas"><img src="img/rutas.png" alt="rutas"></a>

				</div>

				<p><a href="general_nuestraActividad.php" title="Rutas">Rutas</a></p>
				

			</div>
			

			<div class="cuerpo_info_contenedor">

				<div class="contenedor_img_redonda">
					
					<a href="general_entretenimiento.php"  title="Entretenimiento"><img src="img/entretenimiento.png" alt="entretenimiento"></a>

				</div>

				<p><a href="general_entretenimiento.php" title="Entretenimiento">Entretenimiento</a></p>
				

			</div>

			<div class="cuerpo_info_contenedor">

				<div class="contenedor_img_redonda">
					
					<a href="general_equipaje.php" title="equipaje"><img src="img/equipaje.png" alt="rutas"></a>

				</div>

				<p><a href="general_equipaje.php" title="equipaje">Equipaje</a></p>
				

			</div>


		</div>

	</div>


	<?php
		include('mostrar_pie.php');
	?>
	

</body>
</html>