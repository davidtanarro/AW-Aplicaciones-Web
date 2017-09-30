<?php

/*------------------------------------------------ GENERALES --------------------------------------------------*/

	/*Funcion para ver el tipo de sesión activa*/
	function sesionActivada($sesionTipo){

    if (!isset($_SESSION[$sesionTipo])) {

      header("Location: index.php");
      exit();
      
    }
  }


?>