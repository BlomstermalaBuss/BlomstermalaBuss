<form action="pages/processing/processing_booking.php" method="post">

    <?php 
    include "php/classes/DatabaseInterface.class.php";

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
             .  "<td>" . "<input type='radio' name='weeklyid' value='" . $schedule['WeeklyScheduleID']. "'>" . "</td>"
             .  "<td>" . $schedule['Departure'] . "</td>"
             .  "<td>" . $schedule['Destination'] . "</td>"
             .  "<td>" . $schedule['Day'] . "</td>"
             .  "<td>" . $schedule['DepartureTime'] . "</td>"
             .  "<td>" . $schedule['ArrivalTime'] . "</td>"
             .  "<td>" . $schedule['Price'] . "</td>"
     . "</tr>");
     $_SESSION['travels'] = $result1;
     }
     ?>
    </table>
    <?php if(!isset($_SESSION['traveltobook'])) { ?>
    <input type="hidden" name="mode" value="addbooking">
    <?php } ?>
    
    <?php if(isset($_SESSION['traveltobook'])) {
        
        echo '<p><select name="date">';
        foreach ($_SESSION['dates'] as $date) {
            ?>
            <option value="<?php echo $date; ?>"><?php echo $date; ?></option>
            <?php
        }
        ?>
        </select></p>
        <input type="hidden" name="mode" value="addbooking_dateselected">
        <?php
        unset($_SESSION);
    }
    ?>
    <input type="submit">

 </form>