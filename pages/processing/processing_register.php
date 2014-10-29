<?php

echo "hello";
include('../../php/classes/DatabaseInterface.class.php');
include('../../php/classes/PasswordGenerator.class.php');

$dbh = new DatabaseInterface();
$pwGenerator = new PasswordGenerator();

if(isset($_POST)) {
    $name = $_POST['Name'];
    $socialSecurityNr = $_POST['SocialSecurityNr'];
    $city = $_POST['City'];
    $zipcode = $_POST['Zipcode'];
    $street = $_POST['Street'];
    $country = $_POST['Country'];
    $username = $_POST['Username'];
    $password = $pwGenerator->generatePassword($_POST['Password']);
    echo $password;
    
    echo $result = $dbh->addTraveler($name, $socialSecurityNr, $city, $zipcode, $street, $country, $username, $password);
    if ($result) {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    else {
        echo "Error, see database exception!";
    }
    
}
