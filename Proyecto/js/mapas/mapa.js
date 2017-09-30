function mapaOrigen(id) {

	new SpainMap({
		id: 'map',
		width: 360,
		height: 300,
		fillColor: "#FFBF00",
		strokeColor: "#000000",
		strokeWidth: 0.7,
		selectedColor: "#FFFFFF",
		animationDuration: 200,
		
			onClick: function(province, event) {
				var destinoJs = province.name;
				document.getElementById('origen').value = destinoJs;
				//alert("Has seleccionado " + destinoJs);
			}
		

	});

}

function mapaDestino(id) {

	new SpainMap2({
		id: 'map2',
		width: 360,
		height: 300,
		fillColor: "#FFBF00",
		strokeColor: "#000000",
		strokeWidth: 0.7,
		selectedColor: "#FFFFFF",
		animationDuration: 200,
		
			onClick: function(province, event) {
				var destinoJs2 = province.name;
				document.getElementById('destino').value = destinoJs2;
				//alert("Has seleccionado " + destinoJs2);
			}

	});

}

function ocultar_mostrar(div){

	owurl7 = document.getElementById(div);
	//Verificamos si la capa esta oculta o no y como resultado
	//indicamos que cambie su valor distinto al actual. "none" o "block"
	owurl7.style.display!="none"?
	owurl7.style.display="none":owurl7.style.display="block";
	
}