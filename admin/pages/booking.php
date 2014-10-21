<form action="../php/pages/processing/processing_booking.php" method="post">

    <?php 
    include "../php/classes/DatabaseInterface.class.php";

    $dbh = new DatabaseInterface();
    $result1 = $dbh->getWeeklySchedules();
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
     foreach ($result1 as $schedule) 
     {
         echo("<tr>"
             .  "<td>" . "<input type='radio' name='radio' value='" . $schedule['WeeklyScheduleID']. "'>" . "</td>"
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

     <br><br>

     <input type="text" name="Name" placeholder="Name">
     <br><br>
     <input type="text" name="SocialSecurityNr" placeholder="Social Security Number">
     <br><br>
     <input type="text" name="City" placeholder="City">
     <br><br>
     <input type="text" name="Zipcode" placeholder="Zipcode">
     <br><br>
     <input type="text" name="Street" placeholder="Street">
     <br><br>
     <input type="text" name="Country" placeholder="Country">
     <br><br>
     <input type="submit" value="Book">           
 </form>