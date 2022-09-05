<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>
<?php 
    include('data/chemical_model.php');    
    $datachemical = new Chemical_data();

?>
        <div id="page-wrapper">
            <style type="text/css">
                input {
                    border-style: hidden;
                      }
            </style>
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <img src="/inventoryphp/organic/upload/logo.png" height="90" align="left" >
                        <h1 class="page-header">Chemicals</h1>
                        <div class="input-group">
                            <span class="input-group-addon alert-danger"><a href="#addchemical_modal" data-toggle="modal">Add New</a></span>
                            <input type="text" class="form-control" id="searchchemical" placeholder="search chemical...">
                        </div>
                        <br />
                        
                        <ol class="breadcrumb">
                            <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                            <li class="active">Chemicals</li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <?php if(isset($_GET['q'])): ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center alert alert-success">
                            Chemical <?php echo $_GET['cat']; ?> successfully <?php echo $_GET['q']; ?>!
                        </div>  
                    </div>
                </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped" border="1px">
                                <thead>
                                    <tr>
                                        <th>Chemical Name</th>
                                        <th>Company Name</th>
                                        <th>Supplier</th>
                                        <!-- <th>Total Qty</th> -->
                                        <th>Remaining Qty</th>
                                        <!-- <th>Units</th> -->
                                        <th>Issue Date</th>
                                        <th>To Give</th>                                        
                                    </tr>
                                </thead>
                                <tbody class="table-chemical">
                                        <?php $chemical = $datachemical->getchemicals(); ?>
                                        <?php if(mysqli_num_rows($chemical)==0): ?>
                                            <tr><td class="text-danger text-center" colspan="4"><strong>*** EMPTY ***</strong></td></tr>
                                        <?php endif; ?>
                                        <?php while($row = mysqli_fetch_array($chemical)): ?>
                                            <tr>
                                                <td>
                                                    <a href="editchemical.php?id=<?php echo $row['id'];?>"><?php echo $row['name'];?>  
                                                    </a>
                                                </td>
                                                 <td class="text-left">
                                                    <div readonly>
                                                        <?php echo $row['company'];?>
                                                    </div>
                                                </td>
                                                <td class="text-left">
                                                    <div readonly>
                                                        <?php echo $row['supplier'];?>
                                                    </div>
                                                </td>
                                                <td class="text-left">
                                                    <div readonly>
                                                        <?php echo $row['qty']." ".$row['unitsign'];?>
                                                    </div>
                                                </td>
                                                <!-- <td></td> -->
                                                <td class="text-left">
                                                    <div readonly>
                                                        <?php echo $row['unit'];?>
                                                    </div>
                                                </td> 
                                                <td class="text-left">
                                                    <div readonly>
                                                        <?php echo $row['dateIn'];?>
                                                    </div>
                                                </td>
                                                <td>

                                                    <span class="input-group-addon alert-danger"><a href="#to_give" data-toggle="modal" target = "_blank">To Give</a></span>
                                                </td>                                             
                                                
                                            </tr>
                                        <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <!-- /.row -->

                

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include('include/modal.php'); ?>
<?php include('include/footer.php'); ?>
