<?php
    include('data/db.php');
    $base_url = "http://localhost/inventoryphp/organic/";
    if(!isset($_SESSION['login'])){
        header("Location:login.php");
    }        
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>DEPARTMENT OF CHEMISTRY SAURASHTRA UNIVERSITY</title>
    <link rel="icon" type="image/x-icon" href="/inventoryphp/organic/upload/logo.png">
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/mystyle.css" rel="stylesheet">
    <link href="css/jquery-ui.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- <img src="/inventoryphp/organic/upload/logo.png" height="50" align="left" > -->
                <a class="navbar-brand" href="index.php">Organic Lab</a>
            </div>
            <style>
        .blink {
            animation: blinker 1.5s linear infinite;
            color: white;
            font-family: sans-serif;
        }
        @keyframes blinker {
            50% {
                opacity: 0;
            }
        }
    </style>
            <marquee width="80%" direction="cent" class="blink">
            <h4>DEPARTMENT OF CHEMISTRY SAURASHTRA UNIVERSITY</h4>
            </marquee>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">                                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>admin <b class="caret"></b></a>
                    <ul class="dropdown-menu">           
                        <!-- <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li> -->
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>