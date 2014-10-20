<?php

require_once('' . $_SERVER['DOCUMENT_ROOT'] . '/DatabaseConfiguration.class.php');

class DatabaseInterface {

    private $dbh;
    
    public function __construct() {
        $dbConf = new DatabaseConfiguration();
        
        $this->dbh = new PDO('mysql:host=' . $dbConf->getHost() . ';'
                           . 'dbname=' . $dbConf->getDatabase() . ';'
                           . 'charset=utf8', $dbConf->getUsername(), $dbConf->getPassword());
    }

    //////////////////////////////////////////////
    /// --- DATABASE METHODS FOR BOOKINGS --- ////
    //////////////////////////////////////////////
    public function addBooking($travelerId, $travelId) {
        $sql = "INSERT INTO Booking (TravelerID, TravelID)
                VALUES (:travelerId, :travelId)";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue(':travelerId', $travelerId, PDO::PARAM_INT);
        $stmt->bindValue(':travelId', $travelId, PDO::PARAM_INT);
        return $stmt->execute();
    }
    
    public function getBookings() {
        $sql = "SELECT *
                FROM Booking";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    public function removeBooking($bookingId) {
        $sql = "DELETE FROM Booking
                WHERE BookingID = :bookingId";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue(':bookingId', $bookingId, PDO::PARAM_INT);
        return $stmt->execute();
    }
    
    public function removeBookingByTravelId($travelId) {
        $sql = "DELETE FROM Booking
                WHERE TravelID = :travelId";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue(':travelId', $travelId, PDO::PARAM_INT);
        return $stmt->execute();
    }
    
    public function removeBookingByTravelerId($travelerId) {
        $sql = "DELETE FROM Booking
                WHERE TravelerID = :travelerId";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue(':travelerId', $travelerId, PDO::PARAM_INT);
        return $stmt->execute();
    }
    
    public function removeBookingByTravelerIdAndTravelId($travelerId, $travelId) {
        $sql = "DELETE FROM Booking
                WHERE TravelerID = :travelerId AND TravelID = :travelId";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue(':travelerId', $travelerId, PDO::PARAM_INT);
        $stmt->bindValue(':travelId', $travelId, PDO::PARAM_INT);
        return $stmt->execute();
    }
    
    ////////////////////////////////////////////
    /// --- DATABASE METHODS FOR TRAVEL --- ////
    ////////////////////////////////////////////
    public function addTravel($date, $weeklyScheduleId) {
        $sql = "INSERT INTO Travel (Date, WeeklyScheduleID)
                VALUES (:date, :weeklyScheduleId)";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue(':date', $date, PDO::PARAM_STR);
        $stmt->bindValue(':weeklyScheduleId', $weeklyScheduleId, PDO::PARAM_INT);
        return $stmt->execute();
    }
    
