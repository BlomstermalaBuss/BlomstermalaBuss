<?php

session_start();

include('../../php/classes/DateGenerator.class.php');
include('../../php/classes/DatabaseInterface.class.php');

$dbh = new DatabaseInterface();

if(isset($_POST['mode'])) {
    if($_POST['mode'] == "addbooking") {
        $weeklyID = $_POST["weeklyid"];

        $all = $_SESSION["travels"];

        //var_dump($all);
        
        foreach($all as $result) {
            if($result["WeeklyScheduleID"] == $weeklyID) {
                $row = $result;
            }
        }
        
        $date = new DateGenerator();
        $dates = $date->calculateDates($row["Day"], 20);
        $_SESSION['travel'] = $row;
        $_SESSION['dates'] = $dates;
        $_SESSION['traveltobook'] = true;
        
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    if ($_POST['mode'] == "addbooking_dateselected") {
        $date = $_POST['date'];
        $travels = $_SESSION['travels'];
        $travel_saved = $_SESSION['travel'];
        
        foreach($travels as $travel) {
            if($travel["WeeklyScheduleID"] == $travel_saved["WeeklyScheduleID"]) {
                $id = $travel["WeeklyScheduleID"];
                $maxTravelerAmount = $travel['MaxTravelerAmount'];
            }
        }
        
        $result = $dbh->getTravelByWeeklyScheduleIdAndDate($id, $date);
        if ($result == null) {
            $dbh->addTravel($date, $id);
            $travelId = $dbh->getDbh()->lastInsertId();
            $dbh->addBooking($_SESSION['id'], $travelId);
        } else if ($result != null) {
            if ($dbh->getTravelerAmountByTravelId($result['TravelID']) < $maxTravelerAmount) {
                $dbh->addBooking($_SESSION['id'], $result['TravelID']);
            } else {
                $_SESSION['error'] = "The max amount of travelers (" . $maxTravelerAmount . ") are already booked on this travel.";
            }
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}