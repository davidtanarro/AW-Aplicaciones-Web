//Valida el formulario de añadir conductor
function validarFormConductor(formulario) {

	//----------------Validacion nombre-----------------//
	if(formulario.nombre.value.length==0 ) { 
		formulario.nombre.focus();    // Damos el foco al control
		//alert('Debe escribir un nombre.'); //Mostramos el mensaje
		document.getElementById("error").style.color = "#FF0000";
		document.getElementById("error").innerHTML = "Debe escribir un nombre.";
		formulario.nombre.style.background="#FFFF00";
		
		return false; //devolvemos el foco
	}else if(formulario.nombre.value.length>=21 ) { //solo se admiten 20 cifras como nombre
		formulario.nombre.focus();    // Damos el foco al control
		//alert('Por favor, introduzca un nombre con un m\341ximo de 20 caracteres'); //Mostramos el mensaje
		document.getElementById("error").style.color = "#FF0000";
		document.getElementById("error").innerHTML = "Por favor, introduzca un nombre con un m\341ximo de 20 caracteres";
		formulario.nombre.style.background="#FFFF00";
		
		return false; //devolvemos el foco
	}else if (!(/^[a-zA-Z\u00f1\u00d1\ÑñáéíóúÁÉÍÓÚs]+$/.test(formulario.nombre.value))){
		document.getElementById("error").style.color = "#FF0000";
		document.getElementById("error").innerHTML = "Por favor, utilice s\363lo letras como nombre.";
		formulario.nombre.style.background="#FFFF00";
		//alert("Por favor, utilice s\363lo letras como nombre.");
		return false;
	}
	else{
		formulario.nombre.style.background="#FFFFFF";
	}
	
	//----------------Validacion apellido 1-----------------//
	if(formulario.apellido1.value.length==0 ) { 
		formulario.apellido1.focus();    // Damos el foco al control
		//alert('Debe escribir un primer apellido.'); //Mostramos el mensaje
		document.getElementById("error").style.color = "#FF0000";
		document.getElementById("error").innerHTML = "Debe escribir un primer apellido.";
		formulario.apellido1.style.background="#FFFF00";
		return false; //devolvemos el foco
	}else if(formulario.apellido1.value.length>=11 ) { //solo se admiten 10 cifras como apellido
		formulario.apellido1.focus();    // Damos el foco al control
		//alert('Por favor, introduzca un primer apellido con un m\341ximo de 10 caracteres'); //Mostramos el mensaje
		document.getElementById("error").style.color = "#FF0000";
		document.getElementById("error").innerHTML = "Por favor, introduzca un primer apellido con un m\341ximo de 10 caracteres.";
		formulario.apellido1.style.background="#FFFF00";
		return false; //devolvemos el foco
	}else if (!(/^[a-zA-Z\u00f1\u00d1\ÑñáéíóúÁÉÍÓÚs]+$/.test(formulario.apellido1.value))){
		//alert("Por favor, utilice s\363lo letras como primer apellido.");
		document.getElementById("error").style.color = "#FF0000";
		document.getElementById("error").innerHTML = "Por favor, utilice s\363lo letras como primer apellido.";
		formulario.apellido1.style.background="#FFFF00";
		return false;
	}else{
		formulario.apellido1.style.background="#FFFFFF";
	}

	//----------------Validacion apellido 2-----------------//
	if(formulario.apellido2.value.length==0 ) { 
		formulario.apellido2.focus();    // Damos el foco al control
		//alert('Debe escribir un segundo apellido.'); //Mostramos el mensaje
		document.getElementById("error").style.color = "#FF0000";
		document.getElementById("error").innerHTML = "Debe escribir un segundo apellido.";
		formulario.apellido2.style.background="#FFFF00";
		return false; //devolvemos el foco
	}else if(formulario.apellido2.value.length>=11 ) { //solo se admiten 10 cifras como apellido
		formulario.apellido2.focus();    // Damos el foco al control
		//alert('Por favor, introduzca un segundo apellido con un m\341ximo de 10 caracteres'); //Mostramos el mensaje
		document.getElementById("error").style.color = "#FF0000";
		document.getElementById("error").innerHTML = "Por favor, introduzca un segundo apellido con un m\341ximo de 10 caracteres.";
		formulario.apellido2.style.background="#FFFF00";
		return false; //devolvemos el foco
	}else if (!(/^[a-zA-Z\u00f1\u00d1\ÑñáéíóúÁÉÍÓÚs]+$/.test(formulario.apellido2.value))){
		//alert("Por favor, utilice s\363lo letras como segundo apellido.");
		document.getElementById("error").style.color = "#FF0000";
		document.getElementById("error").innerHTML = "Por favor, utilice s\363lo letras como segundo apellido.";
		formulario.apellido2.style.background="#FFFF00";
		return false;
	}else{
		formulario.apellido2.style.background="#FFFFFF";
	}
	
	//----------------Validacion fechaContratacion-----------------//
	if(formulario.fechaContratacion.value.length==0) { //¿Tiene 0 caracteres?
		formulario.fechaContratacion.focus();    // Damos el foco al control
		//alert('Debe seleccionar una fechaContratacion.'); //Mostramos el mensaje
		document.getElementById("error").style.color = "#FF5733";
		document.getElementById("error").innerHTML = "Debe seleccionar una fecha.";
		formulario.fechaContratacion.style.background="#FFFF00";
		return false; //devolvemos el foco
	}
	else if (!(/^(\d{4}\-\d{2}\-\d{2})+$/.test(formulario.fechaContratacion.value))) {
	//Comprobación de formato de fecha
		//alert('Por favor, introduzca la fechaContratacion con este formato: (AAAA-MM-DD)');
		document.getElementById("error").style.color = "#FF5733";
		document.getElementById("error").innerHTML = "Por favor, introduzca la fecha con este formato: (AAAA-MM-DD)";
		formulario.fechaContratacion.style.background="#FFFF00";
		return false;
	}	
	else{
		formulario.fechaContratacion.style.background="#FFFFFF";
	}
	
	
	//----------------validación de días y meses de fecha de finalizacion--------------//
	
	//calculo la fecha de hoy
	hoy=new Date();
	anoactual=hoy.getFullYear();

	//calculo la fecha que recibo
	//La descompongo en un array
	var array_fecha = formulario.fechaContratacion.value.split("-");
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
			formulario.fechaContratacion.style.background="#FFFF00";		
			return false;
	}
	if (dia>numDias || dia==0){
		//alert('Has introducido un d\355a incorrecto.');
		document.getElementById("error").style.color = "#FF5733";
		document.getElementById("error").innerHTML = "Has introducido un d\355a incorrecto.";
		formulario.fechaContratacion.style.background="#FFFF00";
		return false;
	}
	else{
		formulario.fechaContratacion.style.background="#FFFFFF";
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
	if(formulario.fechaContratacion.value < fechaActual) { //¿Tiene 0 caracteres?
		formulario.fechaContratacion.focus();    // Damos el foco al control
		//alert('No puede seleccionar una fecha anterior a la actual.'); //Mostramos el mensaje
		document.getElementById("error").style.color = "#FF5733";
		document.getElementById("error").innerHTML = "No puede seleccionar una fecha anterior a la actual.";
		formulario.fechaContratacion.style.background="#FFFF00";
		
		return false; //devolvemos el foco
	}
	else{
		formulario.fechaContratacion.style.background="#FFFFFF";
	}
	//alert(fechaActual); //mensaje con fecha actual.			

}

