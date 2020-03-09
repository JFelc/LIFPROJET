<?php $m = new  MongoDB\Driver\Manager("mongodb://localhost:27017");
							$filter = ['LIBCOM' => ['$eq' => "Affoux"]];
							$options = ['limit'  => 10];
  							$query = new MongoDB\Driver\Query($filter,$options);
							$cursor = $m->executeQuery('Logements.A2016', $query);
							$tab = iterator_to_array($cursor);	
							echo json_encode($tab);
							
							
?>
