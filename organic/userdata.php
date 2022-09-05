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
                            Users
                        </h1>
                        <div class="input-group">
                            <span class="input-group-addon alert-danger"><a href="#adduser_modal" data-toggle="modal">Add New</a></span>
                            <input type="text" class="form-control" id="searchuser" placeholder="search user...">
                        </div>
                        <br />
                        
                        <ol class="breadcrumb">
                            <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                            <li class="active">Users</li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <?php if(isset($_GET['q'])): ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center alert alert-success">
                            User <?php echo $_GET['cat']; ?> successfully <?php echo $_GET['q']; ?>!
                        </div>  
                    </div>
                </div>
                <?php endif; ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                        <th>Username</th>                                        
                                        <th>Contact</th>                                        
                                        <th>Email</th>                                        
                                    </tr>
                                </thead>
                                <tbody class="table-user">
                                        <?php $user = $datauser->getusers(); ?>
                                        <?php if(mysqli_num_rows($user)==0): ?>
                                            <tr><td class="text-danger text-center" colspan="4"><strong>*** EMPTY ***</strong></td></tr>
                                        <?php endif; ?>
                                        <?php while($row = mysqli_fetch_array($user)): ?>
                                            <tr>
                                                <td class="text-center"><a href="edituserdata.php?id=<?php echo $row['id'];?>"><?php echo $row['fname'];?></a></td>
                                                <td class="text-center"><?php echo $row['lname'];?></td>
                                                <td class="text-center"><?php echo $row['username'];?></td>
                                                <td class="text-center"><?php echo $row['contact'];?></td>
                                                <td class="text-center"><?php echo $row['email'];?></td>                                                
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
