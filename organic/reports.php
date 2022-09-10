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
                    <div class="col-lg-12">
                        <img src="/inventoryphp/organic/upload/logo.png" class="rotate" height="90" align="left" >
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
                    <form action="print.php?p=report" action="get">
                    <div class="col-lg-12">
                        <div class="form-group input-group">
                            <span class="input-group-addon">From</span>
                            <input type="date" placeholder="mm/dd/yyyy" name="datefrom" class="form-control " >
                            
                            <span class="input-group-addon">To</span>
                            <input type="date" placeholder="mm/dd/yyyy" name="dateTo" class="form-control">
                        </div>
                        <div class="form-group input-group">  
                            <span class="input-group-addon">Show data from</span>
                            <select name="filter" class="form-control filter">
                                <option>Chemicals</option>
                                <option>Suppliers</option>
                            </select>                    
                        </div>
                        <div class="form-group" align="center">
                            <button type="button" class="btnreport btn btn-primary">Submit</button>
                        </div>
                    </div>
                    </form>  
                </div>  
                <!-- /.row -->
                <hr />
                 <div class="row">
                    <div class="col-lg-12">
                        <div class="reports table-responsive">
                            <h3>
                                REPORTS: 
                                <?php $datefrom = '01/01/21'; ?>
                                <?php $dateto = date('d/m/y'); ?>
                                <a href="print.php?from=<?php echo $datefrom;?>&to=<?php echo $dateto;?>" target="_blank" class="btn btn-warning pull-right">View Full Report</a>
                            </h3>
                            <br />
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
