﻿<?php

include("DatabaseInterface.class.php");
	
try {
    $dbh = new DatabaseInterface();

    $result1 = $dbh->getWeeklySchedule();
    echo "<table>";
    foreach ($result1 as $schedule) {
            echo "<tr>";
                echo "<td>" . $schedule['Departure']. "</td>";
                echo "<td>" . $schedule['Destination'] . "</td>";
                echo "<td>" . $schedule['Day'] . "</td>";
                echo "<td>" . $schedule['DepartureTime'] . "</td>";
                echo "<td>" . $schedule['ArrivalTime'] . "</td>";
                echo "<td>" . $schedule['Price'] . "</td>";
                echo "<td>" . $schedule['MaxTravelerAmount'] . "</td>";
            echo "</tr>";
    }
    echo "</table>";
    
    try {
        //$res = $dbh->addTraveler("Daniel Nilsson", "19860411", "Svedala", "12345", "Gulvitegatan 3", "Sweden");
        //echo $res;
    } catch (Exception $e) {
        echo $e->getMessage();
    }
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