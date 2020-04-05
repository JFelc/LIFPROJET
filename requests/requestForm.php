<?php
error_reporting(-1);
ini_set('display_errors', 'On');
function filterType($resType){
	$filter_type = "";
	if($resType == 'Departement'){
		$filter_type = 'depcom';
	}
	else if($resType == 'Region'){
		$filter_type = 'depcom';
	}
	else if($resType == 'Commune'){
		$filter_type = 'libcom';
	}
	return $filter_type;
}

function filterValue($resValue){
	$filter_value = "";
	if($resValue == 'Departement'){
		$filter_value = 'input_replacer_dep';
	}
	else if($resValue == 'Region'){
		$filter_value = 'input_replacer';
	}
	else if($resValue == 'Commune'){
		$filter_value = 'input_replacer_town';
	}
	return $filter_value;
}

function buildFilter($filterValue, $filterType){
	
	

	if($filterType == 'Departement'){
		$regex = new MongoDB\BSON\Regex("^".$_GET[$filterValue], 'i');
		return ['$regex' => $regex];
	}
	return ['$eq' => $_GET[$filterValue]];
}



$res_test = $_GET["Geo"];
$res = filterType($res_test);
$resValue = filterValue($res_test);

$queryValue = buildFilter($resValue, $res_test);

//var_dump($res);
//var_dump($resValue);
//
//var_dump($_GET[$resValue]);
//var_dump($_GET["Year"]);
//var_dump($queryValue);
//'distinct' => ['France'.$_GET["Year"]


$m = new  MongoDB\Driver\Manager("mongodb://localhost:27017");
							$filter = [$res => $queryValue];
							$options = ['limit' => 2000];
  							$query = new MongoDB\Driver\Query($filter,$options);
							$cursor = $m->executeQuery('Logements.France'.$_GET["Year"], $query);
							$tab = iterator_to_array($cursor);
							echo json_encode($tab);							
						
?>
