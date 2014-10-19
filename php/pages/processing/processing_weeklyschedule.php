<?php

require_once("../../classes/DatabaseInterface.class.php");

$dbh = new DatabaseInterface();

if (isset($_POST['mode']) && $_POST['mode'] == "addweeklyschedule") {
    $departure = $_POST['Departure'];
    $destination = $_POST['Destination'];
    $day = $_POST['Day'];
    $departureTime = $_POST['DepartureTime'];
    $arrivalTime = $_POST['ArrivalTime'];
    $price = $_POST['Price'];
    $maxTravelerAmount = $_POST['MaxTravelerAmount'];
    
    $result = $dbh->addWeeklySchedule($departure, $destination, $day, $departureTime, $arrivalTime, $price, $maxTravelerAmount);
    
    if ($result) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        die();
    }
}
if (isset($_POST['mode']) && $_POST['mode'] == "removeweeklyschedule") {
    $idArray = $_POST['id'];
    $resultArray = array();
    
    foreach ($idArray as $id => $value) {
        $result = $dbh->removeWeeklySchedule($value);
        array_push($resultArray, $result);
    }
    if (!in_array(0)) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        die();
    }
}
