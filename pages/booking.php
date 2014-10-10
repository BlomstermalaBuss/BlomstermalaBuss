       <form action="pages/processing/processing_booking.php" method="post">
           
           <?php 
           include "classes/DatabaseInterface.class.php";
           
           $dbh = new DatabaseInterface();        
           $result1 = $dbh->getWeeklySchedule();
           ?>    
            <select size="5">
            <?php foreach ($result1 as $schedule) {
                ?>
                <option value = "<?php echo($schedule['Departure']);
                echo($schedule['WeeklyScheduleID']);
                
                ?>" >
                <?php  echo($schedule['Departure'] . " ");
                echo($schedule['Destination'] . " ");
                echo($schedule['Day'] . " ");
                echo($schedule['DepartureTime'] . " ");
                echo($schedule['ArrivalTime'] . " ");
                echo($schedule['Price'] . " ");
                ?>
            </option>
                <?php } ?>
             </select> 
            
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