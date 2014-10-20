<?php
require_once("php/classes/DatabaseInterface.class.php");


?>
<table>
    <tr>
        <td><a href="?p=weeklyschedule&amp;wsmode=add">Add weekly schedule</a></td>
        <td><a href="?p=weeklyschedule&amp;wsmode=edit">Edit weekly schedule</a></td>
        <td><a href="?p=weeklyschedule&amp;wsmode=remove">Remove weekly schedule</a></td>
    </tr>
</table>
<div class="border"></div>
<?php
$get = filter_input(INPUT_GET, 'wsmode', FILTER_SANITIZE_STRING);
if (isset($get)) {
    require_once("php/pages/fragment/weeklyschedule_" . $get . ".php");
}
else {
    require_once("php/pages/fragment/weeklyschedule_add.php");
}
?>