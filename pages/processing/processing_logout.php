<?php

    session_start();
    unset($_SESSION['name']);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    
?>