<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Personas</title>
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

			<h1>Personas</h1>
		
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
						
						<img src="img/personas.jpg" alt="personas">

					</div>
			</div>


			<div class="informacion_contenedor_InfoFotos">

				<div class="mensajeFoto_contenedor_peque">
					
					<img src="img/per1.png" alt="per1">

				</div>

				<div class="mensajeFoto_contenedor_peque">
					
					<img src="img/per2.png" alt="per2">

				</div>

				<div class="mensajeFoto_contenedor_peque">
					
					<img src="img/per3.png" alt="per3">

				</div>

				<div class="mensajeFoto_contenedor_peque">
							
					<img src="img/per4.png" alt="per4">

				</div>
				
			</div>

		</div>

			
	</div>

	<?php
		include('mostrar_pie.php');
	?>
	

</body>
</html>