//Valida el formulario de añadir viaje
function validarFormViaje(formulario) {

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
	
	//----------------Validacion fechaSalida-----------------//
	if(formulario.fechaSalida.value.length==0) { //¿Tiene 0 caracteres?
		formulario.fechaSalida.focus();    // Damos el foco al control
		//alert('Debe seleccionar una fecha.'); //Mostramos el mensaje
		document.getElementById("error").style.color = "#FF5733";
		document.getElementById("error").innerHTML = "Debe seleccionar una fecha de salida.";
		formulario.fechaSalida.style.background="#FFFF00";
		return false; //devolvemos el foco
	}
	else if (!(/^(\d{4}\-\d{2}\-\d{2})+$/.test(formulario.fechaSalida.value))) {
	//Comprobación de formato de fecha
		//alert('Por favor, introduzca la fecha con este formato: (AAAA-MM-DD)');
		document.getElementById("error").style.color = "#FF5733";
		document.getElementById("error").innerHTML = "Por favor, introduzca la fecha con este formato: (AAAA-MM-DD)";
		formulario.fechaSalida.style.background="#FFFF00";
		return false;
	}	
	else{
		formulario.fechaSalida.style.background="#FFFFFF";
	}
	
	
	//----------------validación de días y meses de fecha de finalizacion--------------//
	
	//calculo la fecha de hoy
	hoy=new Date();
	anoactual=hoy.getFullYear();

	//calculo la fecha que recibo
	//La descompongo en un array
	var array_fecha = formulario.fechaSalida.value.split("-");
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
			formulario.fechaSalida.style.background="#FFFF00";		
			return false;
	}
	if (dia>numDias || dia==0){
		//alert('Has introducido un d\355a incorrecto.');
		document.getElementById("error").style.color = "#FF5733";
		document.getElementById("error").innerHTML = "Has introducido un d\355a incorrecto.";
		formulario.fechaSalida.style.background="#FFFF00";
		return false;
	}
	else{
		formulario.fechaSalida.style.background="#FFFFFF";
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
	if(formulario.fechaSalida.value < fechaActual) { //¿Tiene 0 caracteres?
		formulario.fechaSalida.focus();    // Damos el foco al control
		//alert('No puede seleccionar una fecha anterior a la actual.'); //Mostramos el mensaje
		document.getElementById("error").style.color = "#FF5733";
		document.getElementById("error").innerHTML = "No puede seleccionar una fecha anterior a la actual.";
		formulario.fechaSalida.style.background="#FFFF00";
		
		return false; //devolvemos el foco
	}
	else{
		formulario.fechaSalida.style.background="#FFFFFF";
	}
	//alert(fechaActual); //mensaje con fecha actual.			
	

	//----------------Validacion fechaFinalizacion-----------------//
	if(formulario.fechaFinalizacion.value.length==0) { //¿Tiene 0 caracteres?
		formulario.fechaFinalizacion.focus();    // Damos el foco al control
		//alert('Debe seleccionar una fecha.'); //Mostramos el mensaje
		document.getElementById("error").style.color = "#FF5733";
		document.getElementById("error").innerHTML = "Debe seleccionar una fecha final.";
		formulario.fechaFinalizacion.style.background="#FFFF00";
		return false; //devolvemos el foco
	}
	else if (!(/^(\d{4}\-\d{2}\-\d{2})+$/.test(formulario.fechaFinalizacion.value))) {
	//Comprobación de formato de fecha
		//alert('Por favor, introduzca la fecha con este formato: (AAAA-MM-DD)');
		document.getElementById("error").style.color = "#FF5733";
		document.getElementById("error").innerHTML = "Por favor, introduzca la fecha con este formato: (AAAA-MM-DD)";
		formulario.fechaFinalizacion.style.background="#FFFF00";
		return false;
	}	
	else{
		formulario.fechaFinalizacion.style.background="#FFFFFF";
	}
	
	
	//----------------validación de días y meses de fecha de finalizacion--------------//
	
	//calculo la fecha de hoy
	hoy=new Date();
	anoactual=hoy.getFullYear();

	//calculo la fecha que recibo
	//La descompongo en un array
	var array_fecha = formulario.fechaFinalizacion.value.split("-");
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
			formulario.fechaFinalizacion.style.background="#FFFF00";		
			return false;
	}
	if (dia>numDias || dia==0){
		//alert('Has introducido un d\355a incorrecto.');
		document.getElementById("error").style.color = "#FF5733";
		document.getElementById("error").innerHTML = "Has introducido un d\355a incorrecto.";
		formulario.fechaFinalizacion.style.background="#FFFF00";
		return false;
	}
	else{
		formulario.fechaFinalizacion.style.background="#FFFFFF";
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
	if(formulario.fechaFinalizacion.value < fechaActual) { //¿Tiene 0 caracteres?
		formulario.fechaFinalizacion.focus();    // Damos el foco al control
		//alert('No puede seleccionar una fecha anterior a la actual.'); //Mostramos el mensaje
		document.getElementById("error").style.color = "#FF5733";
		document.getElementById("error").innerHTML = "No puede seleccionar una fecha anterior a la actual.";
		formulario.fechaFinalizacion.style.background="#FFFF00";
		
		return false; //devolvemos el foco
	}
	else{
		formulario.fechaFinalizacion.style.background="#FFFFFF";
	}
	//alert(fechaActual); //mensaje con fecha actual.			
	
	
	//----------------Validacion si las fechaFinal es mayor que la fecha salida-----------------//
	if(formulario.fechaSalida.value>formulario.fechaFinalizacion.value) {
		//alert('Debe seleccionar fechas diferentes.'); //Mostramos el mensaje
		document.getElementById("error").style.color = "#FF5733";
		document.getElementById("error").innerHTML = "La fecha de salida no puede ser mayor que la feecha final.";
		formulario.fechaSalida.style.background="#FFFF00";
		formulario.fechaFinalizacion.style.background="#FFFF00";
		return false; //devolvemos el foco
	}else{
		formulario.fechaSalida.style.background="#FFFFFF";
		formulario.fechaFinalizacion.style.background="#FFFFFF";
	}
	
	
	
	//----------------Validacion frecuencia-----------------//
	if(formulario.frecuencia.value.length==0 ) { 
		formulario.frecuencia.focus();    // Damos el foco al control
		//alert('Debe seleccionar una frecuencia.'); //Mostramos el mensaje
		document.getElementById("error").style.color = "#FF5733";
		document.getElementById("error").innerHTML = "Debe seleccionar una frecuencia.";
		formulario.frecuencia.style.background="#FFFF00";
		return false; //devolvemos el foco
	}else{
		formulario.frecuencia.style.background="#FFFFFF";
	}
	
	
	//----------------Validacion numero de autobuses-----------------//
	if(formulario.numBus.value.length==0 ) { 
		formulario.numBus.focus();    // Damos el foco al control
		//alert('Debe escribir un n\372mero de autobuses.'); //Mostramos el mensaje
		document.getElementById("error").style.color = "#FF5733";
		document.getElementById("error").innerHTML = "Debe escribir un n\372mero de autobuses.";
		formulario.numBus.style.background="#FFFF00";
		return false; //devolvemos el foco
	}else if (!(/^[0-9\u00f1\u00d1\s]+$/.test(formulario.numBus.value))){//casilla numero solo admite numeros
		//alert("Por favor, utilice s\363lo n\372meros.");
		document.getElementById("error").style.color = "#FF5733";
		document.getElementById("error").innerHTML = "Por favor, utilice s\363lo n\372meros.";
		return false;
	}else{
		formulario.numBus.style.background="#FFFFFF";
	}
}


