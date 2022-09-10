<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>
<?php 
    include('data/chemical_model.php'); 
    include('data/getsupplier.php'); 
    $datachemical = new Chemical_data();
?>         
<style type="text/css">
    .rotate {
  animation: rotation 10s infinite linear;
}

@keyframes rotation {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(359deg);
  }
}
</style>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <img src="/inventoryphp/organic/upload/logo.png" class="rotate" height="90" align="left" >
                        <h1 class="page-header">
                            Edit Chemical
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a>
                            </li>
                            <li><a href="chemicals.php">Chemicals</a></li>
                            <li class="active">Edit Chemical</li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="modal-content">
                         
                        <?php $id = $_GET['id']; ?>
                        <?php $chemical = $datachemical->getchemicalbyid($id); ?>
                        <?php while($row = mysqli_fetch_array($chemical)): ?>
                        <form action="data/chemical_model.php?p=updatechemical&id=<?php echo $id;?>" method="POST">
                        <div class="modal-body">
                            <div class="form-group input-group">
                                <span class="input-group-addon">Chemical Name</span>
                                <input type="text" autofocus name="name" class="form-control" value="<?php echo $row['name'];?>" required/>
                            </div>
                            <div class="form-group">
                                <label>Description:</label>
                                <textarea class="ckeditor" name="description"><?php echo $row['description'];?></textarea>
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon">Quantity</span>
                                <input type="number" min="0" name="qty" value="<?php echo $row['qty'];?>" class="form-control"/>
                                <span class="input-group-addon">
                                    <select name="unitsign">
                                        <option <?php  if($row['unitsign'] == 'ml') echo "selected"?>>Ml</option>
                                        <option <?php  if($row['unitsign'] == 'gram') echo "selected"?>>Gram</option>
                                    </select>
                                </span>
                            </div>
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon">Units</span>
                                <input type="number" min="0" name="unit" value="<?php echo $row['unit'];?>" class="form-control"/>
                                <span class="input-group-addon">grams</span>
                            </div>
                            
                            <div class="form-group input-group">
                                <span class="input-group-addon">Supplier</span>
                                <select name="supplier" class="form-control">
                                    <?php while($r = mysqli_fetch_array($getsupplier)): ?>
                                        <?php $select = ($r['name']==$row['supplier']) ? "selected=selected" : null; ?>
                                        <option <?php echo $select; ?>><?php echo $r['name'];?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>                            
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-primary" href="chemicals.php">Cancel</a>
                            <a href="data/data.php?p=delete&table=chemicals&id=<?php echo $row['id'];?>" class="confirmation btn btn-danger">Delete</i></a>
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
