<?php $m = new  MongoDB\Driver\Manager("mongodb://localhost:27017");
							$filter = ['libcom' => ['$eq' => "Lyon"]];
  							$query = new MongoDB\Driver\Query($filter);
							$cmd = new MongoDB\Driver\Command([
								'distinct' => 'France2016',
								'key' => 'libcom',
								'query' => $query
								
							]);

							$cursor = $m->executeCommand('Logements', $cmd);
							$tab = iterator_to_array($cursor);
							echo json_encode($tab);							
							
?>
