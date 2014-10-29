<form action="pages/processing/processing_cancellation.php" method="post">

    <?php 
    include "php/classes/DatabaseInterface.class.php";

    $dbh = new DatabaseInterface();
    $travels = $dbh->getTravelsByTravelerId($_SESSION['id']);
    ?>


    <?php
    if ($travels != null) {
        ?>
        <table class="weekly">
        <tr>
            <th>Cancel booking</th>
            <th>Date</th>
            <th>Departure</th>
            <th>Destination</th>
            <th>Day</th>
            <th>Departure time</th>
            <th>Arrival time</th>
            <th>Price</th>
        </tr>
        <?php
        foreach ($travels as $travel)
        {
            echo("<tr>"
                .  "<td>" . "<input type='radio' name='travelid' value='" . $travel['TravelID']. "'>" . "</td>"
                .  "<td>" . $travel['Date'] . "</td>"
                .  "<td>" . $travel['Departure'] . "</td>"
                .  "<td>" . $travel['Destination'] . "</td>"
                .  "<td>" . $travel['Day'] . "</td>"
                .  "<td>" . $travel['DepartureTime'] . "</td>"
                .  "<td>" . $travel['ArrivalTime'] . "</td>"
                .  "<td>" . $travel['Price'] . "</td>"
        . "</tr>");
        }
        ?>
        </table>
        <input type="submit">
    <?php
    } else {
        echo "<p>You don't have any bookings to cancel.";
    }
    ?>
 </form>

  
