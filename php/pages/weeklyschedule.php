<?php
include "php/classes/DatabaseInterface.class.php";
?>
<form>
    <input type="radio" name="radioButtonWeeklySchedule" value="addschedule">Add new schedule
    <input type="radio" name="radioButtonWeeklySchedule" value="editschedule">Edit existing schedule
    <input type="radio" name="radioButtonWeeklySchedule" value="removeschedule">Remove existing schedule
</form>
<div id="addweeklyschedule">
    <div class="formDiv">
        <form method="POST" action="php/pages/processing/processing_weeklyschedule.php">
            <p>City - departure <input type="text" name="Departure" placeholder="City - departure"></p>
            <p>City - destination <input type="text" name="Destination" placeholder="City - destination"></p>
            <p>Day <select name="Day">
                    <option value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                    <option value="Saturday">Saturday</option>
                    <option value="Sunday">Sunday</option>
                </select>
            </p>
            <p>Departure time (HH:MM) <input type="time" name="DepartureTime" placeholder="Departure time (HH:MM)"></p>
            <p>Arrival time (HH:MM) <input type="time" name="ArrivalTime" placeholder="Arrival time (HH:MM)"></p>
            <p>Price <input type="text" name="Price" placeholder="Price"></p>
            <p>Max traveler amount <input type="number" name="MaxTravelerAmount" placeholder="Max traveler amount"></p>
            <input type="hidden" name="mode" value="addweeklyschedule">
            <p><input type="submit" value="Add weekly schedule"></p>
        </form>
    </div>
</div>
<div id="editweeklyschedule">

</div>
<div id="removeweeklyschedule">
    <form action="php/pages/processing/processing_weeklyschedule.php" method="post">
        <?php 
        $dbh = new DatabaseInterface();
        $schedules = $dbh->getWeeklySchedules();
        ?>

        <table class="weekly">
            <tr>
                <th>Choice</th>
                <th>Departure</th>
                <th>Destination</th>
                <th>Day</th>
                <th>Departure time</th>
                <th>Arrival time</th>
                <th>Price</th>
            </tr>
         <?php
         foreach ($schedules as $schedule) 
         {
             echo("<tr>"
                 .  "<td>" . "<input type='radio' name='id' value='" . $schedule['WeeklyScheduleID']. "'>" . "</td>"
                 .  "<td>" . $schedule['Departure'] . "</td>"
                 .  "<td>" . $schedule['Destination'] . "</td>"
                 .  "<td>" . $schedule['Day'] . "</td>"
                 .  "<td>" . $schedule['DepartureTime'] . "</td>"
                 .  "<td>" . $schedule['ArrivalTime'] . "</td>"
                 .  "<td>" . $schedule['Price'] . "</td>"
         . "</tr>");
         }
         ?>   
        </table>
        <input type="hidden" name="mode" value="removeweeklyschedule">
        <p><input type="submit" onclick="confirm('Are you sure you want to delete the selected schedule(s)?')" value="Remove weekly schedule(s)"></p>
    </form>
</div>