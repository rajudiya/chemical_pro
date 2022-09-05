<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>
<?php 
    include('data/userdata_model.php');    
    $datauser = new User_data();
?>         
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <img src="/inventoryphp/organic/upload/logo.png" height="90" align="left" >
                        <h1 class="page-header">
                            Edit User
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
                        <?php $user = $datauser->getuserbyid($id); ?>
                        <?php while($row = mysqli_fetch_array($user)): ?>
                        <form action="data/userdata_model.php?p=updateuser&id=<?php echo $id;?>" method="POST">
                        <div class="modal-body">
                            <div class="error"></div>
                            <div class="form-group input-group">
                                <span class="input-group-addon">Access Key</span>
                                <input type="text" autofocus id="access-key" class="form-control" required/>
                            </div>
                            <hr />
                            <div class="hidethis">
                                <div class="form-group input-group">
                                    <span class="input-group-addon">Firstname</span>
                                    <input type="text" name="fname" class="form-control" value="<?php echo $row['fname']; ?>" required/>
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon">Lastname</span>
                                    <input type="text" name="lname" class="form-control" value="<?php echo $row['lname']; ?>" required/>
                                </div>      
                                <div class="form-group input-group">
                                    <span class="input-group-addon">Username <small>Can't be changed:</small></span>
                                    <input type="hidden" name="username" value="<?php echo $row['username']; ?>" class="form-control username_edit"/>
                                    <input type="text" value="<?php echo $row['username']; ?>" class="form-control" disabled />
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon">Password</span>
                                    <input type="password" name="password" class="form-control" required/>
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon">Contact</span>
                                    <input type="text" name="contact" class="form-control" value="<?php echo $row['contact']; ?>" required/>
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon">Email</span>
                                    <input type="email" name="email" class="form-control" value="<?php echo $row['email']; ?>"/>
                                </div>
                                <div class="form-group input-group">
                                    <span class="input-group-addon">Address</span>
                                    <input type="text" name="address" class="form-control" value="<?php echo $row['address']; ?>" required/>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-primary" href="userdata.php">Cancel</a>
                            <a href="data/data.php?p=delete&table=userdata&id=<?php echo $row['id'];?>" class="confirmation btn btn-danger">Delete</i></a>
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
