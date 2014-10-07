<?php

require_once('../../DatabaseConfiguration.class.php');

class DatabaseInterface {

    private $dbh;
    
    
    //test text
    
    public function __construct() {
        $dbConf = new DatabaseConfiguration();
        
        $this->dbh = new PDO('mysql:host=' . $dbConf->getHost() . ';'
                           . 'dbname=' . $dbConf->getDatabase() . ';'
                           . 'charset=utf8', $dbConf->getUsername(), $dbConf->getPassword());
    }
	
    public function getTravels() {
        $sql = "SELECT * FROM Travels";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    public function addTraveler($name, $socialSecuritynNr, $city, $zipcode, $street, $country) {
        $sql = "INSERT INTO Traveler (Name, SocialSecurityNr, City, Zipcode, Street, Country)
                VALUES (:name, :socialSecurityNr, :city, :zipcode, :street, :country)";
        $stmt = $this->dbh->prepare($sql);
        $result = $stmt->execute(array(':name' => $name,
                             ':socialSecurityNr' => $socialSecuritynNr,
                             ':city' => $city,
                             ':zipcode' => $zipcode,
                             ':street' => $street,
                             ':country' => $country));
        return $result;
    }
    
    public function getTravelers() {
        $sql = "SELECT * FROM Travelers";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    public function getWeeklySchedule() {
        $sql = "SELECT * FROM WeeklySchedule";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    public function getBookings() {
        $sql = "SELECT * FROM Booking";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

}
	
?>