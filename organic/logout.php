<?php
    include('data/db.php');
    $user = $_SESSION['fullname'];
    $date = date('m/d/Y h:i A');
    $operation = 'logged out';
    $q = "insert into logs values(null,'$user','$operation','$date')";
    mysqli_query($con,$q);
    unset($_SESSION['login']);
    unset($_SESSION['fullname']);
    unset($_SESSION['key']);
    header('location:login.php');
?>