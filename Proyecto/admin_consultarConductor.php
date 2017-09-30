<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<title>Detalles del conductor</title>
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

		require_once 'logica/conductor.php';

		$id = $_REQUEST['parametro'];

   		$c = new Conductor($id);
	?>

	<div class="informacion_contenedor_gestion">	

		<h2 class="titulo_texto">Conductor: <?php echo $c->consultarConductor()." ".$c->apellidos;?></h2>

		<table>
			<caption>Detalles del conductor</caption>
			<tr>
			   <th>ID viaje</th>
			   <th>Origen</th>
			   <th>Destino</th>
			   <th>Fecha de salida</th>
			   <th>Valoración viaje</th>
			   <th>Valoración conductor</th>
			</tr>
			<?php
				$lista_viajes_conductores = extraerViajesConductores($id);
			
				for($i=0; $i<sizeof($lista_viajes_conductores); $i++){
			
            ?>
					<tr>
		                <td><?php echo $lista_viajes_conductores[$i]['idViaje']								;?></td>
		                <td><?php echo $lista_viajes_conductores[$i]['origen']								;?></td>
		                <td><?php echo $lista_viajes_conductores[$i]['destino']								;?></td>
		                <td><?php echo $lista_viajes_conductores[$i]['fechaSalida']							;?></td>
			            <td>
		                	<?php
								require_once 'logica/viaje.php';
		                		$idViaje = $lista_viajes_conductores[$i]['idViaje'];
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
	            	</tr>

		            
			<?php
	        	}
            ?>
		</table>

	</div>

	
</body>
</html>