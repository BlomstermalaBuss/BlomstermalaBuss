<?php

session_start();

require_once("../../php/classes/DatabaseInterface.class.php");
require_once("../../php/classes/PasswordGenerator.class.php");

$dbh = new DatabaseInterface();
$pwGenerator = new PasswordGenerator();

if (isset($_POST['username'])) {
    echo "hello";
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $hashedPassword = $pwGenerator->generatePassword($password);
    var_dump($result = $dbh->getTravelerByUsernameAndPassword($username, $hashedPassword));
    
    if ($result != null) {
        var_dump($result);
        echo $_SESSION['user'] = $result['Username'];
        echo $_SESSION['id'] = $result['TravelerID'];
        var_dump($_SESSION);
        //die();
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        header('Location: /php/admin/pages/login.php');
    }
} else {
    die("Unallowed access method");
}


