<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Contacto</title>
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

			<h1>Contacto</h1>
		
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
						
						<img src="img/contacto.jpg" alt="contacto">

					</div>
			</div>


			<div class="texto_contenedor_general">
				<h3>¿Quiere contactactar con nosotros?. Es muy facil escriba al correo, llame al telefono o vaya a nuestra oficina que aperece en pantalla.</h3>

				<ul>
					<li> Correo: Travelmasterinfo@gmail.com.</li>
					<li> Telefono: 902 70 71 72</li>
					<li> En caso de una ayuda más personal dirijase a una de nuestras oficinas</li>
				</ul>
			
			</div>

			<div class="mapa_google">

			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3036.01683859877!2d-3.7357010846029737!3d40.45276427936094!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd4229d2a9f08b1f%3A0xcf68cce94ec84cb8!2sUCM+%3A+Facultad+de+Inform%C3%A1tica!5e0!3m2!1ses!2ses!4v1490293453587"></iframe>
			
				
			</div>
		</div>
	
	</div>

	<?php
		include('mostrar_pie.php');
	?>


</body>
</html>