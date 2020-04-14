<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="../../../../favicon.ico">
	<title>Lifprojet</title>


	<!--Template based on URL below-->
	<link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/starter-template/">

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
	<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
	<script type="text/javascript" src="leaflet-color-markers-master/js/leaflet-color-markers.js"> </script>
	<link href="https://unpkg.com/leaflet-geosearch@latest/assets/css/leaflet.css" rel="stylesheet" />
	<script src="https://unpkg.com/leaflet-geosearch@latest/dist/bundle.min.js"></script>
	<link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
	<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
	<!-- Place your stylesheet here-->
	<link href="css/Map.css" rel="stylesheet" type="text/css">
	<script src="include/node_modules/chart.js/dist/Chart.js"></script>
</head>

<body>

	<!-- A mettre dans un fichier static -->

	<div id="containerGraph" class="container">
		<canvas id="myChart1"></canvas>
		<canvas id="myChart2"></canvas>
	</div>
	<div id="containerMap" class="container">


		<div id="mapid">
			<script>
				function retrieveLocation(year, callback) {
					var xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							var result = this.responseText;
							var arrayResult = JSON.parse(result);
							console.log(arrayResult);
							callback(arrayResult);
						}
					}
					var url = new URL(window.location);
					var URLres = new URLSearchParams(url.search);
					URLres.set('Year', year);
					var res = URLres.toString();
					xmlhttp.open("GET", "requests/requestForm.php?" + res, true);
					xmlhttp.send();

				}


				let colors = {
					A: newMoreGreenIcon,
					B: newGreenIcon,
					C: newYellowIcon,
					D: newLessYellowIcon,
					E: newOrangeIcon,
					F: newMoreOrangeIcon,
					G: newRedIcon
				}

				function getColor(indice) {


					return colors[indice] || greyIcon;
				}


				var mymap = L.map('mapid').setView([45.75, 4.85], 13);
				L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoianVsaWVuZiIsImEiOiJjazZ4dThjajEwN3owM2xta3p5NWN2eWc4In0.xL40ESstdyAMz6gjlVQ2fw', {
					attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
					maxZoom: 15,
					minZoom: 7,
					id: 'mapbox/streets-v11',
					accessToken: 'pk.eyJ1IjoianVsaWVuZiIsImEiOiJjazZ4dThjajEwN3owM2xta3p5NWN2eWc4In0.xL40ESstdyAMz6gjlVQ2fw'

				}).addTo(mymap);
				//								// const geocoder = new L.Control.Geocoder.Nominatim("FR");
				// const formResult = {
				// address: "52 ST. CLAIR",
				// indice: 'Z'
				// };
				// geocoder.geocode(formResult.address, (function(form, map, results) {
				// console.log(arguments)
				// DPE_indicator(results[0].properties, form.indice, map)
				// }).bind(null, formResult, mymap), {
				// countryCode: 'FR'
				// });
				var data = [0, 0, 0, 0, 0, 0, 0];
				var data2 = [0, 0, 0, 0, 0, 0, 0];
				retrieveLocation(2016, function(result) {
					result.forEach(location => {
						DPE_indicator(location, mymap);
						data = setDataCounter(location, data);
					});
					displayChart(data, 1, '2016');
				});

				retrieveLocation(2017, function(result) {
					result.forEach(location => {
						data2 = setDataCounter(location, data2);
					});
					displayChart(data2, 2, '2017');
				});

				function displayChart(data, number, title) {

					var data = retrieveData(data);
					var ctx = document.getElementById('myChart' + number);
					var dpeChart = new Chart(ctx, {
						type: 'pie',
						data: data,
						options: {
							title: {
								display: true,
								text: 'IndiceDPE ' + title,
								fontSize: 15

							}
						}
					})
				}


				function setDataCounter({
					dpeenergie: indice
				}, data) {

					if (indice == "A") {
						data[0] = data[0] + 1;
					}
					if (indice == "B") {
						data[1] = data[1] + 1;
					}
					if (indice == "C") {
						data[2] = data[2] + 1;
					}
					if (indice == "D") {
						data[3] = data[3] + 1;
					}
					if (indice == "E") {
						data[4] = data[4] + 1;
					}
					if (indice == "F") {
						data[5] = data[5] + 1;
					}
					if (indice == "G") {
						data[6] = data[6] + 1;
					}
					return data;
				}

				function retrieveData(numbers) {
					var data = {
						datasets: [{
							label: "Indice DPE",
							data: numbers,
							backgroundColor: ["#046302", "#00e331", "#daed07", "#b0ed07", "#ed9907", "#ed7607", "#ed0b07"]
						}],
						labels: [
							'A',
							'B',
							'C',
							'D',
							'E',
							'F',
							'G'
						]

					}

					// These labels appear in the legend and in the tooltips when hovering different arcs
					return data;
				}




				/*var greenIcon = new L.Icon({
					iconUrl: 'leaflet-color-markers-master/img/marker-icon-2x-green.png',
					shadowUrl: 'leaflet-color-markers-master/img/marker-shadow.png',
					iconSize: [25, 41],
					iconAnchor: [12, 41],
					popupAnchor: [1, -34],
					shadowSize: [41, 41]
				});
				*/

				/*	function onEachFeature(feature, layer) {
					// does this feature have a property named popupContent?
					if (feature.properties && feature.properties.popupContent) {
						layer.bindPopup(feature.properties.popupContent);
					}
				}


				var geojsonFeature = {
					"type": "Feature",
					"properties": {
						"name": "Centre de Lyon",
						"amenity": "Lyon",
						"popupContent": "Bienvenue au centre de Lyon ! "
					},
					"geometry": {
						"type": "Point",
						"coordinates": [45.75, 4.85]
					}

				};

				L.geoJSON(geojsonFeature, {
					onEachFeature: onEachFeature
				}).addTo(mymap);
*/
				function DPE_indicator({
					latitude: lat,
					longitude: lon,
					dpeenergie: indice
				}, map) {

					var color = getColor(indice);

					var marker = L.marker([lat, lon], {
						icon: color
					}).addTo(map);
					map.setView([lat, lon]);
					marker.bindPopup("Indice DPE : " + indice);


				}

			</script>
		</div>

		<div class="textMap">
			<li>Votre affichage sur la carte sera bientôt redirigé vers la zone que vous avez sélectionnée précedemment.</li>
			<li> Plus vous zoomez sur une zone, plus la carte sera sensible à une perte de performance.</li>
			<li> Enfin, les marqueurs gris correspondent à des endroits connus par la base mais dont les données DPE sont inconnues</li>
		</div>
	</div><!-- /.container -->


	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>
