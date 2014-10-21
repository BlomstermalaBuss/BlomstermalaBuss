<?php

session_start();

require_once("../../../classes/DatabaseInterface.class.php");
require_once("../../../classes/PasswordGenerator.class.php");

$dbh = new DatabaseInterface();
$pwGenerator = new PasswordGenerator();

if (isset($_POST['username'])) {
    echo "hello";
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $hashedPassword = $pwGenerator->generatePassword($password);
    var_dump($result = $dbh->getAdministratorByUsernameAndPassword($username, $hashedPassword));
    
    if ($result != null) {
        foreach ($result as $administrator) {
            $_SESSION['username'] = $administrator['Username'];
            $_SESSION['admin'] = true;
        }
        var_dump($_SESSION);
        header('Location: /php/admin/pages/index.php');
    } else {
        header('Location: /php/admin/pages/login.php');
    }
} else {
    die("Unallowed access method");
}

