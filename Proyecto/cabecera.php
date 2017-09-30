<?php
	function mostrarSaludo() {
		if (isset($_SESSION["login"]) && ($_SESSION["login"]===true)) {
			if (isset($_SESSION["vip"]) && $_SESSION["vip"]) {
?>
			&#10031; 
							
<?php
			}
			echo $_SESSION['nombre'] . " | " . "<a href='logica/logout.php'>salir</a>";
		} 
		else if(isset($_SESSION["esAdmin"]) && ($_SESSION["esAdmin"]===true)){
			echo $_SESSION['nombre'] . " || " . "<a href='logica/logout.php'>salir</a>";
		}
		else {
			echo "<a href='mostrarRegistro.php'>Entrar/Registrarse</a>";
		}
	}
?>