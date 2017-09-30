<?php

	//Inicio del procesamiento
	session_start();


	unset($_SESSION["login"]);
	unset($_SESSION["esAdmin"]);
	unset($_SESSION["nombre"]);


	session_destroy();
?>


<?php

	header("Location: ../index.php");
	exit;

?>