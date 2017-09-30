<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8">
	<title>Gestionar conductores</title>
	<link rel="shortcut icon" href="img/logo.ico" />
	<link rel="stylesheet" type="text/css" href="style.css">

	
</head>

<body>

	<?php
		session_start();
			require_once 'logica/funciones.php';
			require_once 'logica/conductor.php';
			sesionActivada("esAdmin");

		include('mostrar_cabecera.php');
		include('admin_mostrar_toolbar.php');

	?>

	

	<div class="informacion_contenedor_gestion">	

		<table>
			<caption>Gestion de conductores</caption>
			<tr>
			   <th>ID conductor</th>
			   <th>Nombre</th>
			   <th>Apellido</th>
			   <th>Fecha de contratación</th>
			   <th>Valoracion conductor</th>
			   <th>Eliminar conductor</th>
			</tr>
			<?php
				$lista_conductores = extraerConductores();
			
				for($i=0; $i<sizeof($lista_conductores); $i++){
			
            ?>
					<tr>
		                <td>
		                  <form action="admin_consultarConductor.php" method="post" id="form_consultar_conductor">
		                        <input type="hidden" value= "<?php echo $lista_conductores[$i]['idConductor'];?>" name="parametro">
		                        <input type="submit" value= "<?php echo $lista_conductores[$i]['idConductor'];?>" name="borrar" id = "ver">
		                  </form>
		                </td>
		                <td><?php echo $lista_conductores[$i]['nombre']				;?></td>
		                <td><?php echo $lista_conductores[$i]['apellidos']			;?></td>
		                <td><?php echo $lista_conductores[$i]['fechaContratacion']	;?></td>
		                <td>
		                	<?php
		                		$idConductor = $lista_conductores[$i]['idConductor'];
		                		$c = new Conductor($idConductor);
		                		$valoracionMedia = $c->extraerValoracionMedia();

								if (isset($valoracionMedia))
		                			echo round($valoracionMedia, 2);	
		                		else
		                			echo "-";
		                	;?>
		                </td>
		                
		                
		               <td>
		                  <form action="logica/admin_eliminar_conductor.php " method="post" id="form_eliminar">
		                      <input type="hidden" name="parametro" value= "<?php echo $lista_conductores[$i]['idConductor'];?>">
		                      <input type="submit" name="borrar" value= "Eliminar" id = "borrar">
		                  </form>
		                </td>
	            	</tr>
		            
			<?php
	        	}
            ?>
		</table>
		
		
		<div class="adminAnadir">
			<button type="button" onclick=" window.location.href='admin_anadirConductor.php' " class="btn">Añadir conductor</button>
		</div>
	</div>
		
	
</body>
</html>