<?php
    include('db1.php'); 
    $p = isset($_GET['p']) ? $_GET['p']:'error';
    
    $datachemical = new Chemical_data();
    
    $datachemical->$p();   
    class Chemical_data {
        
        function logs($operation){    
            include('db1.php');            
            $user = $_SESSION['fullname'];
            $date = date('m/d/Y H:i');
            $q = "insert into logs values(null,'$user','$operation','$date')";
            mysqli_query($conn,$q);
            return true;
        }
        
        function addchemical(){
            include('db1.php');
            $name = $_POST['chemicalname'];
            $company = $_POST['company'];
            $description = $_POST['description'];
            $qty = $_POST['qty'];
            $unitsign = $_POST['unitsign'];
            $unit = $_POST['unit'];
            $price = $_POST['price'];
            $supplier = $_POST['supplier'];
            $date = date('y/m/d h:i A');
            $createdBy = $_SESSION['fullname'];

            $totalqty = $qty * $unit;
            $totapriceofqty =  $unit * $price;
            
          /*  $q = mysqli_query($conn,"SELECT av_qty FROM chemicals WHERE name='$name'");
            $result = mysqli_fetch_assoc($q);
            if ($result === $qty) 
            {*/
                $select = mysqli_query($conn, "SELECT name from chemicals where name = '$name'");
                if(mysqli_num_rows($select) == 1) 
                {
                    $q2 = mysqli_query($conn,"SELECT qty FROM chemicals WHERE name='$name'");
                    $q3 = mysqli_query($conn,"SELECT price FROM chemicals WHERE name='$name'");
                    $q4 = mysqli_query($conn,"SELECT unit FROM chemicals WHERE name='$name'");
                    $main = mysqli_fetch_assoc($q2);
                    $main1 = mysqli_fetch_assoc($q3);
                    $main2 = mysqli_fetch_assoc($q4);
                    $e = implode("",$main);
                    $e1 = implode("",$main1);
                    $e2 = implode("",$main2);
                    $fainalqty = $e + $qty;
                    $fainalprice = $e1 + $totapriceofqty;
                    $fainalunit = $e2 + $unit;
                    $updatedate = date('y/m/d h:i A');
                    mysqli_query($conn,"UPDATE chemicals SET qty='$fainalqty',unit='$fainalunit',price='$fainalprice',dateUpdated='$updatedate' WHERE name='$name'"); 
                    header('Location:/inventoryphp/organic/chemicals.php');
                } else 
                {
                $a = $price;
                $price = $unit * $a;
                mysqli_query($conn,"INSERT INTO chemicals VALUES(null,'$name','$company','$description','$qty','$totalqty','$unitsign','$unit','$totapriceofqty','$supplier','$date','','$createdBy')");
                header('Location:/inventoryphp/organic/chemicals.php');
            }
            
        }
        
        function updatechemical(){
            include('db1.php');
            $name = $_POST['chemicalname'];
            $description = $_POST['description'];
            $qty = $_POST['qty'];
            $unitsign=$_POST['unitsign'];
            $unit = $_POST['unit'];
            $supplier = $_POST['supplier'];
            $date = date('m/d/Y H:i');
            $updatedBy = $_SESSION['fullname'];        
            $id = $_GET['id'];

            $q = "UPDATE chemicals set name='$name', description='$description', qty='$qty',unitsign='$unitsign',unit='$unit', supplier='$supplier', dateUpdated='$date', updatedBy='$updatedBy' where id=$id";
            mysqli_query($conn,$q);
            $op = "updated $qty chemicals ($name)";
            $this->logs($op);
            header("Location:/inventoryphp/organic/chemicals.php"); 
        }

        function togive(){
            include('db1.php');
            $studentsname = $_POST['name'];
            $chemical = $_POST['chemicalname'];
            $faculty = $_POST['faculty'];
            $description = $_POST['description'];
            $qty = $_POST['qty'];
            $unitsign = $_POST['unitsign'];
            $date = date('m/d/Y H:i');
            $createdBy = $_SESSION['fullname'];
            $q = "insert into students values(null,'$studentsname','$chemical','$faculty','$description','$qty','$unitsign','$date','$createdBy')";
            mysqli_query($conn,$q);
            $op = "added $qty chemical ($name)";
            $this->logs($op);

           $q2 = "SELECT qty FROM chemicals WHERE name='$chemical'";
            $result = mysqli_query($conn,$q2);
            $main = mysqli_fetch_assoc($result);
            $e = implode("", $main);
            $fainal = $e - $qty;
            mysqli_query($conn,"UPDATE chemicals SET qty='$fainal' WHERE name='$chemical'");
            header("Location:/inventoryphp/organic/chemicals.php");
        }
        function getchemicals(){   
        include('db1.php');         
           $q = "SELECT * from chemicals order by name asc ";
            $result = mysqli_query($conn,$q);
            return $result;
        }

      /*  function getstudents(){   
        include('db1.php');        
           $q = "SELECT * from students order by name asc";
            $result = mysqli_query($conn,$q);
            return $result;
        }*/
        
        function getchemicalbyid($id){
            include('db1.php');
            $q = "select * from chemicals where id=$id";
            $r = mysqli_query($conn,$q);
            return $r;
        }
        function searchchemical(){
            include('db1.php');
            
            $search = $_POST['search'];
            $q = "SELECT * FROM chemicals where name like '%$search%'";
            $result = mysqli_query($conn,$q);
            
            if(mysqli_num_rows($result)==0):
                echo '<tr><td class="text-danger text-center" colspan="6"><strong>*** EMPTY ***</strong></td></tr>';
            endif;
            
            while($row = mysqli_fetch_array($result)):
            echo '
                <tr>
                    <td>
                        <p>'.$row['name'].'
                        </p>
                    </td>
                    <td readonly>
                        <p>'.round($row['qty'] / $row['av_qty']).'
                        </p>
                    </td>
                    <td>
                        <p>'.$row['qty'].' '.$row['unitsign'].'
                        </p>
                    </td>
                    <td>
                        <p>'.$row['price'].'₹'.'
                         </p>
                    </td>
                    <td>
                        <p>'.$row['supplier'].'
                        </p>
                    </td>
                    <td>
                        <p>'.$row['company'].'
                        </p>
                    </td>
                </tr>
            ';
            
            endwhile;
        }
        
        function updateqty(){
            include('db1.php');
            $id = $_GET['id'];
            $q = "select * from chemicals where id=$id";
            $r = mysqli_query($conn,$q);
            $row = mysqli_fetch_array($r);
            if($_GET['op'] == 'plus'){
                $qty = $row['qty'] + 1;
            }else{
                $qty = $row['qty'] - 1;
            }
            if($qty == -1){
                $qty = 0;   
            }
            $initial = $row['qty'];
            $date = date('m/d/Y H:i');
            $updatedBy = $_SESSION['fullname'];
            mysqli_query($conn,"Update chemicals set qty='$qty', dateUpdated='$date', updatedBy='$updatedBy' where id=$id");
            $op = "updated quantity from $initial to $qty of chemical ($row[name])";
            $this->logs($op);
            header("Location:../chemicals.php?q=updated&cat=quantity");
        }
        
        function updateunit(){
            include('db1.php');
            $id = $_GET['id'];
            $q = "select * from chemicals where id=$id";
            $r = mysqli_query($conn,$q);
            $row = mysqli_fetch_array($r);
            if($_GET['op'] == 'plus'){
                $unit = $row['unit'] + 1;
            }else{
                $unit = $row['unit'] - 1;
            }
            if($unit == -1){
                $unit = 0;   
            }
            $initial = $row['unit'];
            $date = date('m/d/Y H:i');
            $updatedBy = $_SESSION['fullname'];
            mysqli_query($conn,"Update chemicals set unit='$unit', dateUpdated='$date', updatedBy='$updatedBy' where id=$id");
            $op = "updated unit from $initial to $unit of chemical ($row[name])";
            $this->logs($op);
            header("Location:../chemicals.php?q=updated&cat=unit");
        }
        
        function updateremark(){
            include('db1.php');
            $id = $_GET['id'];
            $q = "select * from items where id=$id";
            $r = mysqli_query($q);
            $row = mysqli_fetch_array($r);
            if($_GET['op'] == 'enable'){
                $remark = 'Functional';
            }else{
                $remark = 'Not Functional';
            }

            mysqli_query("Update items set remark='$remark' where id=$id");
            $op = "updated item to $remark of item ($row[name])";
            $this->logs($op);
            header("Location:../items.php?q=updated&cat=");
        }
        
        
        function error(){
            //header("location:index.php");   
        }
    }
?>