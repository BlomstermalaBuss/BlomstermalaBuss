<?php

session_start();

require_once("../../php/classes/DatabaseInterface.class.php");

$dbh = new DatabaseInterface();

if (isset($_POST['mode'])) {
    if ($_POST['mode'] == "deletetravel") {
        $idArray = $_POST['id'];

        foreach ($idArray as $id => $value) {
            $dbh->removeTravel($value);
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}

