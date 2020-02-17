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
	</link>
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!-- Place your stylesheet here-->
	<link href="css/Filter.css" rel="stylesheet" type="text/css">
	<link href="css/Footer.css" rel="stylesheet" type="text/css">
</head>

<body>

	<?php include('static/Navbar.php'); ?>

	<div class="container">
		<h2> Filtres de recherche </h2>
		<div class="row">
			<form action="get" class="form-filter" autocomplete="on">
				<div class="row">
					<label for="RefGeo"> Choix réferentiel géographique : </label>
					<select name="Geo" id="Geo-select">
						<option value=""> Choisissez une option </option>
						<!-- Script JS suggestion Dép/Région -->
					</select>
				</div>
				<div class="row">
					<label for="RefNat"> Ville : </label>
					<select name="Town" id="Town-select">
						<!-- Script JS adaptatif au premier choix -->
					</select>
				</div>
				<div class="row">
					<label for="CommName"> Now de la commune </label>
					<select name="CommName" id="idk-yet">

					</select>
				</div>
				<div class="row">
					<label for="Year"> Année </label>
					<select name="Year" id="Year-select">
					</select>
				</div>

			</form>
		</div>
	</div><!-- /.container -->
	<?php  include('static/Footer.php'); ?>
	<?php  include('static/Footer.php'); ?>

	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>
