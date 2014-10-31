<div id="editweeklyschedule">
    <?php if(!isset($_SESSION['scheduletoedit'])) { ?>
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
            ?>
            <tr>
                <td><input type="radio" name="id" value="<?php echo $schedule['WeeklyScheduleID']; ?>"></td>
                <td><?php echo $schedule['Departure']; ?></td>
                <td><?php echo $schedule['Destination']; ?></td>
                <td><?php echo $schedule['Day']; ?></td>
                <td><?php echo $schedule['DepartureTime']; ?></td>
                <td><?php echo $schedule['ArrivalTime']; ?></td>
                <td><?php echo $schedule['Price']; ?></td>
            </tr>
            <?php } ?>
        </table>
        <input type="hidden" name="mode" value="editweeklyschedule">
        <p><input type="submit" value="Edit weekly schedule"></p>
    </form>
    <?php } ?>
    <?php if(isset($_SESSION['scheduletoedit'])) { ?>
    <div class="formDiv">
        <form method="POST" action="processing/processing_weeklyschedule.php">
            <?php 
                //var_dump($_SESSION['scheduletoedit']);
                $result = $_SESSION['scheduletoedit'];
                unset($_SESSION['scheduletoedit']);
                ?>
                    <p>City - departure <input type="text" name="Departure" value="<?php echo $result['Departure']; ?>"></p>
                    <p>City - destination <input type="text" name="Destination" value="<?php echo $result['Destination']; ?>"></p>
                    <p>Departure time (HH:MM) <input type="time" name="DepartureTime" value="<?php echo $result['DepartureTime']; ?>"></p>
                    <p>Arrival time (HH:MM) <input type="time" name="ArrivalTime" value="<?php echo $result['ArrivalTime']; ?>"></p>
                    <p>Price <input type="text" name="Price" value="<?php echo $result['Price']; ?>"></p>
                    <p>Max traveler amount <input type="number" name="MaxTravelerAmount" value="<?php echo $result['MaxTravelerAmount']; ?>"></p>
                    <input type="hidden" name="id" value="<?php echo $result['WeeklyScheduleID']; ?>">
                    <input type="hidden" name="mode" value="editweeklyschedule_update">
                    <p><input type="submit" value="Submit changes"></p>
        </form>
    </div>
    <?php } ?>
</div>