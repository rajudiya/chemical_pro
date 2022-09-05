<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>
<?php 
    include('data/item.php');
    $dataitem = new Itemdata();

?>
           
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <img src="/inventoryphp/organic/upload/logo.png" height="90" align="left" >
                        <h1 class="page-header">
                            Reports
                        </h1>
                        
                        <ol class="breadcrumb">
                            <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                            <li class="active">Reports</li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->                
             
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group input-group">
                            <span class="input-group-addon">From</span>
                            <input type="text" placeholder="mm/dd/yyyy" name="datefrom" class="form-control " id="dateFrom">
                            
                            <span class="input-group-addon">To</span>
                            <input type="text" placeholder="mm/dd/yyyy" name="dateTo" class="form-control" id="dateTo">
                        </div>
                        <div class="form-group input-group">  
                            <span class="input-group-addon">Show data from</span>
                            <select name="filter" class="form-control filter">
                                <option>Items</option>
                                <option>Chemicals</option>
                                <option>Suppliers</option>
                                <option>Logs</option>
                            </select>                    
                        </div>
                        <div class="form-group">
                            <button type="button" class="btnreport btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>    
                <!-- /.row -->
                <hr />
                 <div class="row">
                    <div class="col-lg-12">
                        <div class="reports table-responsive">
                            <h3>
                                REPORTS: ITEM
                                <?php $datefrom = '01/01/70'; ?>
                                <?php $dateto = date('m/d/y'); ?>
                                <?php $dateto = date('m/d/y',strtotime($dateto . "+1 days")); ?>
                                <a href="print.php?report=items&from=<?php echo $datefrom;?>&to=<?php echo $dateto;?>" target="_blank" class="btn btn-warning pull-right">View Full Report</a>
                            </h3>
                            <br />
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Item Name</th>
                                        <th>Quantity</th>
                                        <th>Unit</th>
                                        <th>Remarks</th>
                                        <th>Item In</th>
                                        <th>Item Updated</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $item = $dataitem->getitems(); ?>
                                    <?php if(mysqli_num_rows($item)==0): ?>
                                        <tr><td class="text-danger text-center" colspan="4"><strong>*** EMPTY ***</strong></td></tr>
                                    <?php endif; ?>
                                    <?php while($row = mysqli_fetch_array($item)): ?>
                                        <tr>
                                            <td><?php echo $row['name']; ?></td>
                                            <td class="text-center"><?php echo $row['qty']; ?></td>
                                            <td class="text-center"><?php echo $row['unit'].' '.$row['unitsign']; ?></td>
                                            <td class="text-center"><?php echo $row['remark']; ?></td>
                                            <td class="text-center"><?php echo $row['dateIn']; ?></td>                
                                            <td class="text-center"><?php echo $row['dateUpdated']; ?></td>   
                                        </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include('include/modal.php'); ?>
<?php include('include/footer.php'); ?>
