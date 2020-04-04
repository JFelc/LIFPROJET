<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="../../../../favicon.ico">
	<title>Starter Template · Bootstrap</title>


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

</head>

<body>

	<!-- A mettre dans un fichier static -->

	<main role="main" class="container">

		<div class="text-center">
			<h1>Bootstrap starter template</h1>
			<p class="lead">Welcome to our awesome website</p>
		</div>
		<div id="mapid">
			<script>
				function retrieveLocation() {
					var xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							var result = this.responseText;
							var ArrayResult = JSON.parse(result);

						}
					}
					var url = new URL(window.location);
					var URLres = new URLSearchParams(url.search);
					var res = URLres.toString();
					xmlhttp.open("GET", "requests/requestForm.php?" + res, true);
					xmlhttp.send();

				}

				let colors = {
					A: greenIcon,
					B: greenIcon,
					C: yellowIcon,
					D: yellowIcon,
					E: orangeIcon,
					F: redIcon
				}

				function getColor(indice) {


					return colors[indice] || blueIcon;
				}




				var mymap = L.map('mapid').setView([45.75, 4.85], 13);
				L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoianVsaWVuZiIsImEiOiJjazZ4dThjajEwN3owM2xta3p5NWN2eWc4In0.xL40ESstdyAMz6gjlVQ2fw', {
					attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
					id: 'mapbox/streets-v11',
					accessToken: 'pk.eyJ1IjoianVsaWVuZiIsImEiOiJjazZ4dThjajEwN3owM2xta3p5NWN2eWc4In0.xL40ESstdyAMz6gjlVQ2fw'

				}).addTo(mymap);
				const geocoder = new L.Control.Geocoder.Nominatim("FR");
				const formResult = {
					address: "52 ST. CLAIR",
					indice: 'Z'
				};
				geocoder.geocode(formResult.address, (function(form, map, results) {
					console.log(arguments)
					DPE_indicator(results[0].properties, form.indice, map)
				}).bind(null, formResult, mymap), {
					countryCode: 'FR'
				});



				var marker = L.marker([45.75, 4.85]).addTo(mymap);



				/*var greenIcon = new L.Icon({
					iconUrl: 'leaflet-color-markers-master/img/marker-icon-2x-green.png',
					shadowUrl: 'leaflet-color-markers-master/img/marker-shadow.png',
					iconSize: [25, 41],
					iconAnchor: [12, 41],
					popupAnchor: [1, -34],
					shadowSize: [41, 41]
				});
				*/
				L.marker([45.75, 4.85], {
					icon: greenIcon
				}).addTo(mymap);

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
					lat,
					lon
				}, indice, map) {

					var color = getColor(indice);

					var marker = L.marker([lat, lon], {
						icon: color
					}).addTo(map);
					marker.bindPopup("Indice DPE : " + indice);


				}

			</script>
		</div>

	</main><!-- /.container -->


	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>
