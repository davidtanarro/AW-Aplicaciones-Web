<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="utf-8" lang="es">
	<title>Gestionar usuarios</title>
	<link rel="shortcut icon" href="img/logo.ico" />
	<link rel="stylesheet" type="text/css" href="style.css">

	
</head>

<body>

	<?php
		require_once 'logica/funciones.php';
		require_once 'logica/usuario.php';

		session_start();
		sesionActivada("esAdmin");

		include('mostrar_cabecera.php');
		include('admin_mostrar_toolbar.php');

	?>


	<div class="informacion_contenedor_gestion">	

		<table>
			<caption>Gestion de usuarios registrados</caption>
			<tr>
			   <th>ID de usuario</th>
			   <th>Usuario</th>
			   <th>Nombre</th>
			   <th>Apellidos</th>
			   <th>Correo</th>
			   <th>Numero de valoraciones</th>
			   <th>VIP</th>
			   <th>Fecha de registro</th>
			   <th>Eliminar usuario</th>
			  
			</tr>

			<!-- -->

			<?php
				
				$lista_us = extraerUsuarios();
			
				for($i=0; $i<sizeof($lista_us); $i++){
			
            ?>
					<tr>
		                <td>
		                  <form action="admin_consultarUsuario.php" method="post" id="form_consultar_conductor">
		                        <input type="hidden" value= "<?php echo $lista_us[$i]['dni'];?>" name="parametro">
		                        <input type="submit" value= "<?php echo $lista_us[$i]['dni'];?>" name="borrar" id = "ver">
		                    </form>
		                </td>
		                <td><?php echo $lista_us[$i]['usuario']			;?></td>
		                <td><?php echo $lista_us[$i]['nombre']			;?></td>
		                <td><?php echo $lista_us[$i]['apellidos']		;?></td>
		                <td><?php echo $lista_us[$i]['correo']			;?></td>
		                <td><?php echo $lista_us[$i]['numValoraciones']	;?></td>
		                <td><?php echo $lista_us[$i]['vip']				;?></td>
		                <td><?php echo $lista_us[$i]['fechaRegistro']	;?></td>
		                
		                
		               <td>
		                  <form action="logica/admin_eliminar_usuarios.php " method="post" id="form_eliminar">
		                      <input type="hidden" name="parametro" value= "<?php echo $lista_us[$i]['dni'];?>">
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