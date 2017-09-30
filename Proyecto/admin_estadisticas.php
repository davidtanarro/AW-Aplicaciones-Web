<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<title>Estadísticas</title>
	<link rel="shortcut icon" href="img/logo.ico" />
	<link rel="stylesheet" type="text/css" href="style.css">
	
</head>



<body>

	<?php
		session_start();
			require_once 'logica/funciones.php';
			sesionActivada("esAdmin");

		include('mostrar_cabecera.php');
		include('admin_mostrar_toolbar.php');

	?>


	<div class="informacion_contenedor_gestion">	

		<table>
			<caption>Estadísticas de viajes</caption>
			<tr>
			   <th>ID viaje</th>
			   <th>Origen</th>
			   <th>Destino</th>
			   <th>Fecha de salida</th>
			   <th>Número de pasajeros</th>
			   <th>Valoracion viaje</th>
			   <th>Valoracion conductor</th>
			   <th>Eliminar viaje</th>
			</tr>

			<!-- -->

			<?php
				require_once 'logica/viaje.php';
				$lista_viajes = extraerViajesRealizados();
			
				for($i=0; $i<sizeof($lista_viajes); $i++) {
            ?>
					<tr>
		                <td><?php echo $lista_viajes[$i]['idViaje']		;?></td>
		                <td><?php echo $lista_viajes[$i]['origen']		;?></td>
		                <td><?php echo $lista_viajes[$i]['destino']		;?></td>
		                <td><?php echo $lista_viajes[$i]['fechaSalida']	;?></td>
		                <td>
		                	<?php
		                		$idViaje = $lista_viajes[$i]['idViaje'];
		                		$v = new Viaje($idViaje);
		                		$ocupacion = $v->extraerOcupacion();

		                		echo $ocupacion;	
		                	;?>
		                	/60
		                </td>
		                <td>
		                	<?php
		                		$idViaje = $lista_viajes[$i]['idViaje'];
		                		$v = new Viaje($idViaje);

		                		$valoracionMediaViaje = $v->extraerValoracionMediaViaje();
		                		if (isset($valoracionMediaViaje))
		                			echo round($valoracionMediaViaje, 2);
		                		else
		                			echo "-";	
		                	;?>
		                </td>
		                <td>
		                	<?php
		                		$valoracionMediaConductor = $v->extraerValoracionMediaConductor();
		                		if (isset($valoracionMediaConductor))
		                			echo round($valoracionMediaConductor, 2);
		                		else
		                			echo "-";		
		                	;?>
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
		
	</div>


</body>
</html>

