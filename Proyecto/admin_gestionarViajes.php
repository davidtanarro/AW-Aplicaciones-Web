<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<title>Gestionar viajes</title>
	<link rel="shortcut icon" href="img/logo.ico" />
	<link rel="stylesheet" type="text/css" href="style.css">
	
</head>



<body>

	<?php
		session_start();
			
		include('mostrar_cabecera.php');
		include('admin_mostrar_toolbar.php');

	?>


	<div class="informacion_contenedor_gestion">	

		<table>
			<caption>Gestion de viajes</caption>
			<tr>
			   <th>ID</th>
			   <th>Origen</th>
			   <th>Destino</th>
			   <th>Fecha de salida</th>
			   <th>Hora de salida</th>
			   <th>Ocupación</th>
			   <th>Nº de autobuses</th>
			   <th>Conductor</th>
			   <th>Modificar</th>
			   <th>Eliminar</th>
			</tr>

			<!-- -->

			<?php
				require_once 'logica/viaje.php';
				require_once 'logica/conductor.php';
				$lista_viajes = extraerViajesProgramados();
			
				for($i=0; $i<sizeof($lista_viajes); $i++){
            ?>
					<tr>
		                <td><?php echo $lista_viajes[$i]['idViaje']			;?></td>
		                <td><?php echo $lista_viajes[$i]['origen']			;?></td>
		                <td><?php echo $lista_viajes[$i]['destino']			;?></td>
		                <td><?php echo $lista_viajes[$i]['fechaSalida']		;?></td>
		                <td><?php echo $lista_viajes[$i]['horaSalida']		;?></td>
		                <td>
		                	<?php
		                		$idViaje = $lista_viajes[$i]['idViaje'];
		                		$v = new Viaje($idViaje);
		                		$ocupacion = $v->extraerOcupacion();

		                		echo $ocupacion;	
		                	;?>
		                	/60
		                </td>
		                <td><?php echo $lista_viajes[$i]['numBus']								;?></td>
		                <td>
		                	<?php
		                		$c = new Conductor($lista_viajes[$i]['idConductor']);
		                		echo $c->consultarConductor()." ".$c->apellidos;
		                		
		                	?>

		                </td>
		                
		               
		               <td>
		               		<?php
		               			if ($ocupacion == 0) {
		               		?>
								<form action="admin_modificarViaje.php " method="post" id="form_modificar">
									<input type="hidden" name="parametro" value= "<?php echo $lista_viajes[$i]['idViaje'];?>">
									<input type="submit" name="borrar" value= "Modificar" id = "modificar">
								</form>
		               		<?php
		               			}
		               		?>
		                </td>
		                
		               <td>
		                  <form action="logica/admin_eliminar_viajes.php " method="post" id="form_eliminar">
		                      <input type="hidden" name="parametro1" value= "<?php echo $lista_viajes[$i]['idViaje'];?>">
		                      <input type="hidden" name="parametro2" value= "<?php echo $lista_viajes[$i]['idConductor'];?>">
		                      <input type="hidden" name="parametro3" value= "<?php echo $lista_viajes[$i]['fechaSalida'];?>">
		                      <input type="submit" name="borrar" value= "Eliminar" id = "borrar">
		                  </form>
		                </td>
	            	</tr>
		            
			<?php
	        	}
            ?>

		</table>
		
		
		<div class="adminAnadir">
			<button type="button" onclick=" window.location.href='admin_anadirViaje.php' " class="btn">Añadir viaje</button>
		</div>
		
	</div>



</body>
</html>

