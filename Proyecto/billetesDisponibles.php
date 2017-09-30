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

	<div class="informacion_contenedor_gestion">	


			<?php
				require_once 'logica/viaje.php';
				
				$trayectoria = $_POST['trayectoria'];
				$suplementos = $_POST['suplementos'];
				
				// Cuando su valor es igual a "Ida", venimos de noRegistrado_comprarBillete.php y procederemos a comprar el billete de ida
				// Cuando su valor es distinto de "Ida", tenemos el id del viaje de Ida y procederemos a comprar el billete de vuelta
				$idViajeIda = $_POST['idViajeIda'];

				if ($idViajeIda == "Ida") { // Caso en el que venimos de noRegistrado_comprarBillete.php para comprar un billete de ida con trayectoria de Ida o Ida y vuelta
				    // Obtenemos datos de la Ida
				    $origen = $_POST['origen'];
				    $destino = $_POST['destino'];
				    $fecha = $_POST['fecha'];
				    if (isset($_SESSION["nombre"])) {
	         			$usuario = $_SESSION["nombre"];
	         		}
	         		else {
	         			$usuario = NULL;
	         		}

				    $listaViajesDisponibles = extraerViajesDisponibles($fecha, $origen, $destino, $usuario);

				}
				else { // Caso en el que venimos de general_impresion.php para comprar un billete de vuelta con trayectoria de Ida y vuelta

				  	// Obtenemos datos de la Ida
			        $vIda = new Viaje($idViajeIda);
					
					$idPasajero = $_REQUEST['idPasajero'];

				    // Obtenemos datos de la vuelta
				    $origen = $vIda->destino;
				    $destino = $vIda->origen;
				    $fecha = $vIda->fechaSalida;

				    $listaViajesDisponibles = extraerViajesVueltaDisponibles($fecha, $origen, $destino, $idPasajero);

				    $trayectoria = "Ida"; // Devolvemos el valor "Ida" para que no aparezca de nuevo el boton de "comprar vuelta" en general_impresion.php 
				}
				if ( sizeof($listaViajesDisponibles) == 0 )
					$hayViaje = false;
				else
					$hayViaje = true;

				if ( !($hayViaje) && $idViajeIda == "Ida" ) { // no existe ningun billete disponible de ida
			?>
						<div class="titulo_texto">
							<p> No se encuentra ningún billete disponible en estos momentos con esas especificaciones </p>
						</div>
			<?php
				}
				else if (!($hayViaje) && $idViajeIda != "Ida" ) { // no existe ningun billete disponible de vuelta
			?>
						<div class="titulo_texto">
							<p> No se encuentra ningún billete de vuelta disponible en estos momentos, ¿desea mantener su billete de ida? </p>
						</div>
			<?php
				}	      
				  
				else { // Se han encontrado billetes disponibles
			?>

						<table>
				
							<tr>
								<th>Origen</th>
								<th>Destino</th>
								<th>Fecha</th>
								<th>Hora</th>
								<th>Pasajeros</th>
								<th></th>
							</tr>
			<?php	  	
					  for ($i = 0; $i < sizeof($listaViajesDisponibles); $i++) {
					  		$idViaje = $listaViajesDisponibles[$i]['idViaje'];
	                		$v = new Viaje($idViaje);
					  		$ocupacion = $v->extraerOcupacion();
			?>
							<tr>
								<td><?php echo $listaViajesDisponibles[$i]['origen']		;?></td>
								<td><?php echo $listaViajesDisponibles[$i]['destino']		;?></td>
								<td><?php echo $listaViajesDisponibles[$i]['fechaSalida']	;?></td>
								<td><?php echo $listaViajesDisponibles[$i]['horaSalida']	;?></td>
								<td><?php echo $ocupacion									;?>/60</td>

								<td>
									<form action="asientosDisponibles.php " method="post" id="form_borrar">
										<input type="hidden" value= "<?php echo $idViaje;?>" 	 name="parametro1">
										<input type="hidden" value= "<?php echo $suplementos;?>" name="parametro2">
										<input type="hidden" value= "<?php echo $trayectoria;?>" name="parametro3">
										<input type="submit" value= "Siguiente" name="siguiente" id="ver">
									</form>
								</td>
							 </tr>
			<?php
					    }
				}
			?>
						</table>

			<?php
					if ($idViajeIda != "Ida" ) {
			?>	
							<form action="logica/borrar_billete.php " method="post" id="form_borrar">
								<input type="hidden" value= "<?php echo $idViajeIda;?>" name="parametro1">
								<input type="hidden" value= "<?php echo $idPasajero;?>" name="parametro2">
								<input type="hidden" value= "No hay billete de vuelta" 	name="parametro6">
								<input type="submit" value= "Cancelar billete de Ida" 	name="siguiente" class="btn btn-2" id ="siguiente">
							</form>
			<?php
					}
			?>
		
	</div>

	<?php
		include('mostrar_pie.php');
	?>
	
	
</body>
</html>