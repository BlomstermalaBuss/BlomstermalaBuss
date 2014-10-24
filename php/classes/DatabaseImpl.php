<?php

include("DatabaseInterface.class.php");
include("DateGenerator.class.php");
require_once("PasswordGenerator.class.php");
	
try {
    $dbh = new DatabaseInterface();
    $date = new DateGenerator();
    $pwGenerator = new PasswordGenerator();
    
    echo $pwGenerator->generatePassword(1);
    
}
catch (Exception $e) {
        echo $e->getMessage();
}
	
?>