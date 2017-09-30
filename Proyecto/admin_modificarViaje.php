<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<title>Modificar viaje</title>
	<link rel="shortcut icon" href="img/logo.ico" />
	<link rel="stylesheet" type="text/css" href="style.css">
	
	<script src="js/validarFormularioAdmin.js" type="text/javascript"></script>
	
	<!-- para funcion calendario -->
	<script type='text/javascript' src='js/calendario/datepicker.js'></script>
	<link href='cssComponentes/datepicker.css' rel='stylesheet' type='text/css'>
	<script src="js/validarFormularioAdmin.js" type="text/javascript"></script>
	<!-- para funcion hora -->
	<link href="cssComponentes/timedropper.css" rel="stylesheet" type="text/css">
	<script src="http://code.jquery.com/jquery-1.12.1.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
	<script src="js/hora/timedropper.js"></script>
	<script type='text/javascript' src='js/hora/hora.js'></script>
	
</head>



<body>

	<?php
		session_start();
		require_once 'logica/funciones.php';
		sesionActivada("esAdmin");
		
		include('mostrar_cabecera.php');
		include('admin_mostrar_toolbar.php');

	?>


	<div class="contenedor_formulario">	

		<form class="form_register" id="formularioReg" action="logica/admin_modificar_viaje.php" method="post" onsubmit="return FormModViaje(this);" enctype="multipart/form-data">
			<h2 class="form_titulo">Modificar viaje</h2>
			
			<div class="contenedor-inputs">

				<?php
					$idViaje = $_POST['parametro'];
				?>
				
				<input type="hidden" value= "<?php echo $idViaje;?>" name="parametro">
				<cite id="error"></cite>
				<input type='text' name='fechaSalida' class='w8em format-y-m-d' id='finalDate' placeholder='Fecha de salida (yyyy-mm-dd)'></input>
				
				<input name="horaSalida" id="hora" placeholder="Hora de salida" class="input_100x20" autocomplete="off">
				
				<script type="text/javascript">
					//LLamada a la función externa del reloj
					hora();
				</script>
				

				<input name="numBus" placeholder="Nº de autobuses" class="input_100x20">
				
				<select type="text" 	class="input_100x20" 			name="conductor" >
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
							$aux_nombre = $listaConductores[$j]['nombre'];
							$aux_idConductor = $listaConductores[$j]['idConductor'];
					?>
							<option value='<?php echo $aux_idConductor; ?>'> 
								<?php echo $aux_nombre; ?>
							</option>
					<?php 
						}
					?>
				</select>

				<input type="submit" name="cmdNuevo" value="Modificar Viaje" class="input_100x20" onclick="enviarFormulario('formularioReg');">

			</div>

		</form>
	</div>


</body>
</html>

