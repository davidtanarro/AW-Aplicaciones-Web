<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<title>Consulta de billetes</title>
	<link rel="shortcut icon" href="img/logo.ico" />
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="js/validarFormularioConsultar.js" type="text/javascript"></script>
	
</head>


<body>

	<?php
		session_start();
		require_once 'logica/usuario.php';
		require_once 'logica/viaje.php';
		require_once 'logica/valoracion.php';


		include('mostrar_cabecera.php');
		include('mostrar_toolbar.php');


		if (!isset($_SESSION["login"]) ) {
	?>
		<div class="informacion_contenedor_gestion2">
				<div class="contenedor_formulario">
					<form name="formulario" id="formularioReg" class="form_register" action="billeteConsultado.php" method="post" onsubmit="return validarFormConsultar(this);" enctype="multipart/form-data">
						<h2 class="form_titulo">Consulte su billete</h2>
						<div class="contenedor-inputs">
							<cite id="error"></cite>
							<input name="dni" placeholder="Dni *" class="input_100x20">
					    	<input name="localizador" placeholder="Localizador *" class="input_100x20">
							
							<input type="submit" name="cmdNuevo" value="Consulte su billete" class="input_100x20" onclick="enviarFormulario('formularioReg');"/>

						</div>
					</form>
				</div>
			</div>

	<?php

		}
		else {

			if ( isset($_REQUEST['mensaje']) ) { // si existe algun mensaje
	?>
				<div class="titulo_texto">
					<p> <?php echo $_REQUEST['mensaje'];?> </p>
				</div>
	<?php
			}
	?>

			<div class="informacion_contenedor_gestion">

				<table>
					<caption>Viajes realizados</caption>
					<tr>
					   <th>ID viaje</th>
					   <th>Origen</th>
					   <th>Destino</th>
					   <th>Fecha de salida</th>
					   <th>Valoración viaje</th>
					   <th>Valoración conductor</th>
					   <th>Ver detalle</th>
					</tr>
					
					<?php
						
						$dni = Usuario::extraerDniUsuario($_SESSION["nombre"]);

						$listaViajesRealizados = extraerViajesRealizadosUsuario($dni);



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

							<?php
								if ( Valoracion::existeValoracionViaje($idViaje, $idConductor, $idPasajero) ) {
							?>
									<td> 
										<?php 
						      				$valoracionV = new Valoracion($idConductor, $idViaje, $idPasajero);

											echo $valoracionV->valorarViaje; 
										?>
									</td>
							<?php

								}
								else {
							?>
									<td>
										<div class="formu_valorar">
											<form name="formu_valorar" action="logica/registrado_valorar_viaje.php" method="post">
												<input type="hidden" value= "<?php echo $idViaje;?>" name="localizador">
												<input type="hidden" value= "<?php echo $idPasajero;?>" name="dni">

												<select name="calificacion" class="input_48x20">
													<option value="5" SELECTED>5</option>
													<option value="4">4</option>
													<option value="3">3</option>
													<option value="2">2</option>
													<option value="1">1</option>
													<option value="0">0</option>
												</select>

												<input type="submit" class="input_48x20" value="Enviar">
											</form>
										</div>
									</td>

							<?php
								}
								if ( Valoracion::existeValoracionConductor($idViaje, $idConductor, $idPasajero) ) {
							?>
									<td> 
										<?php 
						      				$valoracionC = new Valoracion($idConductor, $idViaje, $idPasajero);

											echo $valoracionC->valorarConductor; 
										?>
									</td>
							<?php
								}
								else {
							?>
									<td>
										<div class="formu_valorar">
											<form name="formu_valorar" action="logica/registrado_valorar_conductor.php" method="post">
												<input type="hidden" value= "<?php echo $idViaje;?>" name="localizador">
												<input type="hidden" value= "<?php echo $idPasajero;?>" name="dni">

												<select name="calificacion" class="input_48x20">
													<option value="5" SELECTED>5</option>
													<option value="4">4</option>
													<option value="3">3</option>
													<option value="2">2</option>
													<option value="1">1</option>
													<option value="0">0</option>
												</select>

												<input type="submit" class="input_48x20" value="Enviar">
											</form>
										</div>
									</td>
							<?php
								}
							?>
								<td>
									<form name="formu_valorar" action="billeteConsultado.php" method="post">
										<input type="hidden" value= "<?php echo $idViaje ?>" name="localizador">
										<input type="hidden" value= "<?php echo $idPasajero ?>" name="dni">

										<input type="submit" class="input_100x20" value="Ver detalle">
									</form>
								</td>
					         </tr>

				        <?php

				          $estaViajeValorado = NULL;
				          $estaConductorValorado = NULL;
					    }
					    ?>

				</table>

				


				
				<table>
					<caption>Viajes pendientes</caption>
					<tr>
					   <th>ID viaje</th>
					   <th>Origen</th>
					   <th>Destino</th>
					   <th>Fecha de salida</th>
					   <th>Ver detalle</th>
					   <th>Cancelar viaje</th>
					</tr>
					
					<?php
						
  						
						$dni = Usuario::extraerDniUsuario($_SESSION["nombre"]);

						$listaViajesProgramados = extraerViajesProgramadosUsuario($dni);


						for($i=0; $i<sizeof($listaViajesProgramados); $i++) {

						      $idViaje = $listaViajesProgramados[$i]['idViaje'];
						      $idPasajero = $listaViajesProgramados[$i]['idPasajero'];
					?>
						<tr>    
						 
							<td><?php echo $listaViajesProgramados[$i]['idViaje']		;?></td>
							<td><?php echo $listaViajesProgramados[$i]['origen']		;?></td>
							<td><?php echo $listaViajesProgramados[$i]['destino']		;?></td>
							<td><?php echo $listaViajesProgramados[$i]['fechaSalida']	;?></td>
							<td>
								<form name="formu_valorar" action="billeteConsultado.php" method="post">
								      <input type="hidden" value= "<?php echo $idViaje ;?>" name="localizador">
								      <input type="hidden" value= "<?php echo $idPasajero ;?>" name="dni">

								      <input type="submit" class="input_100x20" value="Ver detalle">
								</form>
							</td>
							<td>
							  <form name="formu_valorar" action="logica/borrar_billete.php" method="post">
							      <input type="hidden" value= "<?php echo $idViaje;?>" name="localizador">
							      <input type="hidden" value= "<?php echo $idPasajero;?>" name="dni">

							      <input type="submit" class="input_100x20" value="Cancelar">
							  </form>
							</td>
						</tr>

					<?php
						}
					?>
					
				</table>
			</div>

	<?php
		}

		include('mostrar_pie.php');
	?>

</body>
</html>

