<?php

session_start();

include('../../php/classes/DatabaseInterface.class.php');

$dbh = new DatabaseInterface();

if(isset($_POST)) {
    if(isset($_POST['travelid'])) {
        $travelId = $_POST['travelid'];
        $travelerId = $_SESSION['id'];
        
        echo "TravelID: " . $travelId . "<br />";
        echo "TravelerID: " . $travelerId . "<br />";
        $result = $dbh->removeBookingByTravelerIdAndTravelId($travelerId, $travelId);
        if($result) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        } else {
            die();
        }
    }
}

