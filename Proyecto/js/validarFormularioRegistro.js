function validarForm(formulario) {

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
	}else if (!(/^[a-zA-Z\u00f1\u00d1\u00e1\u00e9\u00ed\u00f3\u00fa\u00c1\u00c9\u00cd\u00d3\u00da\u00f1\u00d1\s]+$/.test(formulario.nombre.value))){
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
	}else if (!(/^[a-zA-Z\u00f1\u00d1\u00e1\u00e9\u00ed\u00f3\u00fa\u00c1\u00c9\u00cd\u00d3\u00da\u00f1\u00d1\s]+$/.test(formulario.apellido1.value))){
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
	}else if (!(/^[a-zA-Z\u00f1\u00d1\u00e1\u00e9\u00ed\u00f3\u00fa\u00c1\u00c9\u00cd\u00d3\u00da\u00f1\u00d1\s]+$/.test(formulario.apellido2.value))){
		//alert("Por favor, utilice s\363lo letras como segundo apellido.");
		document.getElementById("error").style.color = "#FF0000";
		document.getElementById("error").innerHTML = "Por favor, utilice s\363lo letras como segundo apellido.";
		formulario.apellido2.style.background="#FFFF00";
		return false;
	}else{
		formulario.apellido2.style.background="#FFFFFF";
	}
	
	//----------------Validacion dirección-----------------//
	if(formulario.direccion.value.length==0) { 
		formulario.direccion.focus();    // Damos el foco al control
		//alert('Debe escribir una direcci\u00f3n.'); //Mostramos el mensaje
		document.getElementById("error").style.color = "#FF0000";
		document.getElementById("error").innerHTML = "Debe escribir una direcci\u00f3n.";
		formulario.direccion.style.background="#FFFF00";
		return false; //devolvemos el foco
	}else if(formulario.direccion.value.length>=25 ) { //solo se admiten 24 cifras como direccion
		formulario.direccion.focus();    // Damos el foco al control
		//alert('Por favor, introduzca una direcci\u00f3n con un m\341ximo de 24 caracteres.'); //Mostramos el mensaje
		document.getElementById("error").style.color = "#FF0000";
		document.getElementById("error").innerHTML = "Por favor, introduzca una direcci\u00f3n con un m\341ximo de 24 caracteres.";
		formulario.direccion.style.background="#FFFF00";
		return false; //devolvemos el foco
	}else if (!(/^[a-zA-Z\u00f1\u00d1\u00e1\u00e9\u00ed\u00f3\u00fa\u00c1\u00c9\u00cd\u00d3\u00da\u00f1\u00d1\s]+$/.test(formulario.direccion.value))){	//solo letras
		//alert("Por favor, utilice s\363lo letras como direcci\u00f3n.");
		document.getElementById("error").style.color = "#FF0000";
		document.getElementById("error").innerHTML = "Por favor, utilice s\363lo letras como direcci\u00f3n.";
		formulario.direccion.style.background="#FFFF00";
		return false;
	}else{
		formulario.direccion.style.background="#FFFFFF";
	}
	
	//----------------Validacion numero de dirección-----------------//
	if(formulario.numero.value.length==0 ) { 
		formulario.numero.focus();    // Damos el foco al control
		//alert('Debe escribir un n\372mero.'); //Mostramos el mensaje
		document.getElementById("error").style.color = "#FF0000";
		document.getElementById("error").innerHTML = "Debe escribir un n\372mero.";
		formulario.numero.style.background="#FFFF00";
		return false; //devolvemos el foco
	}else if(formulario.numero.value.length>=5 ) { //solo se admiten 4 cifras como numero direccion
		formulario.numero.focus();    // Damos el foco al control
		//alert('Por favor, introduzca un n\372mero con un m\341ximo de 4 caracteres.'); //Mostramos el mensaje
		document.getElementById("error").style.color = "#FF0000";
		document.getElementById("error").innerHTML = "Por favor, introduzca un n\372mero con un m\341ximo de 4 caracteres.";
		formulario.numero.style.background="#FFFF00";
		return false; //devolvemos el foco
	}else if (!(/^[0-9\u00f1\u00d1\s]+$/.test(formulario.numero.value))){	//casilla numero solo admite numeros
		//alert("Por favor, utilice s\363lo n\372meros.");
		document.getElementById("error").style.color = "#FF0000";
		document.getElementById("error").innerHTML = "Por favor, utilice s\363lo n\372meros.";
		formulario.numero.style.background="#FFFF00";
		return false;
	}else{
		formulario.numero.style.background="#FFFFFF";
	}
	
	
	//----------------Validacion codigo Postal-----------------//
	if(formulario.codigo_postal.value.length==0 ) { 
		formulario.codigo_postal.focus();    // Damos el foco al control
		//alert('Debe escribir un c\u00f3digo postal.'); //Mostramos el mensaje
		document.getElementById("error").style.color = "#FF0000";
		document.getElementById("error").innerHTML = "Debe escribir un c\u00f3digo postal.";
		formulario.codigo_postal.style.background="#FFFF00";
		return false; //devolvemos el foco
	}else if (!(/^[0-9\u00f1\u00d1\s]+$/.test(formulario.codigo_postal.value))){
		//alert("Por favor, utilice s\363lo n\372meros como c\u00f3digo postal.");
		document.getElementById("error").style.color = "#FF0000";
		document.getElementById("error").innerHTML = "Por favor, utilice s\363lo n\372meros como c\u00f3digo postal.";
		formulario.codigo_postal.style.background="#FFFF00";
		return false;
	}else if(formulario.codigo_postal.value.length>=6 ) { //solo se admiten 5 cifras como codigo_postal de direccion
		formulario.codigo_postal.focus();    // Damos el foco al control
		//alert('Por favor, introduzca un c\u00f3digo postal de 5 caracteres.'); //Mostramos el mensaje
		document.getElementById("error").style.color = "#FF0000";
		document.getElementById("error").innerHTML = "Por favor, introduzca un c\u00f3digo postal de 5 caracteres.";
		formulario.codigo_postal.style.background="#FFFF00";
		return false; //devolvemos el foco
	}else if(formulario.codigo_postal.value.length<=4 ) { //¿Tiene 0 caracteres?
		formulario.codigo_postal.focus();    // Damos el foco al control
		//alert('Por favor, introduzca un c\u00f3digo postal de 5 caracteres.'); //Mostramos el mensaje
		document.getElementById("error").style.color = "#FF0000";
		document.getElementById("error").innerHTML = "Por favor, introduzca un c\u00f3digo postal de 5 caracteres.";
		formulario.codigo_postal.style.background="#FFFF00";
		return false; //devolvemos el foco
	}else{
		formulario.codigo_postal.style.background="#FFFFFF";
	}

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
		document.getElementById("error").style.color = "#FF0000";
		document.getElementById("error").innerHTML = "El DNI es incorrecto.";
		formulario.dni.style.background="#FFFF00";
			formulario.dni.focus();
			return false;
		}
	}
	//alert("Nif válido");
	

	//----------------Validacion Telefono-----------------//
	if(formulario.contacto.value.length==0 ) { 
		formulario.contacto.focus();    // Damos el foco al control
		//alert('Debe escribir un n\372mero de contacto.'); //Mostramos el mensaje
		document.getElementById("error").style.color = "#FF0000";
		document.getElementById("error").innerHTML = "Debe escribir un n\372mero de contacto.";
		formulario.contacto.style.background="#FFFF00";
		return false; //devolvemos el foco
	}else if (!(/^[0-9\u00f1\u00d1\s]+$/.test(formulario.contacto.value))){
		//alert("Por favor, utilice s\363lo n\372meros como Telefono.");
		document.getElementById("error").style.color = "#FF0000";
		document.getElementById("error").innerHTML = "Por favor, utilice s\363lo n\372meros como Telefono.";
		formulario.dni.style.background="#FFFF00";
		return false;
	}else if(formulario.contacto.value.length>=10 ) { //solo se admiten 9 cifras como contacto
		formulario.contacto.focus();    // Damos el foco al control
		//alert('Por favor, introduzca un n\372mero de contacto con 9 caracteres.'); //Mostramos el mensaje
		document.getElementById("error").style.color = "#FF0000";
		document.getElementById("error").innerHTML = "Por favor, introduzca un n\372mero de contacto con 9 caracteres.";
		formulario.contacto.style.background="#FFFF00";
		return false; //devolvemos el foco
	}else if(formulario.contacto.value.length<=8 ) { //solo se admiten 9 cifras como contacto
		formulario.contacto.focus();    // Damos el foco al control
		//alert('Por favor, introduzca un n\372mero de contacto con 9 caracteres.'); //Mostramos el mensaje
		document.getElementById("error").style.color = "#FF0000";
		document.getElementById("error").innerHTML = "Por favor, introduzca un n\372mero de contacto con 9 caracteres.";
		formulario.contacto.style.background="#FFFF00";
		return false; //devolvemos el foco
	}else{
		formulario.contacto.style.background="#FFFFFF";
	}
	
	//----------------Validacion email-----------------//
	var filtro = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/; 
	if(formulario.email.value.length==0) { 
		formulario.email.focus();    // Damos el foco al control
		//alert('No has escrito tu email'); //Mostramos el mensaje
		document.getElementById("error").style.color = "#FF0000";
		document.getElementById("error").innerHTML = "No has escrito tu email.";
		formulario.email.style.background="#FFFF00";
		return false; //devolvemos el foco
	}else if (!(filtro).test(formulario.email.value)) {
		//alert('No has escrito bien tu email'); //Mostramos el mensaje
		document.getElementById("error").style.color = "#FF0000";
		document.getElementById("error").innerHTML = "No has escrito bien tu email.";
		formulario.email.style.background="#FFFF00";
		return false; //devolvemos el foco
	}else{
		formulario.email.style.background="#FFFFFF";
	}
	
	//----------------Validacion Nick-----------------//
	if(formulario.nick.value.length==0 ) { 
		formulario.nick.focus();    // Damos el foco al control
		//alert('Debe escribir un nick.'); //Mostramos el mensaje
		document.getElementById("error").style.color = "#FF0000";
		document.getElementById("error").innerHTML = "Debe escribir un nick.";
		formulario.nick.style.background="#FFFF00";
		return false; //devolvemos el foco
	}else if(formulario.nick.value.length>=21 ) { //solo se admiten 10 cifras como nick
		formulario.nick.focus();    // Damos el foco al control
		//alert('Por favor, introduzca un nick con un m\341ximo de 20 caracteres'); //Mostramos el mensaje
		document.getElementById("error").style.color = "#FF0000";
		document.getElementById("error").innerHTML = "Por favor, introduzca un nick con un m\341ximo de 20 caracteres.";
		formulario.nick.style.background="#FFFF00";
		return false; //devolvemos el foco
	}else if (!(/^[a-zA-Z0-9\u00f1\u00d1\ÑñáéíóúÁÉÍÓÚs]+$/.test(formulario.nick.value))){
		//alert("Por favor, utilice s\363lo letras y n\372meros como nombre de usuario.");
		document.getElementById("error").style.color = "#FF0000";
		document.getElementById("error").innerHTML = "Por favor, utilice s\363lo letras y n\372meros como nombre de usuario.";
		formulario.nick.style.background="#FFFF00";
		return false;
	}else{
		formulario.nick.style.background="#FFFFFF";
	}

	//----------------Validacion contraseña-----------------//
	if(formulario.password.value.length<=5 || formulario.password.value.length>=21 ) { //¿Tiene 0 caracteres?
		formulario.password.focus();    // Damos el foco al control
		//alert('Por favor, introduzca una contrase\361a con un m\355nimo de 6 caracteres y un m\341ximo 21'); //Mostramos el mensaje
		document.getElementById("error").style.color = "#FF0000";
		document.getElementById("error").innerHTML = "Por favor, introduzca una contrase\361a con un m\355nimo de 6 caracteres y un m\341ximo 21.";
		formulario.password.style.background="#FFFF00";
		return false; //devolvemos el foco
	}else if (!(/^([a-zA-Z0-9_.\u00f1\u00d1\ÑñáéíóúÁÉÍÓÚs])+$/.test(formulario.password.value))){
		//alert("Por favor, utilice s\363lo letras, n\372meros, barra baja o puntos.");
		document.getElementById("error").style.color = "#FF0000";
		document.getElementById("error").innerHTML = "Por favor, utilice s\363lo letras, n\372meros, barra baja o puntos.";
		formulario.password.style.background="#FFFF00";
		return false;
	}else{
		formulario.password.style.background="#FFFFFF";
	}

}

