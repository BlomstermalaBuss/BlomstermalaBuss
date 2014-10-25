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
    
    ////////////////////////////////
    /// --- UTILITY METHODS --- ////
    ////////////////////////////////
    public function getDbh() {
        return $this->dbh;
    }
    
    ///////////////////////////////////////////////////
    /// --- DATABASE METHODS FOR ADMINISTRATOR --- ////
    ///////////////////////////////////////////////////
    public function addAdministrator($username, $password) {
        $sql = "INSERT INTO Administrator (Username, Password)
                VALUES (:username, :password)";
        try {
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue(':username', $username, PDO::PARAM_STR);
            $stmt->bindValue(':password', $password, PDO::PARAM_STR);
            return $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
    }
    
    public function getAdministratorByUsernameAndPassword($username, $password) {
        $sql = "SELECT * 
                FROM Administrator
                WHERE Username = :username
                AND Password = :password";
        try {
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue(':username', $username, PDO::PARAM_STR);
            $stmt->bindValue(':password', $password, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
    }
    
    //////////////////////////////////////////////
    /// --- DATABASE METHODS FOR BOOKINGS --- ////
    //////////////////////////////////////////////
    public function addBooking($travelerId, $travelId) {
        $sql = "INSERT INTO Booking (TravelerID, TravelID)
                VALUES (:travelerId, :travelId)";
        try {
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue(':travelerId', $travelerId, PDO::PARAM_INT);
            $stmt->bindValue(':travelId', $travelId, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
    }
    
    public function getBookings() {
        $sql = "SELECT *
                FROM Booking";
        try {
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
    }
    
    public function removeBooking($bookingId) {
        $sql = "DELETE FROM Booking
                WHERE BookingID = :bookingId";
        try {
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue(':bookingId', $bookingId, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
    }
    
    public function removeBookingByTravelId($travelId) {
        $sql = "DELETE FROM Booking
                WHERE TravelID = :travelId";
        try {
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue(':travelId', $travelId, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
    }
    
    public function removeBookingByTravelerId($travelerId) {
        $sql = "DELETE FROM Booking
                WHERE TravelerID = :travelerId";
        try {
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue(':travelerId', $travelerId, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
    }
    
    public function removeBookingByTravelerIdAndTravelId($travelerId, $travelId) {
        $sql = "DELETE FROM Booking
                WHERE TravelerID = :travelerId 
                AND TravelID = :travelId";
        try {
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue(':travelerId', $travelerId, PDO::PARAM_INT);
            $stmt->bindValue(':travelId', $travelId, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
    }
    
    ////////////////////////////////////////////
    /// --- DATABASE METHODS FOR TRAVEL --- ////
    ////////////////////////////////////////////
    public function addTravel($date, $weeklyScheduleId) {
        $sql = "INSERT INTO Travel (Date, WeeklyScheduleID)
                VALUES (:date, :weeklyScheduleId)";
        try {
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue(':date', $date, PDO::PARAM_STR);
            $stmt->bindValue(':weeklyScheduleId', $weeklyScheduleId, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
    }
    
    public function editTravel($id, $date, $weeklyScheduleId) {
        $sql = "UPDATE Travel
                SET Date = :date, WeeklyScheduleID = :weeklyScheduleId
                WHERE TravelID = :id";
        try {
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue(':date', $date, PDO::PARAM_STR);
            $stmt->bindValue(':weeklyScheduleId', $weeklyScheduleId, PDO::PARAM_INT);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
    }
    
    public function getTravels() {
        $sql = "SELECT *
                FROM Travel";
        try {
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
    }
    
    public function getTravel($id) {
        $sql = "SELECT *
                FROM Travel
                WHERE TravelID = :id";
        try {
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
    }
    
    public function getTravelByWeeklyScheduleIdAndDate($id, $date) {
        $sql = "SELECT * 
                FROM Travel
                WHERE WeeklyScheduleID = :id
                AND Date = :date";
        try {
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->bindValue(':date', $date, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
    }
    
    public function getTravelsByTravelerId($id) {
        $sql = "SELECT Travel.TravelID AS TravelID, WeeklySchedule.WeeklyScheduleID AS WeeklyScheduleID, WeeklySchedule.Departure AS Departure, 
                       WeeklySchedule.Destination AS Destination, WeeklySchedule.Day AS Day, WeeklySchedule.DepartureTime as DepartureTime, 
                       WeeklySchedule.ArrivalTime AS ArrivalTime, WeeklySchedule.Price AS Price
                FROM Travel
                INNER JOIN Booking
                ON Travel.TravelID = Booking.TravelID
                INNER JOIN Traveler
                ON Booking.TravelerID = Traveler.TravelerID
                INNER JOIN WeeklySchedule
                ON Travel.WeeklyScheduleID = WeeklySchedule.WeeklyScheduleID
                WHERE Traveler.TravelerID = :id";
        try {
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
    }
    
    public function removeTravel($id) {
        $sql = "DELETE FROM Travel
                WHERE TravelID = :id";
        try {
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
    }
    
    //////////////////////////////////////////////
    /// --- DATABASE METHODS FOR TRAVELER --- ////
    //////////////////////////////////////////////
    public function addTraveler($name, $socialSecurityNr, $city, $zipcode, $street, $country) {
        $sql = "INSERT INTO Traveler (Name, SocialSecurityNr, City, Zipcode, Street, Country)
                VALUES (:name, :socialSecurityNr, :city, :zipcode, :street, :country)";
        try {
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue(':name', $name, PDO::PARAM_STR);
            $stmt->bindValue(':socialSecurityNr', $socialSecurityNr, PDO::PARAM_STR);
            $stmt->bindValue(':city', $city, PDO::PARAM_STR);
            $stmt->bindValue(':zipcode', $zipcode, PDO::PARAM_STR);
            $stmt->bindValue(':street', $street, PDO::PARAM_STR);
            $stmt->bindValue(':country', $country, PDO::PARAM_STR);
            return $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
    }
    
    public function editTraveler($id, $name, $socialSecurityNr, $city, $zipcode, $street, $country) {
        $sql = "UPDATE Traveler
                SET Name = :name, SocialSecurityNr = :socialSecurityNr, City = :city, Zipcode = :zipcode, 
                    Street = :street, Country = :country;
                WHERE WeeklyScheduleID = :id";
        try {
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue(':name', $name, PDO::PARAM_STR);
            $stmt->bindValue(':socialSecurityNr', $socialSecurityNr, PDO::PARAM_STR);
            $stmt->bindValue(':city', $city, PDO::PARAM_STR);
            $stmt->bindValue(':zipcode', $zipcode, PDO::PARAM_STR);
            $stmt->bindValue(':street', $street, PDO::PARAM_STR);
            $stmt->bindValue(':country', $country, PDO::PARAM_STR);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
    }
    
    public function getTravelers() {
        $sql = "SELECT *
                FROM Traveler";
        try {
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
    }
    
    public function getTravelerByUsernameAndPassword($username, $password) {
        $sql = "SELECT * 
                FROM Traveler
                WHERE Username = :username
                AND Password = :password";
        try {
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue(':username', $username, PDO::PARAM_STR);
            $stmt->bindValue(':password', $password, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
    }
    
    public function getTraveler($id) {
        $sql = "SELECT *
                FROM Traveler
                WHERE TravelerID = :id";
        try {
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
    }
    
    public function getTravelersByTravelId($id) {
        $sql = "SELECT Name, SocialSecurityNr, City, Zipcode, Street, Country
                FROM Traveler
                INNER JOIN Booking
                ON Traveler.TravelerID = Booking.TravelerID
                INNER JOIN Travel
                ON Booking.TravelID = Travel.TravelID
                WHERE Travel.TravelID = :id";
        try {
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
    }
    
    public function removeTraveler($id) {
        $sql = "DELETE FROM Traveler
                WHERE TravelerID = :id";
        try {
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
    }
    
    /////////////////////////////////////////////////////
    /// --- DATABASE METHODS FOR WEEKLY SCHEDULE --- ////
    /////////////////////////////////////////////////////
    public function addWeeklySchedule($departure, $destination, $day, $departureTime, $arrivalTime, $price, $maxTravelerAmount) {
        $sql = "INSERT INTO WeeklySchedule (Departure, Destination, Day, DepartureTime, ArrivalTime, Price, MaxTravelerAmount)
                VALUES (:departure, :destination, :day, :departureTime, :arrivalTime, :price, :maxTravelerAmount)";
        try {
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue(':departure', $departure, PDO::PARAM_STR);
            $stmt->bindValue(':destination', $destination, PDO::PARAM_STR);
            $stmt->bindValue(':day', $day, PDO::PARAM_STR);
            $stmt->bindValue(':departureTime', $departureTime, PDO::PARAM_STR);
            $stmt->bindValue(':arrivalTime', $arrivalTime, PDO::PARAM_STR);
            $stmt->bindValue(':price', $price, PDO::PARAM_STR);
            $stmt->bindValue(':maxTravelerAmount', $maxTravelerAmount, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
    }
    
    public function editWeeklySchedule($id, $departure, $destination, $day, $departureTime, $arrivalTime, $price, $maxTravelerAmount) {
        $sql = "UPDATE WeeklySchedule
                SET Departure = :departure, Destination = :destination, Day = :day, DepartureTime = :departureTime,
                    ArrivalTime = :arrivalTime, Price = :price, MaxTravelerAmount = :maxTravelerAmount
                WHERE WeeklyScheduleID = :id";
        try {
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
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
    }
    
    public function getWeeklySchedules() {
        $sql = "SELECT * 
                FROM WeeklySchedule";
        try {
            $stmt = $this->dbh->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
    }
    
    public function getWeeklySchedule($id) {
        $sql = "SELECT * 
                FROM WeeklySchedule
                WHERE WeeklyScheduleID = :id";
        try {
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
    }
    
    public function removeWeeklySchedule($id) {
        $sql = "DELETE FROM WeeklySchedule
                WHERE WeeklyScheduleID = :id";
        try {
            $stmt = $this->dbh->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
            die();
        }
    }

}