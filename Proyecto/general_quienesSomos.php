<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>¿Quienes somos?</title>
	<link rel="shortcut icon" href="img/logo.ico" />
	<link rel="stylesheet" type="text/css" href="style.css">

	

</head>



<body>

	<?php
		session_start();
		include('mostrar_cabecera.php');
		include('mostrar_toolbar.php');
	?>


	<div class="contenedor_general">

		<div class="cabecera">

			<h1>Sobre travelMaster</h1>
		
		</div>

			

		<div class="menu_izq">
			<ul>
				<li><a href="general_nuestraActividad.php">Nuestra Actividad</a></li>
				<li><a href="general_personas.php">Personas</a></li>
				<li><a href="general_contacto.php">Contacto</a></li>
			</ul>

		</div>
		

		<div class="contenedor_editable_general">


			<div class="contenedor_imagen">
					
					<div class="imagen_ancho">
						
						<img src="img/quienes_somos.jpg" alt="quienes_somos">

					</div>
			</div>


			<div class="texto_contenedor_general">
				<p>TravelMaster es el operador líder en el sector español de transporte de viajeros por carretera.</p>

			
				<p>La concepción del transporte desde una visión integral y la satisfacción permanente del cliente son las premisas sobre las que TravelMaster desarrolla su actividad.</p>

				<p>Como operador integral, es capaz de atender las diferentes necesidades de movilidad de los ciudadanos mediante un amplio abanico de servicios de transporte de ámbito regional, nacional, urbano, discrecional (alquiler de autocares) y turístico.</p>

				<p>Asimismo, TravelMaster está especializado en la gestión de estaciones de autobuses, áreas de servicio y áreas de mantenimiento de vehículos.</p>

				<p>En la actualidad, TravelMaster cuenta con una moderna flota integrada por 2.850 autobuses, que transportan a más de 300 millones de viajeros al año, quienes son atendidos por un competente equipo formado por más de 8.000 profesionales.</p>

				<p>Bajo el principio de la seguridad, el cliente es el centro del esfuerzo empresarial de TravelMaster, que desarrolla su actividad con criterios de profesionalidad, calidad e innovación sobre la base del compromiso con la sociedad y el respeto al medio ambiente.</p>

			</div>

			<div class="informacion_contenedor_InfoFotos">

				<div class="mensajeFoto_contenedor_peque">
					
					<img src="img/quien_somos1.png" alt="quienes_somos1">

				</div>

				<div class="mensajeFoto_contenedor_peque">
					
					<img src="img/quien_somos2.png" alt="quien_somos2">

				</div>

				<div class="mensajeFoto_contenedor_peque">
					
					<img src="img/quien_somos3.png" alt="quien_somos3">

				</div>

				<div class="mensajeFoto_contenedor_peque">
							
					<img src="img/quien_somos4.png" alt="quien_somos4">

				</div>
				
			</div>

		</div>

			
	</div>

	<?php
		include('mostrar_pie.php');
	?>
	
	
</body>
</html>