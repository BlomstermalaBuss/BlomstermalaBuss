<div id="removeweeklyschedule">
    <form action="processing/processing_weeklyschedule.php" method="post">
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
        foreach ($schedules as $schedule) {
            echo("<tr>"
                .  "<td>" . "<input type='checkbox' name='id[]' value='" . $schedule['WeeklyScheduleID']. "'>" . "</td>"
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
        <p><input type="submit" onclick="return removeWeeklyScheduleConfirmation()" value="Remove weekly schedule(s)"></p>
    </form>
</div>