<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<title>Detalles del usuario</title>
	<link rel="shortcut icon" href="img/logo.ico" />
	<link rel="stylesheet" type="text/css" href="style.css">
	
</head>


<body>

	<?php
		session_start();
		require_once 'logica/viaje.php';
		require_once 'logica/usuario.php';
		require_once 'logica/funciones.php';
		require_once 'logica/valoracion.php';
			sesionActivada("esAdmin");
			
		include('mostrar_cabecera.php');
		include('admin_mostrar_toolbar.php');

    	$id = $_REQUEST['parametro'];
    	$us = new Usuario($id);
	?>

	<div class="informacion_contenedor_gestion">

		<h2 class="titulo_texto">Usuario: <?php echo $us->nombre." ".$us->apellidos ;?></h2>	

				<table>
					<caption>Viajes realizados</caption>
					<tr>
					   <th>ID viaje</th>
					   <th>Origen</th>
					   <th>Destino</th>
					   <th>Fecha de salida</th>
					   <th>Valoración viaje</th>
					   <th>Valoración conductor</th>
					</tr>
					
					<?php

						$listaViajesRealizados = extraerViajesRealizadosUsuario($id);



						for($i=0; $i<sizeof($listaViajesRealizados); $i++) {

						      $idViaje = $listaViajesRealizados[$i]['idViaje'];
						      $idPasajero = $listaViajesRealizados[$i]['idPasajero'];
						      $idConductor = $listaViajesRealizados[$i]['idConductor'];

					?>
							<tr>    
		             
								<td><?php echo $listaViajesRealizados[$i]['idViaje']	;?></td>
								<td><?php echo $listaViajesRealizados[$i]['origen']		;?></td>
								<td><?php echo $listaViajesRealizados[$i]['destino']	;?></td>
								<td><?php echo $listaViajesRealizados[$i]['fechaSalida'];?></td>

								<td> 
							<?php
								if ( Valoracion::existeValoracionViaje($idViaje, $idConductor, $idPasajero) ) {
							?>
										<?php 
						      				$valoracionV = new Valoracion($idConductor, $idViaje, $idPasajero);

											echo round($valoracionV->valorarViaje, 2);
								} 
										?>
								</td>
								<td> 
							<?php
								if ( Valoracion::existeValoracionConductor($idViaje, $idConductor, $idPasajero) ) {
							?>
										<?php 
						      				$valoracionC = new Valoracion($idConductor, $idViaje, $idPasajero);

											echo round($valoracionC->valorarConductor, 2);
								} 
										?>
								</td>
					         </tr>

				        <?php
					    }
					    ?>

				</table>


		<table>
		<caption>Viajes Pendientes</caption>

		<tr>
			   <th>ID viaje</th>
			   <th>Origen</th>
			   <th>Destino</th>
			   <th>Fecha de salida</th>
		</tr>
			<?php
				$listaViajesProgramados = extraerViajesProgramadosUsuario($id);


				for($i=0; $i<sizeof($listaViajesProgramados); $i++) {

				      
			?>
						<tr>    
						 
							<td><?php echo $listaViajesProgramados[$i]['idViaje']		;?></td>
							<td><?php echo $listaViajesProgramados[$i]['origen']		;?></td>
							<td><?php echo $listaViajesProgramados[$i]['destino']		;?></td>
							<td><?php echo $listaViajesProgramados[$i]['fechaSalida']	;?></td>
						</tr>


		 	<?php
	        	}
            ?>
		</table>

	</div>

	
</body>
</html>