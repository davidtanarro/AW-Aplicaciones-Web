<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Nuestro entretenimiento</title>
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

			<h1>Entretenimiento a bordo</h1>
		
		</div>
		

		<div class="contenedor_editable_general">

			<div class="contenedor_imagen">
					
					<div class="imagen_ancho">
						
						<img src="img/cine.jpg" alt="entretenimiento">

					</div>
			</div>


			<div class="informacion_contenedor_InfoFotos">
	
				<div class="mensajeFoto_contenedor_peque">
					
					<img src="img/Pantallasindividuales1.jpg" alt="pantalla">
					<p><a href="#">Pantallas individules</a></p>

				</div>

			
				<div class="mensajeFoto_contenedor_peque">
					
					<img src="img/en_tu_movil.jpg" alt="movil">
					<p><a href="#">En tu movil</a></p>

				</div>
				
			</div>

		</div>
	
	</div>

	<?php
		include('mostrar_pie.php');
	?>
	

</body>
</html>