<div id="addweeklyschedule">
    <div class="formDiv">
        <form method="POST" action="pages/processing/processing_weeklyschedule.php">
            <p>City - departure <input type="text" name="Departure" placeholder="City - departure"></p>
            <p>City - destination <input type="text" name="Destination" placeholder="City - destination"></p>
            <p>Day <select name="Day">
                    <option value="Monday">Monday</option>
                    <option value="Tuesday">Tuesday</option>
                    <option value="Wednesday">Wednesday</option>
                    <option value="Thursday">Thursday</option>
                    <option value="Friday">Friday</option>
                    <option value="Saturday">Saturday</option>
                    <option value="Sunday">Sunday</option>
                </select>
            </p>
            <p>Departure time (HH:MM) <input type="time" name="DepartureTime" placeholder="Departure time (HH:MM)"></p>
            <p>Arrival time (HH:MM) <input type="time" name="ArrivalTime" placeholder="Arrival time (HH:MM)"></p>
            <p>Price <input type="text" name="Price" placeholder="Price"></p>
            <p>Max traveler amount <input type="number" name="MaxTravelerAmount" placeholder="Max traveler amount"></p>
            <input type="hidden" name="mode" value="addweeklyschedule">
            <p><input type="submit" value="Add weekly schedule"></p>
        </form>
    </div>
</div>