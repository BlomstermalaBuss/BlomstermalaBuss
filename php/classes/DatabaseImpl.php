<?php

include("DatabaseInterface.class.php");
require_once("PasswordGenerator.class.php");
	
try {
    $dbh = new DatabaseInterface();

    try {
        $username = "Admin";
        $password = "1";
        
        $pwGenerator = new PasswordGenerator();
        $password = $pwGenerator->generatePassword($password);
        $result = $dbh->addAdministrator($username, $password);
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