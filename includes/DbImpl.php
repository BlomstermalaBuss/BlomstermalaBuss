<?php

	/*try {
		$dbh = new PDO('mysql:host=195.178.235.60;dbname=ac9549;charset=utf8', 'ac9549', 'kilimanjaro911');
		$stmt = $dbh->prepare('SELECT * FROM Anstalld');
		$stmt->execute();
		
		$result = $stmt->fetchAll();
		foreach($result as $r)
		{
			echo "<p>" . $r['Namn'] . "</p>";
		}
	}
	catch (Exception $e)
	{
		echo $e->getMessage();
	}*/
	
	include("dbclass.php");
	
	try {
		$dbh = new DatabaseConnection();
		
		$result = $dbh->getAllEmployees();
		
		echo "<table>";
		foreach ($result as $r) {
			echo "<tr>";
				echo "<td>" . $r['Namn']. "</td>";
				echo "<td>" . $r['Adress'] . "</td>";
			echo "</tr>";
		}
		echo "</table>";
		
		echo "<br />";
		echo "<br />";
		echo "<br />";
		
		$id = 7;
		$result = $dbh->getEmployeeById($id);
		echo "Anställds namn med id " . $id . ": " . $result['Namn'] . "";
	}
	catch (Exception $e) {
		echo $e->getMessage();
	}
	
?>