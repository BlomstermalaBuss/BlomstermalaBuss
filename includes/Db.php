<?php

class DatabaseConnection {

    private $dbh;
	
    private $host = "195.178.235.60";
    private $database = "ac9549";
    private $username = "ac9549";
    private $password = "kilimanjaro911";

    public function __construct() {
        $this->dbh = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->database . ';charset=utf8', $this->username, $this->password);
    }
	
    public function getAllEmployees() {
        $stmt = $this->dbh->prepare("SELECT * FROM Anstalld ORDER BY Lon DESC");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getEmployeeById($id) {
        $stmt = $this->dbh->prepare("SELECT * FROM Anstalld WHERE AnstID = :id");
        $stmt->execute(array(':id' => $id));
        return $stmt->fetch();
    }
    
    public function getEmployeesProjectsByName($name) {
        $stmt = $this->dbh->prepare("SELECT Anstalld.Namn AS AnstalldNamn, Projekt.Namn AS ProjektNamn, JobbarI.TimPerV 
                                    FROM Anstalld
                                    INNER JOIN JobbarI
                                    ON Anstalld.AnstID = JobbarI.AnstID
                                    INNER JOIN Projekt 
                                    ON JobbarI.ProjID = Projekt.ProjID
                                    WHERE Anstalld.Namn = :name
                                    ORDER BY Anstalld.Namn"
        );
        $stmt->execute(array(':name' => $name));
        return $stmt->fetchAll();
    }

}
	
?>