<div class="formDiv">
    <h1>Add weekly schedule</h1>
    <form method="POST" action="pages/processing/processing_weeklyschedule.php">
        <p>City - departure <input type="text" name="Departure" placeholder="City - departure"></p>
        <p>City - destination <input type="text" name="Destination" placeholder="City - destination"></p>
        <p>Day <select>
                <option>Monday</option>
                <option>Tuesday</option>
                <option>Wednesday</option>
                <option>Thursday</option>
                <option>Friday</option>
                <option>Saturday</option>
                <option>Sunday</option>
            </select>
        </p>
        <p>Departure time (HH:MM) <input type="time" name="DepartureTime" placeholder="Departure time (HH:MM)"></p>
        <p>Arrival time (HH:MM) <input type="time" name="ArrivalTime" placeholder="Arrival time (HH:MM)"></p>
        <p>Price <input type="text" name="Price" placeholder="Price"></p>
        <p>Max traveler amount <input type="number" name="MaxTravelerAmount" placeholder="Max traveler amount"></p>
        <p><input type="submit" text="Submit"></p>
    </form>
</div>