function validarFormUsuario(formularioLogin) {

	//----------------Validacion Nick-----------------//
	if(formularioLogin.usuario.value.length==0 ) { 
		formularioLogin.usuario.focus();    // Damos el foco al control
		//alert('Debe escribir un usuario.'); //Mostramos el mensaje
		document.getElementById("errorLogin").style.color = "#FF0000";
		document.getElementById("errorLogin").innerHTML = "Debe escribir un usuario.";
		formularioLogin.usuario.style.background="#FFFF00";
		return false; //devolvemos el foco
	}else if(formularioLogin.usuario.value.length>=21 ) { //solo se admiten 10 cifras como usuario
		formularioLogin.usuario.focus();    // Damos el foco al control
		//alert('Por favor, introduzca un usuario con un m\341ximo de 20 caracteres'); //Mostramos el mensaje
		document.getElementById("errorLogin").style.color = "#FF0000";
		document.getElementById("errorLogin").innerHTML = "Por favor, introduzca un usuario con un m\341ximo de 20 caracteres.";
		formularioLogin.usuario.style.background="#FFFF00";
		return false; //devolvemos el foco
	}else if (!(/^[a-zA-Z0-9\u00f1\u00d1\ÑñáéíóúÁÉÍÓÚs]+$/.test(formularioLogin.usuario.value))){
		//alert("Por favor, utilice s\363lo letras y n\372meros como nombre de usuario.");
		document.getElementById("errorLogin").style.color = "#FF0000";
		document.getElementById("errorLogin").innerHTML = "Por favor, utilice s\363lo letras y n\372meros como nombre de usuario.";
		formularioLogin.usuario.style.background="#FFFF00";
		return false;
	}else{
		formularioLogin.usuario.style.background="#FFFFFF";
	}

	//----------------Validacion contraseña-----------------//
	if(formularioLogin.clave.value.length<=5 || formularioLogin.clave.value.length>=21 ) { //¿Tiene 0 caracteres?
		formularioLogin.clave.focus();    // Damos el foco al control
		//alert('Por favor, introduzca una contrase\361a con un m\355nimo de 6 caracteres y un m\341ximo 21'); //Mostramos el mensaje
		document.getElementById("errorLogin").style.color = "#FF0000";
		document.getElementById("errorLogin").innerHTML = "Por favor, introduzca una contrase\361a con un m\355nimo de 6 caracteres y un m\341ximo 21.";
		formularioLogin.clave.style.background="#FFFF00";
		return false; //devolvemos el foco
	}else if (!(/^([a-zA-Z0-9_.\u00f1\u00d1\ÑñáéíóúÁÉÍÓÚs])+$/.test(formularioLogin.clave.value))){
		//alert("Por favor, utilice s\363lo letras, n\372meros, barra baja o puntos.");
		document.getElementById("errorLogin").style.color = "#FF0000";
		document.getElementById("errorLogin").innerHTML = "Por favor, utilice s\363lo letras, n\372meros, barra baja o puntos.";
		formularioLogin.clave.style.background="#FFFF00";
		return false;
	}else{
		formularioLogin.clave.style.background="#FFFFFF";
	}

}

