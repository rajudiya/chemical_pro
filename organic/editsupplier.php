<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>
<?php 
    include('data/supplier_model.php');    
    $datasupplier = new Supplier_data();
?>         
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <img src="/inventoryphp/organic/upload/logo.png" height="90" align="left" >
                        <h1 class="page-header">
                            Edit Supplier
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a>
                            </li>
                            <li><a href="suppliers.php">Supplier</a></li>
                            <li class="active">Edit Supplier</li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="modal-content">                              
                        <?php $id = $_GET['id']; ?>
                        <?php $supplier = $datasupplier->getsupplierbyid($id); ?>
                        <?php while($row = mysqli_fetch_array($supplier)): ?>
                        <form action="data/supplier_model.php?p=updatesupplier&id=<?php echo $id;?>" method="POST">
                        <div class="modal-body">
                            <div class="form-group input-group">
                                <span class="input-group-addon">Supplier Name</span>
                                <input type="text" autofocus name="name" class="form-control" value="<?php echo $row['name'];?>" required/>
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon">Company</span>
                                <input type="text" name="company" class="form-control" value="<?php echo $row['company'];?>"/>
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon">Contact No.</span>
                                <input type="text" name="contact" class="form-control" value="<?php echo $row['contact'];?>" required/>
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon">Email</span>
                                <input type="email" name="email" class="form-control" value="<?php echo $row['email'];?>"/>
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon">Address</span>
                                <input type="text" name="address" class="form-control" value="<?php echo $row['address'];?>" required/>
                            </div>
                           
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-primary" href="supplier.php">Cancel</a>
                            <a href="data/data.php?p=delete&table=supplier&id=<?php echo $row['id'];?>" class="confirmation btn btn-danger">Delete</i></a>
                            <input type="submit" value="Update" class="btn btn-success">                
                        </div>
                        </form>
                        <?php endwhile; ?>
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

<?php include('include/footer.php'); ?>