    public function editTravel($id, $date, $weeklyScheduleId) {
        $sql = "UPDATE Travel
                SET Date = :date, WeeklyScheduleID = :weeklyScheduleId
                WHERE TravelID = :id";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue(':date', $date, PDO::PARAM_STR);
        $stmt->bindValue(':weeklyScheduleId', $weeklyScheduleId, PDO::PARAM_INT);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    
    public function getTravels() {
        $sql = "SELECT *
                FROM Travel";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    public function getTravel($id) {
        $sql = "SELECT *
                FROM Travel
                WHERE TravelID = :id";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetc();
    }
    
    public function getTravelsByTravelerId($id) {
        $sql = "SELECT *
                FROM Travel
                INNER JOIN Booking
                ON Travel.TravelID = Booking.TravelerID
                INNER JOIN Traveler
                ON Booking.TravelID = Traveler.TravelerID
                WHERE Traveler.TravelerID = :id";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    public function removeTravel($id) {
        $sql = "DELETE FROM Travel
                WHERE TravelID = :id";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    
    //////////////////////////////////////////////
    /// --- DATABASE METHODS FOR TRAVELER --- ////
    //////////////////////////////////////////////
    public function addTraveler($name, $socialSecurityNr, $city, $zipcode, $street, $country) {
        $sql = "INSERT INTO Traveler (Name, SocialSecurityNr, City, Zipcode, Street, Country)
                VALUES (:name, :socialSecurityNr, :city, :zipcode, :street, :country)";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':socialSecurityNr', $socialSecurityNr, PDO::PARAM_STR);
        $stmt->bindValue(':city', $city, PDO::PARAM_STR);
        $stmt->bindValue(':zipcode', $zipcode, PDO::PARAM_STR);
        $stmt->bindValue(':street', $street, PDO::PARAM_STR);
        $stmt->bindValue(':country', $country, PDO::PARAM_STR);
        return $stmt->execute();
    }
    
    public function editTraveler($id, $name, $socialSecurityNr, $city, $zipcode, $street, $country) {
        $sql = "UPDATE Traveler
                SET Name = :name, SocialSecurityNr = :socialSecurityNr, City = :city, Zipcode = :zipcode, 
                    Street = :street, Country = :country;
                WHERE WeeklyScheduleID = :id";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':socialSecurityNr', $socialSecurityNr, PDO::PARAM_STR);
        $stmt->bindValue(':city', $city, PDO::PARAM_STR);
        $stmt->bindValue(':zipcode', $zipcode, PDO::PARAM_STR);
        $stmt->bindValue(':street', $street, PDO::PARAM_STR);
        $stmt->bindValue(':country', $country, PDO::PARAM_STR);
        return $stmt->execute();
    }
    
    public function getTraveler($id) {
        $sql = "SELECT *
                FROM Traveler
                WHERE TravelerID = :id";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }
    
    public function getTravelers() {
        $sql = "SELECT *
                FROM Traveler";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    public function getTravelersByTravelId($id) {
        $sql = "SELECT Name, SocialSecurityNr, City, Zipcode, Street, Country
                FROM Traveler
                INNER JOIN Booking
                ON Traveler.TravelerID = Booking.TravelerID
                INNER JOIN Travel
                ON Booking.TravelID = Travel.TravelID
                WHERE Travel.TravelID = :id";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    public function removeTraveler($id) {
        $sql = "DELETE FROM Traveler
                WHERE TravelerID = :id";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
    
    /////////////////////////////////////////////////////
    /// --- DATABASE METHODS FOR WEEKLY SCHEDULE --- ////
    /////////////////////////////////////////////////////
    public function addWeeklySchedule($departure, $destination, $day, $departureTime, $arrivalTime, $price, $maxTravelerAmount) {
        $sql = "INSERT INTO WeeklySchedule (Departure, Destination, Day, DepartureTime, ArrivalTime, Price, MaxTravelerAmount)
                VALUES (:departure, :destination, :day, :departureTime, :arrivalTime, :price, :maxTravelerAmount)";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue(':departure', $departure, PDO::PARAM_STR);
        $stmt->bindValue(':destination', $destination, PDO::PARAM_STR);
        $stmt->bindValue(':day', $day, PDO::PARAM_STR);
        $stmt->bindValue(':departureTime', $departureTime, PDO::PARAM_STR);
        $stmt->bindValue(':arrivalTime', $arrivalTime, PDO::PARAM_STR);
        $stmt->bindValue(':price', $price, PDO::PARAM_STR);
        $stmt->bindValue(':maxTravelerAmount', $maxTravelerAmount, PDO::PARAM_INT);
        return $stmt->execute();
    }
    
    public function editWeeklySchedule($id, $departure, $destination, $day, $departureTime, $arrivalTime, $price, $maxTravelerAmount) {
        $sql = "UPDATE WeeklySchedule
                SET Departure = :departure, Destination = :destination, Day = :day, DepartureTime = :departureTime,
                    ArrivalTime = :arrivalTime, Price = :price, MaxTravelerAmount = :maxTravelerAmount
                WHERE WeeklyScheduleID = :id";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue(':departure', $departure, PDO::PARAM_STR);
        $stmt->bindValue(':destination', $destination, PDO::PARAM_STR);
        $stmt->bindValue(':day', $day, PDO::PARAM_STR);
        $stmt->bindValue(':departureTime', $departureTime, PDO::PARAM_STR);
        $stmt->bindValue(':arrivalTime', $arrivalTime, PDO::PARAM_STR);
        $stmt->bindValue(':price', $price, PDO::PARAM_STR);
        $stmt->bindValue(':maxTravelerAmount', $maxTravelerAmount, PDO::PARAM_INT);
        $stmt->bindValue(':id', $id, PDO::PARAM_STR);
        return $stmt->execute();
    }
    
    public function getWeeklySchedules() {
        $sql = "SELECT * 
                FROM WeeklySchedule";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    public function getWeeklySchedule($id) {
        $sql = "SELECT * 
                FROM WeeklySchedule
                WHERE WeeklyScheduleID = :id";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }
    
    public function removeWeeklySchedule($id) {
        $sql = "DELETE FROM WeeklySchedule
                WHERE WeeklyScheduleID = :id";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

}