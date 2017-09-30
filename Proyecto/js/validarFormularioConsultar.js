function validarFormConsultar(formulario) {
	
	//----------------Validacion si dni está vacío-----------------//
	if(formulario.dni.value.length==0 ) { 
		formulario.dni.focus();    // Damos el foco al control
		//alert('Debe escribir un DNI.'); //Mostramos el mensaje
		document.getElementById("error").style.color = "#FF0000";
		document.getElementById("error").innerHTML = "Debe escribir un DNI.";
		formulario.dni.style.background="#FFFF00";
		return false; //devolvemos el foco
	}else{
		formulario.dni.style.background="#FFFFFF";
	}	
	
	//----------------validación del NIF-------------//
	abc=formulario.dni.value;
	dni=abc.substring(0,abc.length-1);
	let=abc.charAt(abc.length-1);
	if (!isNaN(let)){
		//alert('El DNI es incorrecto.');
		document.getElementById("error").style.color = "#FF0000";
		document.getElementById("error").innerHTML = "El DNI es incorrecto.";
		formulario.dni.style.background="#FFFF00";
		formulario.dni.focus();
		return false;
	}
	else{
		cadena="TRWAGMYFPDXBNJZSQVHLCKET";
		posicion = dni % 23;
		letra = cadena.substring(posicion,posicion+1);
		if (letra!=let.toUpperCase()){
			//alert("El DNI es incorrecto.");
			document.getElementById("error").style.color = "#FF0000";
		document.getElementById("error").innerHTML = "El DNI es incorrecto.";
		formulario.dni.style.background="#FFFF00";
			formulario.dni.focus();
			return false;
		}
	}
	
	//----------------Validacion numero de dirección-----------------//
	if(formulario.localizador.value.length==0 ) { 
		formulario.localizador.focus();    // Damos el foco al control
		//alert('Debe escribir un n\372mero.'); //Mostramos el mensaje
		document.getElementById("error").style.color = "#FF0000";
		document.getElementById("error").innerHTML = "Debe escribir un localizador.";
		formulario.localizador.style.background="#FFFF00";
		return false; //devolvemos el foco
	}else if (!(/^[0-9\u00f1\u00d1\s]+$/.test(formulario.localizador.value))){	//casilla localizador solo admite numeros
		//alert("Por favor, utilice s\363lo n\372meros.");
		document.getElementById("error").style.color = "#FF0000";
		document.getElementById("error").innerHTML = "Por favor, utilice s\363lo n\372meros para el localizador.";
		formulario.localizador.style.background="#FFFF00";
		return false;
	}else{
		formulario.localizador.style.background="#FFFFFF";
	}
	
	
	
}