<!DOCTYPE html>
<html>
    <head>
        <title>Blomstermåla Buss Bokningssystem</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css"/>
    </head>
    <body>
        <div id="container">
            <div id="menu">
                <table>
                    <tr>
                        <td><a href="?p=home">Hem</a></td>
                        <td><a href="?p=booking">Boka resor</a></td>
                        <td><a href="?p=cancellation">Avbokning</a></td>
                        <td><a href="?p=weeklyschedule">Hantera veckoschema</a></td>
                    </tr>
                </table>
            </div>
            <div class="border"></div>
            <div id="textcontainer">
            <?php
            
                $get = filter_input(INPUT_GET, 'p', FILTER_SANITIZE_STRING);
                if (isset($get)) {
                    require_once("pages/" . $get . ".php");
                }
                else {
                    require_once("pages/home.php");
                }
            
            ?>
            </div>
        </div>
    </body>
</html>
