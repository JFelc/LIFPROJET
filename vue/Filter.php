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

	<link rel="stylesheet" href="css/Filter.css">
	</link>
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!-- Place your stylesheet here-->
	<link href="/css/stylesheet.css" rel="stylesheet" type="text/css">
</head>

<body>


	<script>
		function showHint() {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					var result = this.responseText;
					var ArrayResult = new Array();
					ArrayResult.length = 700000;
					ArrayResult = JSON.parse(result);
					console.log(ArrayResult.length);
					console.log(ArrayResult);
					var dataList = document.getElementById('Geo-select');
					ArrayResult.forEach(function(item) {
						var options = document.createElement('option');
						options.value = item;
						dataList.appendChild(options);

					});


				}
			}

			xmlhttp.open("GET", "test.php", true);
			xmlhttp.send();
		}


		function ChoixAffichage() {



			var region = document.getElementById('Geo-select');
			var filter = document.getElementById("Form-filter");
			if (region.options[region.selectedIndex].text == 'Région') {
				document.getElementById('Town-holder').hidden = true;
				document.getElementById('Comm-holder').hidden = true;
				var label = document.createElement("LABEL");
				var Replacement = document.createTextNode("Nom de la Région");
				label.setAttribute("for", "Replacement");
				label.appendChild(Replacement);
				filter.insertBefore(label, document.getElementById("Replacement"));
				var select = document.createElement("select");
				var option = document.createElement("option");
				option.text = " ";
				select.appendChild(option);
				filter.insertBefore(select, null);
				return "Région";

			} else if (region.options[region.selectedIndex].text == 'Département') {
				document.getElementById('Town-holder').hidden = true;
				document.getElementById('Comm-holder').hidden = true;
				var label = document.createElement("LABEL");
				var Replacement = document.createTextNode("Nom du département");
				label.setAttribute("for", "Replacement");
				label.appendChild(Replacement);
				filter.insertBefore(label, document.getElementById("Replacement"));
				var select = document.createElement("select");
				var option = document.createElement("option");
				option.text = " ";
				select.appendChild(option);
				filter.insertBefore(select, null);
				return "Département";
			}
		}

	</script>
	<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
		<a class="navbar-brand" href="#">Navbar</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarsExampleDefault">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="#">Accueil</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Filtre</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Stats</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Carte</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">À propos</a>
				</li>
			</ul>
		</div>
	</nav>

	<div class="container">
		<div class="row">
			<form id="Form-filter" action="get" class="form-filter" autocomplete="on">
				<div class="col-sm">
					<label for="RefGeo"> Choix réferentiel géographique : </label>
					<select name="Geo" id="Geo-select" onchange="ChoixAffichage()">
						<option value=""> Choisissez une option </option>
						<option value="Region"> Région</option>
						<option value=" Departement "> Département</option>
						<option value=" EPCI "> EPCI </option>
						<option value=" Commune "> Commune </option>
					</select>
				</div>
				<div id="Town-holder" class="col-sm">
					<label for="RefNat"> Ville : </label>
					<select name="Town" id="Town-select">
						<!-- Script JS adaptatif au premier choix -->
					</select>
				</div>
				<div id="Comm-holder" class="col-sm">
					<label for="CommName"> Now de la commune </label>
					<select name="CommName" id="Comm-name">

					</select>
				</div>
				<div class="col-sm">
					<label for="Year"> Année </label>
					<select name="Year" id="Year-select">
					</select>
				</div>

			</form>
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
