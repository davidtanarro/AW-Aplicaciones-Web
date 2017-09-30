<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Ventajas de registrarse</title>
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

			<h1>Ventajas de nuestros clientes registrados</h1>
		
		</div>

		<div class="menu_izq">
			<ul>
				<li><a href="general_nuestraActividad.php">Nuestra Actividad</a></li>
				<li><a href="general_personas.php">Personas</a></li>
				<li><a href="general_contacto.php">Contacto</a></li>
			</ul>

		</div>
		

		<div class="contenedor_editable_general">

			<p class="titulo_texto">Clientes registrados</p>

			<div class="texto_contenedor_general">
				<p>TravelMaster permite a sus clientes la oportunidad de registrase lo cual le permite acceder a múltiples ventajas</p>

			
				<p>Ventajas de nuestros clientes registrados:</p>

				<ul>
					
					<li>Ingresar tus datos solo una vez y no tener que hacerlo cada vez que quiera comprar un billete.</li>
					<li>Posibilidad de valorar tanto a los condctores y la comodidad del viaje para que podámos así mejorar la calidad de nuestros servicios</li>
					
				</ul>

			</div>

			<p class="titulo_texto">Clientes VIP</p>

			<div class="texto_contenedor_general">
				<p>Una vez el cliente registrado realice 10 viajes con nosotros se le premiará con una licencia vip.</p>

			
				<p>Ventajas de nuestros clientes VIP:</p>

				<ul>
					
					<li>Podrá reservar billetes con antelación al resto de clientes.</li>
					<li>Podrá elegir nuestros asientos de primera clase.</li>
					<li>Podrá elegir la película que desee de nuestro exclusivo videclub MasterTravel-Video.</li>
					
				</ul>

			</div>

		</div>


	</div>

	<?php
		include('mostrar_pie.php');
	?>


</body>
</html>