<?php
    date_default_timezone_set('Asia/Manila'); 

    $host = 'localhost';
    $user = 'dev';
    $pass = 'dev14';
    $db = 'cinventory';

    $conn = mysqli_connect($host,$user,$pass) or die('Unable to connect');
    mysqli_select_db($conn,$db) or die('Unable to Select DB');
?>