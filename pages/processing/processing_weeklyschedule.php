<?php

require_once("../../classes/DatabaseInterface.class.php");

if (isset($_POST)) {
    $departure = $_POST['Departure'];
    $destination = $_POST['Destination'];
    $day = $_POST['Day'];
    $departureTime = $_POST['DepartureTime'];
    $arrivalTime = $_POST['DestinationTime'];
    $price = $_POST['Price'];
    $maxTravelerAmount = $_POST['MaxTravelerAmount'];
    
    $dbh = new DatabaseInterface();
    $result = $dbh->addWeeklySchedule($departure, $destination, $day, $departureTime, $arrivalTime, $price, $maxTravelerAmount);
    
    if ($result) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        die("Invalid data types!");
    }
}

