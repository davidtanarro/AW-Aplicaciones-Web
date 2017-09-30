<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Equipaje</title>
	<link rel="shortcut icon" href="img/logo.ico" />
	<link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>

	<?php
		session_start();
		include('mostrar_cabecera.php');
		include('mostrar_toolbar.php');

	?>

	<div class="contenedor_general">

		<div class="cabecera">
			<h1>Equipaje</h1>
		</div>		

		<div class="contenedor_editable_general">

			<p class="titulo_texto">¿Cuánto equipaje me puedo llevar?</p>

			<div class="texto_contenedor_general">
				<p>
					El viajero tiene derecho a transportar gratuitamente hasta 30 Kgs de equipaje, salvo lo dispuesto para líneas internacionales (25Kgs), adecuándose en todo caso a la capacidad de carga de acuerdo con las características técnicas del vehículo. Si necesitas ampliar información dirígete al Punto de Venta más cercano y allí te informarán.
				</p>

			
				<p>
					En la zona destinada para el viaje de los pasajeros (habitáculo) se puede llevar todo aquello que se considere equipaje de mano que no represente una mercancía peligrosa y que quepa en las bandejas situadas encima de los asientos. Debes procurar no situar este equipaje de mano en el pasillo del autobús por motivos de seguridad.
				</p>
				<p>
					Se entenderá por bulto de mano todo pequeño objeto destinado al abrigo, adorno o uso personal que un viajero lleve consigo durante el viaje a bordo del habitáculo del vehículo.
				</p>

				<p>
					Para los billetes Bus&Fly la facturación de equipaje se rige según la normas de franquicia de equipajes de Iberia. En los tramos terrestres no es posible hacer check-in por lo que siempre deberás retirar el equipaje en el aeropuerto de Madrid:
				</p>
				<ul>					
					<li>
						Para facturar tu equipaje a un destino internacional: En el aeropuerto de Madrid, el autobús de MasterTravel te dejará en la zona de dársenas (1-4) de la T4 (nivel 0). Tendrás que retirar tu equipaje del autobús, subir al nivel de salidas (nivel 2) donde se encuentra el área de facturación de Iberia. Las pantallas de información te ayudarán a localizar donde factura tu vuelo.
					</li>
					<li>
						Si tu origen es internacional podrás facturar tu equipaje en los aviones de Iberia solo hasta Madrid. Una vez desembarques del avión deberás ir a recoger tu equipaje de la cinta transportadora y pasar por la aduana. A continuación debes dirigirte a la zona de dársenas (1) de la T4 donde encontrarás tu autobús de MasterTravel (nivel 0).
					</li>	
				</ul>
			</div>

			<p class="titulo_texto">¿Qué puedo transportar conmigo en el autobús?</p>

			<div class="texto_contenedor_general">
				<p>
					El compromiso de TravelMaster con las necesidades de movilidad de sus clientes se extiende a la gestión de servicios de transporte en autobús de ámbito regional y autonómico, que es el origen de su actividad.
				</p>
				<p>
					Tienes derecho a transportar gratuitamente hasta 30 Kgs. de equipaje (25 kilos en caso de servicios internacionales). Además, podrás llevar en la cabina del vehículo equipajes de mano de pequeñas dimensiones, previa autorización del conductor.
				</p>
				<p>
					No se admitirá el transporte de todo aquello que pueda contener materiales u objetos molestos o peligrosos (ya sea inflamable, tóxico, corrosivo, infeccioso o radioactivo, etc) o de un volumen y peso excesivo o inadecuado.
				</p>
				<p>
					Podrás transportar, bajo condiciones especiales, bicicletas, tablas de surf o skis, así como también mascotas.
				</p>
				<p>
					*Otros equipajes especiales: Las mismas tarifas y condiciones serán aplicables a todos aquellos equipamientos y complementos de deporte y/u ocio equiparables, similares o asimilables a los descritos anteriormente y que por sus dimensiones y/o características deban de ir ubicados en la bodega del autobús. Estos equipajes deben encontrarse en condiciones de viajar sin provocar daños en otros equipajes o bultos, siendo obligatorio, que vayan embalados para su transporte.
				</p>			
			</div>
		</div>
	</div>

	<?php
		include('mostrar_pie.php');
	?>

</body>
</html>