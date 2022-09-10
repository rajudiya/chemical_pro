<?php
    include('data/db.php');
    $datefrom = $_GET['from'];
    $dateto = $_GET['to'];
    $report = $_GET['report'];
    
?>
<!DOCTYPE html>
<html>
<head>
     <title>DEPARTMENT OF CHEMISTRY SAURASHTRA UNIVERSITY</title>
    <link rel="icon" type="image/x-icon" href="/inventoryphp/organic/upload/logo.png">
    <style>
        .wrapper {
            margin-top:20px !important;            
            border:1px solid #777;
            background:#fff;
            margin:0 auto;
            padding: 20px;
        }
        body {
            background:#ccc;   
        }
        img {
            max-height:150px;   
            max-width:150px;   
            margin-right:10px;
        }
    </style>
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css" />
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="wrapper">
                <?php
                if($report == 'chemicals'){
                    include('reports/full_chemical_report.php'); 
                }else if($report == 'items'){
                    include('reports/full_item_report.php'); 
                }else if($report == 'suppliers'){
                    include('reports/full_supplier_report.php'); 
                }else if($report == 'logs'){
                    include('reports/full_log_report.php'); 
                }
                ?>
            </div>  
        </div>
    </div>
</body>
</html>