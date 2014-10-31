<?php

session_start();

require_once("../../../php/classes/DatabaseInterface.class.php");
require_once("../../../php/classes/PasswordGenerator.class.php");

$dbh = new DatabaseInterface();
$pwGenerator = new PasswordGenerator();

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $hashedPassword = $pwGenerator->generatePassword($password);
    var_dump($result = $dbh->getAdministratorByUsernameAndPassword($username, $hashedPassword));
    
    if ($result != null) {
        foreach ($result as $administrator) {
            $_SESSION['adminname'] = $administrator['Username'];
            $_SESSION['admin'] = true;
        }
    }
    header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    die("Unallowed access method");
}

