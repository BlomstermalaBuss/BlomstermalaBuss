<div id="editweeklyschedule">
    <?php if(!isset($_SESSION['scheduletoedit'])) { ?>
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
        foreach ($schedules as $schedule) {
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
        <input type="hidden" name="mode" value="editweeklyschedule">
        <p><input type="submit" value="Edit weekly schedule"></p>
    </form>
    <?php } ?>
    <?php if(isset($_SESSION['scheduletoedit'])) { ?>
    <div class="formDiv">
        <form method="POST" action="php/pages/processing/processing_weeklyschedule.php">
            <?php 
                //var_dump($_SESSION['scheduletoedit']);
                $result = $_SESSION['scheduletoedit'];
                unset($_SESSION['scheduletoedit']);
                foreach ($result as $res) {
                ?>
                    <p>City - departure <input type="text" name="Departure" value="<?php echo $res['Departure']; ?>"></p>
                    <p>City - destination <input type="text" name="Destination" value="<?php echo $res['Destination']; ?>"></p>
                    <p>Day <select name="Day">
                            <option value="Monday"<?php if($res['Day'] == "Monday") { echo " selected"; } ?>>Monday</option>
                            <option value="Tuesday"<?php if($res['Day'] == "Tuesday") { echo " selected"; } ?>>Tuesday</option>
                            <option value="Wednesday"<?php if($res['Day'] == "Wednesday") { echo " selected"; } ?>>Wednesday</option>
                            <option value="Thursday"<?php if($res['Day'] == "Thursday") { echo " selected"; } ?>>Thursday</option>
                            <option value="Friday"<?php if($res['Day'] == "Friday") { echo " selected"; } ?>>Friday</option>
                            <option value="Saturday"<?php if($res['Day'] == "Saturday") { echo " selected"; } ?>>Saturday</option>
                            <option value="Sunday"<?php if($res['Day'] == "Sunday") { echo " selected"; } ?>>Sunday</option>
                        </select>
                    </p>
                    <p>Departure time (HH:MM) <input type="time" name="DepartureTime" value="<?php echo $res['DepartureTime']; ?>"></p>
                    <p>Arrival time (HH:MM) <input type="time" name="ArrivalTime" value="<?php echo $res['ArrivalTime']; ?>"></p>
                    <p>Price <input type="text" name="Price" value="<?php echo $res['Price']; ?>"></p>
                    <p>Max traveler amount <input type="number" name="MaxTravelerAmount" value="<?php echo $res['MaxTravelerAmount']; ?>"></p>
                    <input type="hidden" name="id" value="<?php echo $res['WeeklyScheduleID']; ?>">
                    <input type="hidden" name="mode" value="editweeklyschedule_update">
                    <p><input type="submit" value="Submit changes"></p>
                <?php
                } 
            ?>
        </form>
    </div>
    <?php } ?>
</div>