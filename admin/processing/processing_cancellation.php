<?php

include("../../php/classes/DatabaseInterface.class.php");

$dbh = new DatabaseInterface();

if(isset($_POST['Traveler'])) {
    $travelerId = $_POST['Traveler'];
    $result = $dbh->removeBookingByTravelerId($travelerId);

    if ($result) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        die("Database error, contact administrator.");
    }
} else {
    die("Invalid access method!");
}