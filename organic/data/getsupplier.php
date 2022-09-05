<?php
    include('db1.php');
    $q = "SELECT * from supplier order by name asc";
    $camicalname = "SELECT name FROM chemicals";
    $getsupplier = mysqli_query($con,$q);
    $getsupplier2 = mysqli_query($con,$q);
    $getcamicalname = mysqli_query($con,$camicalname);
?>