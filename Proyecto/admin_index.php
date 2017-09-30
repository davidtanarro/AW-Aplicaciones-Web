
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<title>Inicio</title>
	<link rel="shortcut icon" href="img/logo.ico" />
	<link rel="stylesheet" type="text/css" href="style.css">
</head>



<body>


	<?php
		session_start();
		
			require_once 'logica/funciones.php';
			sesionActivada("esAdmin");
			include('mostrar_cabecera.php');
			

	?>
	
		<div class="contenedor_pagina_admin">

			<div class="foto_usuario">

					<img src="img/admin.png" alt="imagen_admin">

				</div>

				<div class="contenedor_opciones">

					<ul>
						
						<li><a href="admin_estadisticas.php">Estadísticas</a></li>
						<li><a href="admin_gestionarViajes.php">Viajes</a></li>
						<li><a href="admin_gestionarConductores.php">Conductores</a></li>
						<li><a href="admin_gestionarUsuarios.php">Usuarios</a></li>
						
					</ul>	
				
			</div>

		</div>


	
</body>
</html>