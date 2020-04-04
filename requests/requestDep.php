<?php $m = new  MongoDB\Driver\Manager("mongodb://localhost:27017");
							$filter = ['depcom' => ['$eq' => "01001"]];
  							$query = new MongoDB\Driver\Query($filter);
							$cmd = new MongoDB\Driver\Command([
								'distinct' => 'France2016',
								'key' => 'depcom',
								'query' => $query
								
							]);

							$cursor = $m->executeCommand('Logements', $cmd);
							$tab = iterator_to_array($cursor);
							echo json_encode($tab);							
							
?>
