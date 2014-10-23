<?php  

session_start();

include("../../php/classes/DateGenerator.class.php");

if($_POST["mode"] == "selectTravel")
{
    $weeklyID = $_POST["weeklyID"];
    $travelerID = $_POST["TravelerID"];
    
    $all = $_SESSION["all"];
    
    foreach($all as $result)
    {
        if($result["WeeklyScheduleID"]==$weeklyID)
        {
            $row = $result;
           // var_dump($row);
        }
    }
    
    $date = new DateGenerator();
    
    $dates = $date->calculateDates($row["Day"], 20);
    
    var_dump($dates);
    
}


//$dbh->addBooking($travelerID, );


?>