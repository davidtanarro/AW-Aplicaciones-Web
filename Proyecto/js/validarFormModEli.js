function validarForm(index) {

	//----------------Validacion dos ciudades iguales o campos vacíos-----------------//
	if(index.origen.value==index.destino.value && (index.origen.value.length!=0 || index.destino.value.length!=0)) {
		alert('Debe seleccionar ciudades diferentes.'); //Mostramos el mensaje
		return false; //devolvemos el foco
	}
	
	//----------------Comprobación de formato de hora-----------------//
	if (!(/^(\d{2}\:\d{2})+$/.test(index.hora.value)) && index.hora.value.length!=0){
		alert('Por favor, introduzca la hora con este formato: (HH:MM)');
		return false;
	}
	
	var a=index.hora.value.charAt(0); //<=2
	var b=index.hora.value.charAt(1); //<4
	var c=index.hora.value.charAt(2); //:
	var d=index.hora.value.charAt(3); //<=5 
	
	//para comprobar si la hora introducida es correcta
	if ((a==2 && b>3) || (a>2)) {
		alert("La hora introducida es incorrecta, introduzca un digito entre 00 y 23");
		return false;
	}
	
	//para comprobar si los minutos introducidos son correctos
	if (d>5) {
		alert("Los minutos introducidos son incorrectos, introduzca un digito entre 00 y 59");
		return false;
	} 
	
	//----------------Comprobación de formato de precio-----------------//
	if(isNaN(index.precio.value) && index.precio.value.length!=0) { 
		index.precio.focus();    // Damos el foco al control
		alert('S\u00f3lo se admiten n\u00fameros como precio.'); //Mostramos el mensaje
		return false; //devolvemos el foco
	}
	
	//solo se admiten 4 cifras como precio
	if(index.precio.value.length>=5 ) { //¿Tiene 0 caracteres?
		index.precio.focus();    // Damos el foco al control
		alert('Por favor, introduzca un precio con un m\341ximo de 4 caracteres'); //Mostramos el mensaje
		return false; //devolvemos el foco
	}	

	//----------------Comprobación de formato de fecha-----------------//
	if(index.fecha.value.length == 0){
		return true;
	}
	else if (!(/^(\d{4}\/\d{2}\/\d{2})+$/.test(index.fecha.value))){
	
		alert('Por favor, introduzca la fecha con este formato: (AAAA/MM/DD)');
		return false;
	}
	
	//----------------validación de días y meses de fecha--------------//	
	//calculo la fecha de hoy
	hoy=new Date();
	anoactual=hoy.getFullYear();

	//calculo la fecha que recibo
	//La descompongo en un array
	var array_fecha = index.fecha.value.split("/");
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
		alert('Has introducido un mes incorrecto.');
		return false;
	}
	if (dia>numDias || dia==0){
		alert('Has introducido un d\355a incorrecto.');
		return false;
	}
	
	//----------------Validacion fecha si es menor-----------------//
	//fecha actual
	var f = new Date();
	var dia = f.getDate();
	if(dia == 1 || dia == 2 || dia == 3 || dia == 4 || dia == 5 || dia == 6 || dia == 7 || dia == 8 || dia == 9){
		dia= "0"+dia;
	}
	//document.write(f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear());
	var fechaActual= f.getFullYear() + "/" + (f.getMonth() +1) + "/" + dia;
	if(index.fecha.value < fechaActual) { //¿Tiene 0 caracteres?
		index.fecha.focus();    // Damos el foco al control
		alert('No puede seleccionar una fecha anterior a la actual.'); //Mostramos el mensaje
		return false; //devolvemos el foco
	}
	//alert(fechaActual); //mensaje con fecha actual.
	
}