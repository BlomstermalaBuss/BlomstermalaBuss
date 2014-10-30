<?php

ob_start();
session_start();

require_once("../../php/classes/DatabaseInterface.class.php");
require_once("../../php/classes/PasswordGenerator.class.php");

$dbh = new DatabaseInterface();
$pwGenerator = new PasswordGenerator();

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $hashedPassword = $pwGenerator->generatePassword($password);
    $result = $dbh->getTravelerByUsernameAndPassword($username, $hashedPassword);
    
    if ($result != null) {
        echo $_SESSION['name'] = $result['Name'];
        echo $_SESSION['id'] = $result['TravelerID'];
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    die("Unallowed access method");
}


