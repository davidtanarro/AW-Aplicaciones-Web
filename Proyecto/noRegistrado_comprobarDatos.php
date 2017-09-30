<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<title>Billetes disponibles</title>
	<link rel="shortcut icon" href="img/logo.ico" />
	<link rel="stylesheet" type="text/css" href="style.css">


</head>

<body>

	<?php
		session_start();
		include('mostrar_cabecera.php');
		include('mostrar_toolbar.php');
	?>

	<div class="informacion_contenedor_billetes">	

		<div class="contenedor_propiedades_billetes">

			<?php
				require_once ('logica/billete.php');

				$idViaje = $_REQUEST['idViaje'];
				$asientoSelecionado = $_REQUEST['asientoSelecionado'];
				$trayectoria = $_REQUEST['trayectoria'];

				$datos = extraerViajeUsuarioNoRegistrado($idViaje, $asientoSelecionado);

				$dni = $datos['dni'];
				$nombre = $datos['nombre'];
				$apellidos = $datos['apellidos'];
				$direccion = $datos['direccion'];
				$codPostal = $datos['codpostal'];
				$telefono = $datos['telefono'];
				$idPasajero = $datos['idPasajero'];
				$suplementos = $datos['suplementos'];
			?>

			<div class="viaje">
				<p>Compruebe sus datos</p>
			</div>

			<div class="opciones">
				<p>Nombre: 			<?php	echo $nombre;	?>	</p>
				<p>Apellidos: 		<?php	echo $apellidos;?>	</p>
			</div>

			<div class="horario">
				<p>Dirección: 		<?php 	echo $direccion;?>	</p>
				<p>Código Postal: 	<?php 	echo $codPostal;?>	</p>
				
			</div>

			<div class="opciones">
				<p>Dni: 			<?php 	echo $dni;?>		</p>
				<p>Teléfono: 		<?php 	echo $telefono;?>	</p>
			</div>


		</div> 

		<div class="cambiar_datos_container">

			<a href=
				<?php 
					echo "logica/borrar_billete.php?parametro1=".$idViaje."&parametro2=".$asientoSelecionado."&parametro3=".$suplementos."&parametro4=".$dni."&parametro5=".$trayectoria;
				?>  class ="btn btn-3"> Cambiar datos 

			</a>

			<a href= <?php echo "general_impresion.php?idViaje=".$idViaje."&asientoSelecionado=".$asientoSelecionado."&parametro5=".$trayectoria;?> class ="btn btn-3"> Imprime tu billete 
			</a>	
		</div>
		
	</div>


		
	<?php
		include('mostrar_pie.php');
	?>
	

	
</body>
</html>