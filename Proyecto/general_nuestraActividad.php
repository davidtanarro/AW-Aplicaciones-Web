<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Nuestra Actividad</title>
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

			<h1>Nuestra Actividad</h1>
		
		</div>

		<div class="menu_izq">
			<ul>
				<li><a href="general_nuestraActividad.php">Nuestra Actividad</a></li>
				<li><a href="general_personas.php">Personas</a></li>
				<li><a href="general_contacto.php">Contacto</a></li>
			</ul>

		</div>
		

		<div class="contenedor_editable_general">

			<p class="titulo_texto">Transporte nacional</p>

			<div class="texto_contenedor_general">
				<p>TravelMaster gestiona la más completa red de servicios regulares en autobús de ámbito nacional, que comunica entre sí la práctica totalidad de las comunidades autónomas peninsulares. Opera en una amplia gama de horarios y ofrece servicios de calidad diferenciada, como son las clases Estándar y Premium.</p>

			
				<p>Características que definen la forma que tiene TravelMaster de entender el transporte nacional e internacional:</p>

				<ul>
					
					<li>Una moderna flota de autocares en permanente proceso de renovación.</li>
					<li>La incorporación inmediata de las nuevas tecnologías al servicio del viajero.</li>
					<li>La prestación de servicios de alta calidad.</li>
				</ul>

				<a href="doc/MAPAnacional.pdf" target="_blank">Mapa de servicios nacionales</a>

			</div>

			<p class="titulo_texto">Transporte Regional y autonómico</p>

			<div class="texto_contenedor_general">




			<p>El compromiso de TravelMaster con las necesidades de movilidad de sus clientes se extiende a la gestión de servicios de transporte en autobús de ámbito regional y autonómico, que es el origen de su actividad.</p>

		
			<p>La red de servicios regionales de TravelMaster engloba numerosas concesiones de servicios interurbanos que se extienden por las comunidades autónomas de Asturias, Cantabria, País Vasco, Castilla y León, La Rioja, Madrid, Castilla-La Mancha, Cataluña, Aragón, Navarra, Comunidad Valenciana, Murcia y Andalucía.</p>

			<p>Muchos de estos servicios se realizan en zonas rurales de baja densidad de población y de difícil acceso, prestando un servicio público que garantiza la movilidad y el acceso a un transporte de calidad a todos los ciudadanos, independientemente de su lugar de residencia.</p>


			<p><a href="doc/MAPAAndalucía.pdf" target="_blank">Mapa de regionales Andalucía</a></p>
			<p><a href="doc/MAPAAsturias.pdf" target="_blank">Mapa de regionales Asturias</a></p>
			<p><a href="doc/MAPACantabria.pdf" target="_blank">Mapa de regionales Cantabria</a></p>
			<p><a href="doc/MAPACastillayLeón.pdf" target="_blank">Mapa de regionales Castilla y León</a></p>
			<p><a href="doc/MAPALevante.pdf" target="_blank">Mapa de regionales Levante</a></p>
			<p><a href="doc/MAPAPaísVasco.pdf" target="_blank">Mapa de regionales País Vasco</a></p>
			

			</div>

		</div>
	</div>

	<?php
		include('mostrar_pie.php');
	?>
	

</body>
</html>