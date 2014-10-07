<?php

include("DatabaseInterface.class.php");
	
try {
    $dbh = new DatabaseInterface();

    $result1 = $dbh->getWeeklySchedule();
    echo "<table>";
    foreach ($result1 as $Schedule) {
            echo "<tr>";
                echo "<td>" . $Schedule['Departure']. "</td>";
                echo "<td>" . $Schedule['Destination'] . "</td>";
                echo "<td>" . $Schedule['Day'] . "</td>";
                echo "<td>" . $Schedule['DepartureTime'] . "</td>";
                echo "<td>" . $Schedule['ArrivalTime'] . "</td>";
                echo "<td>" . $Schedule['Price'] . "</td>";
                echo "<td>" . $Schedule['MaxTravelerAmount'] . "</td>";
            echo "</tr>";
    }
    echo "</table>";
/*
    echo "<br />";
    echo "<br />";
    echo "<br />";

    $id = 6;
    $result2 = $dbh->getEmployeeById($id);
    echo "Anställds namn med id " . $id . ": " . $result2['Namn'] . "";

    echo "<br />";
    echo "<br />";
    echo "<br />";
    
    $name = "Stina Larsson";
    $result3 = $dbh->getProjectsByEmployeeName($name);
    echo "<table>";
    foreach ($result3 as $person) {
            echo "<tr>";
                    echo "<td>" . $person['AnstalldNamn']. "</td>";
                    echo "<td>" . $person['ProjektNamn'] . "</td>";
                    echo "<td>" . $person['TimPerV'] . "</td>";
            echo "</tr>"; 
    }
    echo "</table>"; */
}
catch (Exception $e) {
        echo $e->getMessage();
}
	
?>