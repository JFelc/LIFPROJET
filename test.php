<?php $m = new  MongoDB\Driver\Manager("mongodb://localhost:27017");
							$filter = ['LIBCOM' => ['$eq' => "Lyon"]];
  							$query = new MongoDB\Driver\Query($filter);
							$cmd = new MongoDB\Driver\Command([
								'distinct' => 'A2018',
								'key' => 'LIBCOM',
								'query' => $query
								
							]);

							$cursor = $m->executeCommand('Logements', $cmd);
							$tab = iterator_to_array($cursor);
							echo json_encode($tab);							
							
?>
