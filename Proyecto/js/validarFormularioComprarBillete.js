function validarForm(formulario) {

	//----------------Validacion origen-----------------//
	if(formulario.origen.value.length==0 ) { 
		formulario.origen.focus();    // Damos el foco al control
		//alert('Debe seleccionar un origen.'); //Mostramos el mensaje
		document.getElementById("error").style.color = "#FF5733";
		document.getElementById("error").innerHTML = "Debe seleccionar un origen.";
		formulario.origen.style.background="#FFFF00";
		
		return false; //devolvemos el foco
	}
	else{
		formulario.origen.style.background="#FFFFFF";
	}
	
	if(formulario.destino.value.length==0 ) {	//----------------Validacion destino-----------------// 
		formulario.destino.focus();    // Damos el foco al control
		//alert('Debe seleccionar un destino.'); //Mostramos el mensaje
		document.getElementById("error").style.color = "#FF5733";
		document.getElementById("error").innerHTML = "Debe seleccionar un destino.";
		formulario.destino.style.background="#FFFF00";
		
		return false; //devolvemos el foco
	}
	else{
		formulario.destino.style.background="#FFFFFF";
	}
	
	//----------------Validacion dos ciudades iguales-----------------//
	if(formulario.origen.value==formulario.destino.value) {
		//alert('Debe seleccionar ciudades diferentes.'); //Mostramos el mensaje
		document.getElementById("error").style.color = "#FF5733";	
		document.getElementById("error").innerHTML = "Debe seleccionar ciudades diferentes..";
		formulario.origen.style.background="#FFFF00";
		formulario.destino.style.background="#FFFF00";
		return false; //devolvemos el foco
	}	
	else{
		formulario.origen.style.background="#FFFFFF";
		formulario.destino.style.background="#FFFFFF";
	}
	
	
	//----------------Validacion fecha-----------------//
	if(formulario.fecha.value.length==0) { //¿Tiene 0 caracteres?
		formulario.fecha.focus();    // Damos el foco al control
		//alert('Debe seleccionar una fecha.'); //Mostramos el mensaje
		document.getElementById("error").style.color = "#FF5733";
		document.getElementById("error").innerHTML = "Debe seleccionar una fecha.";
		formulario.fecha.style.background="#FFFF00";
		return false; //devolvemos el foco
	}
	else if (!(/^(\d{4}\-\d{2}\-\d{2})+$/.test(formulario.fecha.value))) {
	//Comprobación de formato de fecha
		//alert('Por favor, introduzca la fecha con este formato: (AAAA-MM-DD)');
		document.getElementById("error").style.color = "#FF5733";
		document.getElementById("error").innerHTML = "Por favor, introduzca la fecha con este formato: (AAAA-MM-DD)";
		formulario.fecha.style.background="#FFFF00";
		return false;
	}	
	else{
		formulario.fecha.style.background="#FFFFFF";
	}
	
	
	//----------------validación de días y meses de fecha de finalizacion--------------//
	
	//calculo la fecha de hoy
	hoy=new Date();
	anoactual=hoy.getFullYear();

	//calculo la fecha que recibo
	//La descompongo en un array
	var array_fecha = formulario.fecha.value.split("-");
	//si el array no tiene tres partes, la fecha es incorrecta
	if (array_fecha.length!=3){
		return false;
	}
	//compruebo que el año(ano), mes, dia son correctos
	var ano;
	ano = parseInt(array_fecha[0]);
	//alert (ano);
	if (isNaN(ano)){
		return false;
	}

	if ( ( ano % 100 == 0) && ((ano % 4 != 0) || (ano % 400 != 0))) {
		return false;
	}

	var mes;

	mes = parseInt(array_fecha[1]);
	//	alert (mes);
	if (isNaN(mes)){
		return false;
	}

	var dia;

	dia = parseInt(array_fecha[2]);
	//	 alert (dia);
	if (isNaN(dia)){
		return false;
	}


	var numDias = 0;
	switch(mes){
		case 1: case 3: case 5: case 7: case 8: case 10: case 12:
			numDias=31;
			break;

		case 4: case 6: case 9: case 11:
			numDias=30;
			break;

		case 2:
			if (ano){ 
				numDias=29 
			}else { 
				numDias=28
			};
			break;

		default:
			//alert('Has introducido un mes incorrecto.');
			document.getElementById("error").style.color = "#FF5733";
			document.getElementById("error").innerHTML = "Has introducido un mes incorrecto.";
			formulario.fecha.style.background="#FFFF00";		
			return false;
	}
	if (dia>numDias || dia==0){
		//alert('Has introducido un d\355a incorrecto.');
		document.getElementById("error").style.color = "#FF5733";
		document.getElementById("error").innerHTML = "Has introducido un d\355a incorrecto.";
		formulario.fecha.style.background="#FFFF00";
		return false;
	}
	else{
		formulario.fecha.style.background="#FFFFFF";
	}
	
	//----------------Validacion fecha si es menor-----------------//
	//fecha actual
	var f = new Date();
	var dia = f.getDate();
	var mes = f.getMonth()+1;
		
	if(mes == 1 || mes == 2 || mes == 3 || mes == 4 || mes == 5 || mes == 6 || mes == 7 || mes == 8 || mes == 9){
		mes= "0"+mes;
	}
	//alert ("Este es el mes: "+mes);
	
	if(dia == 1 || dia == 2 || dia == 3 || dia == 4 || dia == 5 || dia == 6 || dia == 7 || dia == 8 || dia == 9){
		dia= "0"+dia;
	}
	
	//document.write(f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear());
	var fechaActual= f.getFullYear() + "-" + mes + "-" + dia;
	if(formulario.fecha.value < fechaActual) { //¿Tiene 0 caracteres?
		formulario.fecha.focus();    // Damos el foco al control
		//alert('No puede seleccionar una fecha anterior a la actual.'); //Mostramos el mensaje
		document.getElementById("error").style.color = "#FF5733";
		document.getElementById("error").innerHTML = "No puede seleccionar una fecha anterior a la actual.";
		formulario.fecha.style.background="#FFFF00";
		
		return false; //devolvemos el foco
	}
	else{
		formulario.fecha.style.background="#FFFFFF";
	}
	//alert(fechaActual); //mensaje con fecha actual.		




	//----------------Validacion suplementos-----------------//
	if(formulario.suplementos.value.length==0 ) { 
		formulario.suplementos.focus();    // Damos el foco al control
		//alert('Debe seleccionar suplemento.'); //Mostramos el mensaje
		document.getElementById("error").style.color = "#FF5733";
		document.getElementById("error").innerHTML = "Debe seleccionar suplemento.";
		formulario.suplementos.style.background="#FFFF00";
		
		return false; //devolvemos el foco
	}
	else{
		formulario.suplementos.style.background="#FFFFFF";
	}

	
}

