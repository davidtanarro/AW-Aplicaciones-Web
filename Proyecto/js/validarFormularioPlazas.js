function validarForm(datosCliente) {

	//----------------Validacion asiento-----------------//
	if(datosCliente.asiento.value.length==0) { 
		datosCliente.asiento.focus();    // Damos el foco al control
		//alert('Debe seleccionar un asiento.'); //Mostramos el mensaje
		document.getElementById("error").style.color = "#FF5733";
		document.getElementById("error").innerHTML = "Debe seleccionar un asiento.";
		return false; //devolvemos el foco
	}
	
	if(datosCliente.asiento.value === 'undefined' ) { 
		datosCliente.asiento.focus();    // Damos el foco al control
		//alert('Debe seleccionar un asiento.'); //Mostramos el mensaje
		document.getElementById("error").style.color = "#FF5733";
		document.getElementById("error").innerHTML = "Debe seleccionar un asiento.";
		return false; //devolvemos el foco
	}
}