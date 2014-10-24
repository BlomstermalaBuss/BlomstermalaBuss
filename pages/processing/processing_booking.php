<?php

session_start();

var_dump($_POST);

include('../../php/classes/DateGenerator.class.php');

if(isset($_POST)) {
    if(isset($_POST['mode']) == "addbooking") {
        $weeklyID = $_POST["weeklyid"];

        $all = $_SESSION["travels"];

        //var_dump($all);
        
        foreach($all as $result) {
            if($result["WeeklyScheduleID"] == $weeklyID) {
                $row = $result;
                var_dump($row);
            }
        }
        
        $date = new DateGenerator();
        $dates = $date->calculateDates($row["Day"], 20);
        $_SESSION['dates'] = $dates;
        $_SESSION['traveltobook'] = true;
        
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        //die();
    }
    if (isset($_POST['mode']) == "addbooking_dateselected") {
        var_dump($date = $_POST['date']);
        die();
    }
    //die();
}