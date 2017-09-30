<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<title>Crear viaje</title>
	<link rel="shortcut icon" href="img/logo.ico" />
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="js/validarFormularioAdmin.js" type="text/javascript"></script>
	
</head>


<body>

	<?php
		session_start();
		require_once 'logica/usuario.php';
		require_once 'logica/funciones.php';
			sesionActivada("esAdmin");
		include('mostrar_cabecera.php');	
		include('admin_mostrar_toolbar.php');

	?>

	<div class="contenedor_formulario">
		<form class="form_register" id="formularioReg" action="logica/admin_insertar_viaje.php" method="post" onsubmit="return FormIdConductor(this);" enctype="multipart/form-data">
			<h2 class="form_titulo">Nuevo viaje</h2>
			
			<div class="contenedor-inputs">

				<?php
					$origen=$_POST['origen'];
					$destino=$_POST['destino'];
					$fechaSalida=$_POST['fechaSalida'];
					$horaSalida=$_POST['horaSalida'];
					$fechaFinalizacion=$_POST['fechaFinalizacion'];
					$frecuencia=$_POST['frecuencia'];
					$numBus=$_POST['numBus'];

				?>
					<input type="hidden" value= "<?php echo $origen 			;?>" name="origen">
					<input type="hidden" value= "<?php echo $destino			;?>" name="destino">
					<input type="hidden" value= "<?php echo $fechaSalida		;?>" name="fechaSalida">
					<input type="hidden" value= "<?php echo $horaSalida			;?>" name="horaSalida">
					<input type="hidden" value= "<?php echo $fechaFinalizacion	;?>" name="fechaFinalizacion">
					<input type="hidden" value= "<?php echo $frecuencia			;?>" name="frecuencia">
					<input type="hidden" value= "<?php echo $numBus				;?>" name="numBus">


				<?php
					for ($i = 1; $i <= $numBus; $i++) {
				?>
						<select type="text" 	class="input_100x20" 			name="conductor<?php echo $i; ?>" >
									<option value='' SELECTED> 
										Seleccione el conductor
									</option>

							<?php
								require_once 'logica/conductor.php';
								$listaConductores = extraerConductores();

								if ( sizeof($listaConductores) == 0 ) {
							?>
									<option value=''> No hay conductores disponibles </option>
							<?php
								}


								for ($j=0; $j<sizeof($listaConductores); $j++) {
									
									$aux_idConductor = $listaConductores[$j]['idConductor'];
							?>
									<option value='<?php echo $aux_idConductor; ?>'> 
										<?php echo $listaConductores[$j]['nombre']; ?>
										<?php echo $listaConductores[$j]['apellidos']; ?>
									</option>
							<?php 
								}
							?>


						</select>
				<?php
					}
				?>

				<input type="submit" name="cmdNuevo" value="Crear viaje" class="input_100x20" onclick="enviarFormulario('formularioReg');">
			</div>

		</form>
	</div>


</body>
</html>

