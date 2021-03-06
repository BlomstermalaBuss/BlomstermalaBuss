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
            <th>Booking date</th>
            <th>Date</th>
            <th>Departure</th>
            <th>Destination</th>
            <th>Day</th>
            <th>Departure time</th>
            <th>Arrival time</th>
            <th>Price</th>
            <th>Max traveler amount</th>
        </tr>
        <?php
        foreach ($travels as $travel)
        {
            echo("<tr>"
                .  "<td>" . "<input type='radio' name='travelid' value='" . $travel['TravelID']. "'>" . "</td>"
                .  "<td>" . $travel['BookingDate'] . "</td>"
                .  "<td>" . $travel['Date'] . "</td>"
                .  "<td>" . $travel['Departure'] . "</td>"
                .  "<td>" . $travel['Destination'] . "</td>"
                .  "<td>" . $travel['Day'] . "</td>"
                .  "<td>" . $travel['DepartureTime'] . "</td>"
                .  "<td>" . $travel['ArrivalTime'] . "</td>"
                .  "<td>" . $travel['Price'] . "</td>"
                .  "<td>" . $travel['MaxTravelerAmount'] . "</td>"
        . "</tr>");
        }
        ?>
        </table>
        <p><input type="submit"></p>
    <?php
    } else {
        echo "<p>You don't have any bookings to cancel.</p>";
    }
    ?>
 </form>

  
