<?php include('data/db1.php'); ?>
<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>
<?php
    $r1 = mysqli_query($conn,"SELECT * FROM items");
    $r2 = mysqli_query($conn,"SELECT * FROM chemicals");
    $r3 = mysqli_query($conn,"SELECT * FROM supplier");
    $r4 = mysqli_query($conn,"SELECT * FROM userdata");
    $logs = mysqli_query($conn,"SELECT * FROM logs order by date desc limit 0,20");
    $countitem = mysqli_num_rows($r1);
    $countchemical = mysqli_num_rows($r2);
    $countsupplier = mysqli_num_rows($r3);
    $countuser = mysqli_num_rows($r4);
    
?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <img src="/inventoryphp/organic/upload/logo.png" height="90" align="left" >
                        <h1 class="page-header">
                            Dashboard <small>Statistics Overview</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <!-- <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tint fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php //echo $countitem; ?></div>
                                        <div>Items!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="items.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div> -->
                    
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-flask fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $countchemical; ?></div>
                                        <div>Chemicals!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="chemicals.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-truck fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $countsupplier; ?></div>
                                        <div>Suppliers!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="supplier.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $countuser; ?></div>
                                        <div>Users!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="userdata.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                    <!-- <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Logs</h3>
                            </div>
                            <div class="panel-body">
                                <div class="list-group">
                                    <?php //while($row = mysqli_fetch_array($logs)): ?>
                                    <a href="#" class="list-group-item">
                                        <span class="badge"><?php //echo $row['date'];?></span>
                                        <i class="fa fa-fw fa-calendar"></i>
                                        <?php //echo $row['user'].' '.$row['operation']; ?>
                                    </a>
                                    <?php //endwhile; ?>
                                </div>
                                <div class="text-right">
                                    <a href="reports.php">View All Activity <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
 -->
                    <div>
                        
                        <img class="pull-left" src="/inventoryphp/organic/upload/dep.jpg" class="img-rounded" alt="Cinque Terre" width="175" height="150" style="align:right; padding-left: 12px; margin-bottom: 170px; overflow: hidden;">               
                            <div class="col-xs-10">
                                <h4 class="card-title"><b><u>DEPARTMENT OF CHEMISTRY</u></b></h4>
                                <p class="card-text text-justify" style="font-size: 17px">Dear learned visitor, WaDescription: <a href="https://www.saurashtrauniversity.edu/university/academic-departments/department-of-chemistry">DEPARTMENT-OF-CHEMISTRY</a>. H S Joshi-2.jpgrm Greetings from the Department of chemistry, Saurashtra University Rajkot. Ours is one of the department established in 1979 on the main campus. It started as a single faculty department in the subject of chemistry to the students mainly coming from the rural background and impart necessary skills required for the grooming chemical industries in this western part of the country, for creating self-entrepreneurs and also churn out academicians and researchers who can take up jobs in educational institutes and research laboratories. With a small beginning, the path for progress and development was smooth and gradual.</p>
                            </div>
                        </div></div>
                    <div class="text-center p-5" style="background-color: rgba(0, 0, 0, 0.2);">
                            <b>Copyright ©<?php echo $date = date("Y"); ?> -present Department of Computer Science(MCA), Inc. All rights reserved.
                            </b>
                        </div>
                    </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>