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
					var ArrayResult = JSON.parse(result);
					console.log(result.length);
					console.log(ArrayResult);



					var Replacer = document.getElementById("Replace-form");
					var res = new Set(ArrayResult.map((r) => r.region_name));

					//Faire une condition avec str pour le script d'auto.
					//Typiquement un if(str) -> 


					var dataList = document.getElementById('datalist-replacer');


					res.forEach(function(item) {
						var options = document.createElement('option');
						options.value = item;
						dataList.appendChild(options);
					});

				}
			}

			xmlhttp.open("GET", "requests/departements-region.json", true);
			xmlhttp.send();
		}

		function showHintDep() {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					var result = this.responseText;
					var ArrayResult = JSON.parse(result);
					console.log(result.length);
					console.log(ArrayResult);



					var Replacer = document.getElementById("Replace-form");

					//Faire une condition avec str pour le script d'auto.
					//Typiquement un if(str) -> 


					var dataList = document.getElementById('datalist-replacer');

					ArrayResult.forEach(function(item) {
						var options = document.createElement('option');

						options.value = item.dep_name;
						dataList.appendChild(options);
					});

				}
			}

			xmlhttp.open("GET", "requests/departements-region.json", true);
			xmlhttp.send();
		}

		function showHintTown() {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					var result = this.responseText;
					var ArrayResult = JSON.parse(result);
					console.log(result.length);
					console.log(ArrayResult);



					var Replacer = document.getElementById("Replace-form");

					//Faire une condition avec str pour le script d'auto.
					//Typiquement un if(str) -> 


					var dataList = document.getElementById('datalist-replacer');

					ArrayResult[0].values.forEach(function(item) {
						var options = document.createElement('option');
						options.value = item;
						dataList.appendChild(options);
					});

				}
			}

			xmlhttp.open("GET", "requests/requestTown.php", true);
			xmlhttp.send();
		}


		function ChoixAffichage() {



			var region = document.getElementById('Geo-select');
			var filter = document.getElementById("Form-filter");

			if (region.options[region.selectedIndex].text == 'Région') {
				showHint();
				document.getElementById('Year-select').style.display = "block";
				document.getElementById('Replace-form').style.display = "block";
				var Replace = document.createTextNode("Nom de la Région");
				var labelReplace = document.getElementById("Replacer");
				labelReplace.appendChild(Replace);




			} else if (region.options[region.selectedIndex].text == 'Département') {
				showHintDep();
				document.getElementById('Year-select').style.display = "block";
				document.getElementById('Replace-form').style.display = "block";
				var Replace = document.createTextNode("Nom du département");
				var LabelReplace = document.getElementById("Replacer");
				LabelReplace.appendChild(Replace);
			} else if (region.options[region.selectedIndex].text == 'Commune') {
				showHintTown();
				document.getElementById('Year-select').style.display = "block";
				document.getElementById('Replace-form').style.display = "block";
				var Replace = document.createTextNode("Nom de la ville");
				var LabelReplace = document.getElementById("Replacer");
				LabelReplace.appendChild(Replace);
			}

		}

	</script>


	<div class="container">
		<div class="row">
			<form id="Form-filter" target="_blank" action="http://lif.sci-web.net/~logementsociaux/index.php?" method="GET" class="form-filter" autocomplete="on">
				<div class="col-sm">
					<input type="hidden" name="page" value="Map"> </input>
					<label for="RefGeo"> Choix réferentiel géographique : </label>
					<select name="Geo" id="Geo-select" onchange="ChoixAffichage()">
						<option value=""> Choisissez une option </option>
						<option value="Region"> Région</option>
						<option value=" Departement "> Département</option>
						<option value=" EPCI "> EPCI </option>
						<option value=" Commune "> Commune </option>
					</select>
				</div>
				<div class="col-sm" id="Year-select">
					<label for="Year"> Année </label>
					<select name="Year">
						<option value="2016"> 2016</option>
						<option value="2017"> 2017</option>
					</select>
				</div>
				<div class="col-sm" id="Replace-form">
					<label id="Replacer" for="Replace"></label>
					<input type="text" name="input_replacer" id="ajax" list="datalist-replacer">
					<datalist id="datalist-replacer"> </datalist> </input>
				</div>
				<input type="submit" id="Submit" value="Envoyer"></input>
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
