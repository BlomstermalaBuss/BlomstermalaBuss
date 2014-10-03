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
	
    public function getEmployees() {
        $sql = "SELECT * FROM Anstalld";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getEmployeeById($id) {
        $sql = "SELECT * FROM Anstalld WHERE AnstID = :id";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute(array(':id' => $id));
        return $stmt->fetch();
    }
    
    public function getProjectsByEmployeeName($name) {
        $sql = "SELECT Anstalld.Namn AS AnstalldNamn, Projekt.Namn AS ProjektNamn, JobbarI.TimPerV 
                                    FROM Anstalld
                                    INNER JOIN JobbarI
                                    ON Anstalld.AnstID = JobbarI.AnstID
                                    INNER JOIN Projekt 
                                    ON JobbarI.ProjID = Projekt.ProjID
                                    WHERE Anstalld.Namn = :name
                                    ORDER BY Anstalld.Namn";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute(array(':name' => $name));
        return $stmt->fetchAll();
    }

}
	
?>