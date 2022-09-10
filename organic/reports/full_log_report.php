<?php
include('/var/www/html/inventoryphp/organic/data/db1.php');
    $q = "SELECT * FROM logs WHERE (date BETWEEN '$datefrom' AND '$dateto') order by date desc";
    
    $result = mysqli_query($con,$q) or die('unable to query');
    
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
    INVENTORY REPORT<br />LOGS<br />
    <small class="text-center text-muted">Date Range: <?php echo $datefrom; ?> to <?php echo $dateto; ?></small>
</h3>

<br />
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th class="text-center">Operator</th>
            <th class="text-center">Transactions</th>
            <th class="text-center">Date</th>
        </tr>
    </thead>
    <tbody>
        <?php if(mysqli_num_rows($result)==0): ?>
            <tr><td class="text-danger text-center" colspan="3"><strong>*** EMPTY ***</strong></td></tr>
        <?php endif; ?>
        <?php while($row = mysqli_fetch_array($result)): ?>
            <tr>
                <td class="text-center"><?php echo $row['user']; ?></td>
                <td><?php echo $row['operation']; ?></td>
                <td class="text-center"><?php echo $row['date']; ?></td>                              
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>