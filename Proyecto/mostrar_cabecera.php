<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" lang="es">
</head>
<body>

<header>
		<!-- start logo + menu-->
		<div class="ancho_cabecera">
			<div class="logo">

			<?php
				if (isset($_SESSION["esAdmin"]))
					echo "<p><a href=admin_index.php>MasterTravel</a></p>";

				elseif(isset($_SESSION["login"]))
					echo "<p><a href=index.php>MasterTravel</a></p>";


				else
					echo "<p><a href=index.php>MasterTravel</a></p>";


			?>
				

			</div>

			
			<nav class="menu_cabecera">
				<ul>
				
					<?php
						include("cabecera.php");
						mostrarSaludo();
					?>
				
				</ul>
			</nav>
		</div>
		<!-- end logo + menu-->

	</header>

</body>
</html>