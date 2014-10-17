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
	
    public function getTravels() {
        $sql = "SELECT *
                FROM Travel";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
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
    
    public function addTravelerToTravel($travelerId, $travelId) {
        $sql = "INSERT INTO Booking (TravelerID, TravelID)
                VALUES (:travelerId, :travelId)";
        $stmt = $this->dbh->prepare($sql);
        $stmt->bindValue(':travelerId', $travelerId, PDO::PARAM_INT);
        $stmt->bindValue(':travelId', $travelId, PDO::PARAM_INT);
        return $stmt->execute();
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
    
    public function getWeeklySchedule() {
        $sql = "SELECT * 
                FROM WeeklySchedule";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    public function getBookings() {
        $sql = "SELECT *
                FROM Booking";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

}
	
?>