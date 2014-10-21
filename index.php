<?php
if (isset($_SESSION['admin'])) {
    require_once("php/pages/admin/index.php");
} else {
    require_once("php/pages/user/index.php");
}
?>