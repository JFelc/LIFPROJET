<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="../../../../favicon.ico">
	<title>Starter Template · Bootstrap</title>
	<link href="Map.css" rel="stylesheet" type="text/css">

	<!--Template based on URL below-->
	<link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/starter-template/">

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
	<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>

	<!-- Place your stylesheet here-->
	<link href="/css/stylesheet.css" rel="stylesheet" type="text/css">
</head>

<body>

	<!-- A mettre dans un fichier static -->



	<main role="main" class="container">

		<div class="text-center mt-5 pt-5">
			<h1>Bootstrap starter template</h1>
			<p class="lead">Welcome to our awesome website</p>
		</div>
		<div id="mapid">
			<script>
				var mymap = L.map('mapid').setView([45.75, 4.85], 13);
				L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoianVsaWVuZiIsImEiOiJjazZ4dThjajEwN3owM2xta3p5NWN2eWc4In0.xL40ESstdyAMz6gjlVQ2fw', {
					attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
					maxZoom: 30,
					minZoom: 12,
					id: 'mapbox/streets-v11',
					accessToken: 'pk.eyJ1IjoianVsaWVuZiIsImEiOiJjazZ4dThjajEwN3owM2xta3p5NWN2eWc4In0.xL40ESstdyAMz6gjlVQ2fw'
				}).addTo(mymap);

				var marker = L.marker([45.75, 4.85]).addTo(mymap);

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