<?php

function filterType(){
	if($_GET["Geo"] == 'Departement'){
		$filter_type = 'depcom';
	}
	else if($_GET["Geo"] == 'Region'){
		$filter_type = 'depcom';
	}
	else if($_GET["Geo"] == 'Commune'){
		$filter_type = 'libcom';
	}
	return $filter_type;
}

$res = filterType();


$m = new  MongoDB\Driver\Manager("mongodb://localhost:27017");
							$filter = $res => ['$eq' => $_GET["input-replacer"]], 'distinct' => ['France'.$_GET["Year"]];
  							$query = new MongoDB\Driver\Query($filter);
							$cursor = executeQuery('Logements', $query);
							$tab = iterator_to_array($cursor);
							echo json_encode($tab);							
							
?>
