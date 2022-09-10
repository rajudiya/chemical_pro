<?php
include('/var/www/html/inventoryphp/organic/data/db1.php');
     $q = "SELECT * FROM items WHERE (dateIn BETWEEN '$datefrom' AND '$dateto') order by dateIn desc";
    
    $result = mysqli_query($conn,$q) or die('unable to query');
    
?>
<div style="float: right;">
        <button class="btn btn-danger hidden-print" onclick="BackFunction()"><span aria-hidden="true"></span>Dashboard</button>
         <button class="btn btn-primary hidden-print" onclick="PrintFunction()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>
</div>
<script>
       function BackFunction() 
       {
            window.location.href="http://localhost/inventoryphp/organic/index.php";  
       }
       function PrintFunction() 
       {

            window.print();
       }
</script>
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
<div>
    <img src="/inventoryphp/organic/upload/logo.png" height="90">
</div>
<h3 class="text-center">
    INVENTORY REPORT<br />ITEMS<br />
    <small class="text-center text-muted">Date Range: <?php echo $datefrom; ?> to <?php echo $dateto; ?></small>
</h3>

<br />
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th class="text-center">Item Name</th>
            <th class="text-center">Item Description</th>
            <th class="text-center">Item Qty</th>
            <th class="text-center">Item Unit</th>
            <th class="text-center">Item Unitsign</th>
            <th class="text-center">Item Remark</th>
            <th class="text-center">Item supplier Name</th>
            <th class="text-center">Item DateIn</th>
            <th class="text-center">Item DateUpdated</th>
            <th class="text-center">Item CreatedBy</th>
        </tr>
    </thead>
    <tbody>
        <?php if(mysqli_num_rows($result)==0): ?>
            <tr><td class="text-danger text-center" colspan="5"><strong>*** EMPTY ***</strong></td></tr>
        <?php endif; ?>
        <?php while($row = mysqli_fetch_array($result)): ?>
            <tr>
                <td class="text-center"><?php echo $row['name']; ?></td>
                <td class="text-center"><?php echo $row['description']; ?></td>
                <td class="text-center"><?php echo $row['qty']; ?></td>
                <td class="text-center"><?php echo $row['unit']; ?></td>                
                <td class="text-center"><?php echo $row['unitsign']; ?></td>                
                <td class="text-center"><?php echo $row['remark']; ?></td>
                <td class="text-center"><?php echo $row['supplier']; ?></td>                
                <td class="text-center"><?php echo $row['dateIn']; ?></td>
                <td class="text-center"><?php echo $row['dateUpdated']; ?></td>
                <td class="text-center"><?php echo $row['createdBy']; ?></td>              
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>
