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
				$dni = $_REQUEST["dni"];
				$localizador = $_REQUEST["localizador"];

				require_once ('logica/billete.php');
				require_once ('logica/viaje.php');
				require_once ('logica/conductor.php');
				
				$v = new Viaje($localizador);
				$b = new Billete($localizador, $dni);
				$c = new Conductor($v->idConductor);

				if (!Billete::tieneBillete($localizador, $dni)) { // no existe ningun billete
			?>		
					<div class="viaje">
						<p> Su billete no ha sido encontrado </p>
					</div>
			<?php 
				}
				else {
			?>
					<div class="viaje">
						<p> COMPAÑIA: MasterTravel 	</p>
						
					</div>


					<div class="opciones">
						<p> LOCALIZADOR:	<?php echo $localizador; 	?>	</p>
						<p> SALIDA: 		<?php echo $v->origen;		?>	</p>
						<p> LLEGADA: 		<?php echo $v->destino; 	?>	</p>
						<p> ASIENTO:		<?php echo $b->asiento;		?>	</p>
						<p> SUPLEMENTO: 	<?php echo $b->suplementos; ?>	</p>
					</div>

					
					<div class="horario">
						<p> FECHA DE SALIDA:	<?php echo $v->fechaSalida; 			?>	</p>
						<p> HORA DE SALIDA:		<?php echo $v->horaSalida;				?>	</p>
						<p> CONDUCTOR:			<?php echo $c->consultarConductor();	?>	</p>
					</div>

					<div class="opciones">
						<p> Gracias por viajar con nosotros.	</p>
					</div>
					
			<?php
				}
			?>
		</div>
		<input type ='button' onclick='window.print();' class="btn btn-2" value = 'Imprimir'/>
	</div>

	<?php
		include('mostrar_pie.php');
	?>
	
</body>
</html>