<?php
    include('db1.php');
    $q = "SELECT name from supplier ";
    $camicalname = "SELECT name FROM chemicals";
    $getsupplier = mysqli_query($conn,$q);
    //$getsupplier2 = mysqli_query($con,$q);
    $getcamicalname = mysqli_query($conn,$camicalname);
    $getcompany = mysqli_query($conn,"SELECT company FROM chemicals");
    //$getunitsign=mysqli_query($conn,"SELECT unitsign FROM chemicals WHERE name=$name")

    //$query = mysqli_query($conn,"SELECT supplier,name,company FROM chemicals");
    
?>