//Valida el formulario de añadir viaje con ID conductor
function FormIdConductor(index) {

	//----------------Validacion Id de conductores-----------------//
	//if(index.conductor1.value.length==0 ) { 
	//	index.conductor1.focus();    // Damos el foco al control
	//	alert('Debe seleccionar un ID de un conductor.'); //Mostramos el mensaje
	//	return false; //devolvemos el foco
	//}
	
	
	for (var i = 1; i <= numBus; i++) {
		for (var j = 1; j <= numBus; j++) {
			if (i != j) {
				/*
				alert(array[i]+", "+array[j]);
				alert(index.array[i].value+", "+index.array[j].value);
				
				if(array[i].length==0)  {
					alert('Rellena todos los ID de los conductores.'); //Mostramos el mensaje
					return false; //devolvemos el foco
				}
				
				//index.conductor1.focus();    // Damos el foco al control
				//index.conductor2.focus();    // Damos el foco al control
				
				if(array[i] == array[j]) {
					alert("Por favor, utilice n\372meros ID diferentes."); //Mostramos el mensaje
					return false; //devolvemos el foco
				}
				*/
			}
		}
	}
}


//Valida el formulario de añadir viaje con ID conductor
function FormModViaje(formulario) {

	//----------------Validacion fechaSalida-----------------//
	if(formulario.fechaSalida.value.length==0) { //¿Tiene 0 caracteres?
		formulario.fechaSalida.focus();    // Damos el foco al control
		//alert('Debe seleccionar una fecha.'); //Mostramos el mensaje
		document.getElementById("error").style.color = "#FF5733";
		document.getElementById("error").innerHTML = "Debe seleccionar una fecha de salida.";
		formulario.fechaSalida.style.background="#FFFF00";
		return false; //devolvemos el foco
	}
	else if (!(/^(\d{4}\-\d{2}\-\d{2})+$/.test(formulario.fechaSalida.value))) {
	//Comprobación de formato de fecha
		//alert('Por favor, introduzca la fecha con este formato: (AAAA-MM-DD)');
		document.getElementById("error").style.color = "#FF5733";
		document.getElementById("error").innerHTML = "Por favor, introduzca la fecha con este formato: (AAAA-MM-DD)";
		formulario.fechaSalida.style.background="#FFFF00";
		return false;
	}	
	else{
		formulario.fechaSalida.style.background="#FFFFFF";
	}
	
	
	//----------------validación de días y meses de fecha de finalizacion--------------//
	
	//calculo la fecha de hoy
	hoy=new Date();
	anoactual=hoy.getFullYear();

	//calculo la fecha que recibo
	//La descompongo en un array
	var array_fecha = formulario.fechaSalida.value.split("-");
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
			formulario.fechaSalida.style.background="#FFFF00";		
			return false;
	}
	if (dia>numDias || dia==0){
		//alert('Has introducido un d\355a incorrecto.');
		document.getElementById("error").style.color = "#FF5733";
		document.getElementById("error").innerHTML = "Has introducido un d\355a incorrecto.";
		formulario.fechaSalida.style.background="#FFFF00";
		return false;
	}
	else{
		formulario.fechaSalida.style.background="#FFFFFF";
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
	if(formulario.fechaSalida.value < fechaActual) { //¿Tiene 0 caracteres?
		formulario.fechaSalida.focus();    // Damos el foco al control
		//alert('No puede seleccionar una fecha anterior a la actual.'); //Mostramos el mensaje
		document.getElementById("error").style.color = "#FF5733";
		document.getElementById("error").innerHTML = "No puede seleccionar una fecha anterior a la actual.";
		formulario.fechaSalida.style.background="#FFFF00";
		
		return false; //devolvemos el foco
	}
	else{
		formulario.fechaSalida.style.background="#FFFFFF";
	}
	//alert(fechaActual); //mensaje con fecha actual.	
	
	//----------------Validacion numero de autobuses-----------------//
	if(formulario.numBus.value.length==0 ) { 
		formulario.numBus.focus();    // Damos el foco al control
		//alert('Debe escribir un n\372mero de autobuses.'); //Mostramos el mensaje
		document.getElementById("error").style.color = "#FF5733";
		document.getElementById("error").innerHTML = "Debe escribir un n\372mero de autobuses.";
		formulario.numBus.style.background="#FFFF00";
		return false; //devolvemos el foco
	}else if (!(/^[0-9\u00f1\u00d1\s]+$/.test(formulario.numBus.value))){//casilla numero solo admite numeros
		//alert("Por favor, utilice s\363lo n\372meros.");
		document.getElementById("error").style.color = "#FF5733";
		document.getElementById("error").innerHTML = "Por favor, utilice s\363lo n\372meros.";
		return false;
	}else{
		formulario.numBus.style.background="#FFFFFF";
	}
	
	//----------------Validacion ID del conductor-----------------//
	if(formulario.conductor.value.length==0 ) { 
		formulario.conductor.focus();    // Damos el foco al control
		//alert('Debe escribir un n\372mero de autobuses.'); //Mostramos el mensaje
		document.getElementById("error").style.color = "#FF5733";
		document.getElementById("error").innerHTML = "Debe escribir un n\372mero de ID del conductor.";
		formulario.conductor.style.background="#FFFF00";
		return false; //devolvemos el foco
	}else if (!(/^[0-9\u00f1\u00d1\s]+$/.test(formulario.conductor.value))){//casilla numero solo admite numeros
		//alert("Por favor, utilice s\363lo n\372meros.");
		document.getElementById("error").style.color = "#FF5733";
		document.getElementById("error").innerHTML = "Por favor, utilice s\363lo n\372meros.";
		return false;
	}else{
		formulario.conductor.style.background="#FFFFFF";
	}	
}