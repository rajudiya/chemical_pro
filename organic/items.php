<?php include('include/header.php'); ?>
<?php include('include/sidebar.php'); ?>
<?php 
    include('data/item.php');    
    $dataitem = new Itemdata();
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
                    <div class="col-lg-12" style="margin-top: 10px;">
                        <img src="/inventoryphp/organic/upload/logo.png" class="rotate" height="90" align="left" >
                        <h1 class="page-header">
                            Items
                        </h1>
                        <div class="input-group">
                            <span class="input-group-addon alert-danger"><a href="#additem_modal" data-toggle="modal" class="clearitemid">Add New</a></span>
                            <input type="text" class="form-control" id="searchitem" placeholder="search item...">
                        </div>
                        <br />
                        
                        <ol class="breadcrumb">
                            <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                            <li class="active">Items</li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->
                <?php if(isset($_GET['q'])): ?>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center alert alert-success">
                            Item <?php echo $_GET['cat']; ?> successfully <?php echo $_GET['q']; ?>!
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
                                        <th>Item Name</th>
                                        <th>Qty</th>
                                        <th>Units</th>
                                        <th>Functional</th>
                                    </tr>
                                </thead>
                                <tbody class="table-item">
                                        <?php $item = $dataitem->getitems(); ?>
                                        <?php if(mysqli_num_rows($item)==0): ?>
                                            <tr><td class="text-danger text-center" colspan="4"><strong>*** EMPTY ***</strong></td></tr>
                                        <?php endif; ?>
                                        <?php while($row = mysqli_fetch_array($item)): ?>
                                            <tr>
                                                <td><a href="edititem.php?id=<?php echo $row['id'];?>"><?php echo $row['name'];?></a></td>
                                                <td class="text-center">
                                                    <a href="data/item.php?p=updateqty&op=plus&id=<?php echo $row['id'];?>"><i class="text-success fa fa-plus-circle fa-lg"></a></i> 
                                                    &nbsp;<?php echo $row['qty'];?>&nbsp;
                                                    <a href="data/item.php?p=updateqty&op=minus&id=<?php echo $row['id'];?>"><i class="text-danger fa fa-minus-circle fa-lg"></a></i>
                                                </td>
                                                <td class="text-center">
                                                    <a href="data/item.php?p=updateunit&op=plus&id=<?php echo $row['id'];?>"><i class="text-success fa fa-plus-circle fa-lg"></i></a>&nbsp;
                                                    <?php echo $row['unit'].' '.$row['unitsign'];?>
                                                    &nbsp;<a href="data/item.php?p=updateunit&op=minus&id=<?php echo $row['id'];?>"><i class="text-danger fa fa-minus-circle fa-lg"></a></i>
                                                </td>                                                
                                                <td class="text-center">
                                                    <?php if($row['remark']=='Functional'){
                                                        $class = "fa fa-thumbs-o-up fa-lg text-success";
                                                        $op = 'disable';
                                                    }else{
                                                        $class = "fa fa-thumbs-o-down fa-lg text-danger";
                                                        $op = 'enable';
                                                    }
                                                ?>
                                                <a href="data/item.php?p=updateremark&op=<?php echo $op?>&id=<?php echo $row['id'];?>"><i class="<?php echo $class?>"></i>
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
