<form action="processing/processing_booking.php" method="post">

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
             .  "<td>" . "<input type='radio' name='weeklyID' value='" . $schedule['WeeklyScheduleID']. "'>" . "</td>"
             .  "<td>" . $schedule['Departure'] . "</td>"
             .  "<td>" . $schedule['Destination'] . "</td>"
             .  "<td>" . $schedule['Day'] . "</td>"
             .  "<td>" . $schedule['DepartureTime'] . "</td>"
             .  "<td>" . $schedule['ArrivalTime'] . "</td>"
             .  "<td>" . $schedule['Price'] . "</td>"
     . "</tr>");
         
         
     
     ?>
        
     <input type="hidden" name="day" value="<?php echo($schedule["Day"]) ?>">
     <?php } ?>
     
     <?php $_SESSION["all"] = $result1; ?>
     
    </table>

     <br><br>
     
     <select name="TravelerID" size="4">
    <?php
    $result2 = $dbh->getTravelers();
    
    foreach ($result2 as $traveler) {
       
          ?>
        <option value= "<?php echo $traveler['TravelerID']  ?>"  > <?php  echo $traveler['Name']  ?> </option>
   
        <?php } ?>
    </select> 
    <br><br>
    <input type="hidden" name="mode" value="selectTravel">
    <input type="submit" value="Book">
    
</form>


<?php if(isset($_SESSION['selectTravel'])) { ?>




<?php } ?>

  <!--   <input type="text" name="Name" placeholder="Name">
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
     <input type="submit" value="Book">      -->     
 </form>