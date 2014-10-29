<?php

    ob_start();
    session_start();
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Blomstermåla Buss Booking System</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css"/>
    </head>
    <body>
        <div id="container">
            <?php
            if (isset($_SESSION['name'])) {
                include("pages/fragment/user.php");
            }
            ?>
            <div id="menu">
                <table>
                    <tr>
                        <td><a href="?p=home">Home</a></td>
                        <td><a href="?p=booking">Book travel</a></td>
                        <td><a href="?p=cancellation">Cancellation</a></td>
                    </tr>
                </table>
            </div>
            <div class="border"></div>
            <div id="textcontainer">
            <?php
            if (isset($_GET['p']) && $_GET['p'] == "register") {
                include("pages/fragment/register.php");
            } else if (!isset($_SESSION['name'])) {
                    require_once("pages/fragment/login.php");
            } else {
                $get = filter_input(INPUT_GET, 'p', FILTER_SANITIZE_STRING);
                if (isset($get)) {
                    require_once("pages/" . $get . ".php");
                }
                else {
                    require_once("pages/home.php");
                }
            }
            ?>
            </div>
        </div>
    </body>
</html>