<?php

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
            if (!isset($_SESSION['user'])) {
                ?>
                <p>You must be logged in to use this page.</p>
                <form method="POST" action="pages/processing/processing_login.php">
                    <label>Username</label><input name="username" type="text">
                    <label>Password</label><input name="password" type="password">
                    <input type="submit">
                </form>
                <?php
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