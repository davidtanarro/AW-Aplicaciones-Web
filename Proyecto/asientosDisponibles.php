<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<title>Asientos disponibles</title>
	<link rel="shortcut icon" href="img/logo.ico" />
	<link rel="stylesheet" type="text/css" href="style.css">


	<meta name="description" content="free website template" />
	<meta name="keywords" content="enter your keywords here" />
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=9" />
	<script type="text/javascript" src="js/bus/jquery.min.js"></script>
	<script type="text/javascript" src="js/bus/bus.js"></script>
	<script src='js/validarFormularioPlazas.js' type='text/javascript'></script>

</head>

<body>

	<?php
		session_start();
		include('mostrar_cabecera.php');
		include('mostrar_toolbar.php');
	?>
	<div class="informacion_contenedor_gestion">	
					<div class="autobus">
						<p>Asientos disponibles</p>

							<?php

								$idViaje = $_POST['parametro1'];

								require_once 'logica/billete.php';
								$TodosAsientos = obtenerAsientosOcupados($idViaje);
								
								//juntar todos los datos del array y separarlos con comas							
								//echo "Todos los asientos: ".implode(', ',$TodosAsientos);
								$asientosJuntos=implode(',',$TodosAsientos);
								//echo $asientosJuntos;
							?>
						
						<form id="form1" runat="server">
							<div class="holderautobus" id="holder"> 
								<ul  id="place"> </ul>
							</div>
							<div class="info_asientos" > 
								<ul id="seatDescription">
										<li id="asiento_libre" style="background:url('img/available_seat_img.gif') no-repeat scroll 0 0 transparent;"><p>Asiento libre</p></li>
										<li id="asiento_ocupado" style="background:url('img/booked_seat_img.gif') no-repeat scroll 0 0 transparent;"><p>Asiento ocupado</p></li>
										<li id="asiento_seleccionado" style="background:url('img/selected_seat_img.gif') no-repeat scroll 0 0 transparent;"><p>Asiento seleccionado</p></li>
								</ul>        
							</div>
						</form>
				
						<script type="text/javascript">
								
								var bookedSeats = [<?php echo $asientosJuntos; ?>];
								//alert ("El implode: "+bookedSeats);
								bus(bookedSeats);
						</script>
					</div>


					<?php
			$idViaje = $_POST['parametro1'];
			$suplementos = $_POST['parametro2'];
			$trayectoria = $_POST['parametro3'];


		  if (isset($_SESSION["login"]) ) {

		    $usuario = $_SESSION['nombre']; // cada usuario es unico

		    require_once 'logica/usuario.php';
		    $dni = Usuario::extraerDniUsuario($usuario);
		?>

				<div class="formu_valorar">
					<form name='datosCliente' id='formularioReg' enctype='multipart/form-data' onsubmit='return validarForm(this);' action='logica/insertar_billete.php' method='post'>
					<!-- <form action="insertar_billete.php" method="post" id="form_borrar">-->

						<input type="hidden" value= "<?php echo $idViaje;?>" 			name="parametro1">
						<input type='hidden' id='asiento' 								name="parametro2">
						<input type="hidden" value= "<?php echo $suplementos;?>" 		name="parametro3">
						<input type="hidden" value= "<?php echo $dni?>" 				name="parametro4">
						<input type="hidden" value= "<?php echo $trayectoria;?>" 		name="parametro5">


						
						<input class="btn btn-2" type='submit' name='cmdNuevo' onclick='enviarFormulario("formularioReg");' value="Comprar Billete" />
						<cite id="error"></cite>

					</form>
				</div>
		<?php
		  }
		  else {
		?>
				<div class="formu_valorar">
					<form name='datosCliente' id='formularioReg' enctype='multipart/form-data' onsubmit='return validarForm(this);' action='noRegistrado_datosCliente.php' method='post'>

						<input type="hidden" value= "<?php echo $idViaje;?>" 	 name="parametro1">
						<input type='hidden' id='asiento' 						 name="parametro2">
						<input type="hidden" value= "<?php echo $suplementos;?>" name="parametro3">
						<input type="hidden" value= "<?php echo $trayectoria;?>" name="parametro5">


						
						<input class="btn btn-2" type='submit' name='cmdNuevo' onclick='enviarFormulario("formularioReg");' value="Comprar Billete" />
						<cite id="error"></cite>
						
					</form>
				</div>
		<?php
		  }
		?>

	</div>

	<?php
		include('mostrar_pie.php');
	?>
	

</body>
</html>