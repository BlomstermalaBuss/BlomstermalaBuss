<?php
    include("../php/classes/DatabaseInterface.class.php");
?>
    <form action="processing/processing_deletetravel.php" method="post">
        <?php 
        $dbh = new DatabaseInterface();
        $travels = $dbh->getTravels();
        ?>

        <table class="weekly">
            <tr>
                <th>Delete</th>
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
        foreach ($travels as $travel) {
            echo("<tr>"
                .  "<td>" . "<input type='checkbox' name='id[]' value='" . $travel['TravelID']. "'>" . "</td>"
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
        <input type="hidden" name="mode" value="deletetravel">
        <p><input type="submit" onclick="return deleteTravelConfirmation()" value="Delete travel(s)"></p>
    </form>