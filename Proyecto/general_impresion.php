<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>datos clientes</title>
	<link rel="shortcut icon" href="img/logo.ico" />
	<link rel="stylesheet" type="text/css" href="style.css">
</head>


<body>

	<?php
		session_start();
		include('mostrar_cabecera.php');
		include('mostrar_toolbar.php');
	?>

		<?php
			$idViaje = $_REQUEST['idViaje'];
			$asientoSelecionado = $_REQUEST['asientoSelecionado'];
			$trayectoria = $_REQUEST['parametro5'];

			require_once ('logica/billete.php');
			$datos = extraerDetallesBillete($idViaje, $asientoSelecionado);

			$idPasajero = $datos['idPasajero'];
			$origen = $datos['origen'];
			$destino = $datos['destino'];
			$suplementos = $datos['suplementos'];
			$fechaSalida = $datos['fechaSalida'];
			$horaSalida = $datos['horaSalida'];
		?>

	<div class="informacion_contenedor_billetes">	

		<div class="contenedor_propiedades_billetes">
			<div class="viaje">
				<p> COMPAÑIA: MasterTravel 								</p>
			</div>
			<div class="opciones">
				<p> LOCALIZADOR:	<?php	echo $idViaje; ?>			</p>
				<p> SALIDA: 		<?php	echo $origen; ?>			</p>
				<p> LLEGADA: 		<?php	echo $destino; ?>			</p>
				<p> ASIENTO: 		<?php	echo $asientoSelecionado; ?></p>
				<p> SUPLEMENTO: 	<?php	echo $suplementos; ?>		</p>
			</div>
			
			<div class="horario">
				<p> FECHA DE SALIDA: <?php	echo $fechaSalida; ?>		</p>
				<p> HORA DE SALIDA: <?php	echo $horaSalida; ?>		</p>
			</div>
			
			<div class="opciones">
				
				<p> Gracias por viajar con nosotros.					</p>
				<p> Le deseamos un buen viaje.							</p>
			</div>

		</div>
		
		<?php
			if ($trayectoria == "IdayVuelta") {
		?>

		<form action="billetesDisponibles.php " method="post">

					<input type="hidden" value= "<?php echo $idViaje	;?>" name="idViajeIda">
					<input type="hidden" value= "<?php echo $trayectoria;?>" name="trayectoria">
					<input type="hidden" value= "<?php echo $suplementos;?>" name="suplementos">
					<input type="hidden" value= "<?php echo $idPasajero;?>" name="idPasajero">

					<input type="submit" value= "Comprar billete de vuelta" class="btn btn-2" >
				</form>
		<?php
			}
		?>

		<input type ='button' onclick='window.print();' class="btn btn-2" value = 'Imprimir'/>
	</div>

		

		<!--<img alt="Imagen billete" src="img/billete.jpg" />-->
		
	<?php
		//header('mostrar_boton_vuelta.php?idViaje=".$idViaje."&asientoSelecionado=".$asientoSelecionado."&parametro5=".$trayectoria');
		include('mostrar_pie.php');
	?>


</body>
</html>