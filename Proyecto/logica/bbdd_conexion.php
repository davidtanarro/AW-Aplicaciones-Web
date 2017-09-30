<?php

 Class Conexion {

	public static function interacion_bbdd($consulta){

		if (!isset($conexion)) {
		//Conexion a mi base de datos mastertravel
			$conexion = mysqli_connect("localhost", "root", "", "mastertravel");
		}
		//Mensaje a posible fallo
		if (mysqli_connect_errno()) {
			echo "Error de conexión a la BD: ".mysqli_connect_error();
			exit();
		}
		else{
			mysqli_query($conexion, "SET NAMES 'utf8'");
		 	$resultado = mysqli_query($conexion, $consulta);
		}

		mysqli_close($conexion);

		return $resultado;
	}
	   
}


?>