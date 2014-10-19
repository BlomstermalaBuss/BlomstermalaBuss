<?php
include("php/classes/DatabaseInterface.class.php");
?>

<form action="php/pages/processing/processing_booking.php" method="post">
    <select size="2">
    <?php
    $dbh= new DatabaseInterface();
    $result1 = $dbh->getTravelers();
    
    foreach ($result1 as $traveler) {
       
          ?>
    
    
        <option value= "<?php echo $traveler['TravelerID']  ?>"  > <?php  echo $traveler['Name']  ?> </option>
    
    
    <?php } ?>
    </select>
  
    
   
    <br><br>
    <input type="submit" value="Cancel your trip">
    
</form>
    

  
