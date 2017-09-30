function bus(asientos){

	$(function () {
		var settings = {
			rows: 4,
			cols: 15,
			rowCssPrefix: 'row-',
			colCssPrefix: 'col-',
			seatWidth: 54,
			seatHeight: 55,
			seatCss: 'seat',
			selectedSeatCss: 'selectedSeat',
			selectingSeatCss: 'selectingSeat'
		};

		//Pintame el tablero con asientos
		var init = function (reservedSeat) {
			var str = [], seatNo, className;
			for (i = 0; i < settings.rows; i++) {
				for (j = 0; j < settings.cols; j++) {
					seatNo = (i + j * settings.rows + 1);
					className = settings.seatCss + ' ' + settings.rowCssPrefix + i.toString() + ' ' + settings.colCssPrefix + j.toString();
					if ($.isArray(reservedSeat) && $.inArray(seatNo, reservedSeat) != -1) {
						className += ' ' + settings.selectedSeatCss;
					}
					//Pinta el asiento en el tablero
					str.push('<li class="' + className + '"' +
							  'style="top:' + (i * settings.seatHeight).toString() + 'px;left:' + (j * settings.seatWidth).toString() + 'px">' +
							  '<a title="' + seatNo + '">' + seatNo + '</a>' +
							  '</li>');
				}
			}
			$('#place').html(str.join(''));
		};

		
		//traer el array donde guardo los asientos de la bd desde php y meterlo en un array de javascript
		init(asientos);

		$('.' + settings.seatCss).click(function () {
			// Si no hay un asiento ocupado en rojo
			if (!($(this).hasClass(settings.selectedSeatCss))){				
				//Seleccioname el asiento
				$(this).toggleClass(settings.selectingSeatCss);				
			}
			else{
				document.getElementById("error").style.color = "#FF5733";
				document.getElementById("error").innerHTML = "Este asiento ya esta reservado";
				return false; //devolvemos el foco
			}	
		});

		$('#place').click(function () {
			var str;
			$.each($('#place li.' + settings.selectingSeatCss + ' a'), function (index, value) {
				item = $(this).attr('title');    
				
				$('#place li.' + settings.selectingSeatCss + ' a[title=' + document.getElementById('asiento').value + "]").parent().removeClass(settings.selectingSeatCss);
				
				str = item;
				
			});
			document.getElementById('asiento').value = str;
			
			if(str === undefined) { 
				document.getElementById("error").style.color = "#FF5733";
				document.getElementById("error").innerHTML = "Debe seleccionar un asiento";
				return false;
			}
			else{
				document.getElementById("error").style.color = "#04B431";
				document.getElementById("error").innerHTML = "Has seleccionado el asiento: "+str;
			
			}
			
		})
	});
	
}