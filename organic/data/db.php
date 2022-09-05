<?php
    session_start();
    date_default_timezone_set('Asia/Manila'); 

    $host = 'localhost';
    $user = 'dev';
    $pass = 'dev14';
    $db = 'cinventory';

    $con = mysqli_connect($host,$user,$pass) or die('Unable to connect');
    mysqli_select_db($con,$db) or die('Unable to Select DB');
?>