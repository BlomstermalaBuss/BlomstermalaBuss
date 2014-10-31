<?php
include("../php/classes/DatabaseInterface.class.php");
?>
<p>Please select a traveler to cancel all of his/hers bookings.</p>
<form action="processing/processing_cancellation.php" method="post">
    <p><select name="Traveler">
    <?php
    $dbh= new DatabaseInterface();
    $travelers = $dbh->getTravelers();
    
    foreach ($travelers as $traveler) {
    ?>
        <option value= "<?php echo $traveler['TravelerID']  ?>"  > <?php  echo $traveler['Name']  ?> </option>
    <?php } ?>
    </select></p>
    <input type="submit" value="Cancel traveler's trip">
    
</form>
    

  
