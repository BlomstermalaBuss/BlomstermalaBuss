<?php

require_once('../../DatabaseConfiguration.class.php');

class DatabaseInterface {

    private $dbh;
    
    public function __construct() {
        $dbConf = new DatabaseConfiguration();
        
        $this->dbh = new PDO('mysql:host=' . $dbConf->getHost() . ';'
                           . 'dbname=' . $dbConf->getDatabase() . ';'
                           . 'charset=utf8', $dbConf->getUsername(), $dbConf->getPassword());
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