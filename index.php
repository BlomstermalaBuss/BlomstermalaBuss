<!DOCTYPE html>
<html>
    <head>
        <title>Blomstermåla Buss Bokningssystem</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/style.css"/>
        <script type="text/javascript" src="http://code.jquery.com/jquery.js"></script>
        <script type="text/javascript" src="js/showdiv.js"></script>
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
                    require_once("php/pages/" . $get . ".php");
                }
                else {
                    require_once("php/pages/home.php");
                }
            
            ?>
            </div>
        </div>
    </body>
</html>
