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
            $name = $_POST['name'];
            $company = $_POST['company'];
            $description = $_POST['description'];
            $qty = $_POST['qty'];
            $unitsign = $_POST['unitsign'];
            $unit = $_POST['unit'];
            $supplier = $_POST['supplier'];
            $date = date('m/d/Y H:i');
            $createdBy = $_SESSION['fullname'];
            $q = "insert into chemicals values(null,'$name','$company','$description','$qty','$unitsign','$unit','$supplier','$date','','$createdBy','')";
            mysqli_query($conn,$q);
            $op = "added $qty chemical ($name)";
            $this->logs($op);
            header("Location:../success.php?cat=chemical&&msg=added");
        }
        
        function updatechemical(){
            include('db1.php');
            $name = $_POST['name'];
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
            $chemical = $_POST['chemical'];
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
            header("Location:/inventoryphp/organic/chemicals.php");
        }
        function getchemicals(){   
        $conn = mysqli_connect("localhost","dev","dev14","cinventory") or die("please connect with the database");         
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
                echo '<tr><td class="text-danger text-center" colspan="4"><strong>*** EMPTY ***</strong></td></tr>';
            endif;
            
            while($row = mysqli_fetch_array($result)):
            echo '
                <tr>
                    <td>
                        <a href="editchemical.php?id='.$row['id'].'">'.$row['name'].'
                        </a>
                    </td>
                    <td readonly>
                        <a>'.$row['company'].'
                        </a>
                    </td>
                    <td>
                        <a>'.$row['supplier'].'
                        </a>
                    </td>
                    <td>
                        <a>'.$row['qty'].'
                         </a>
                    </td>
                    <td>
                        <a>'.$row['dateIn'].'
                        </a>
                    </td>
                    <td>
                        <span class="input-group-addon alert-danger"><a href="#to_give" data-toggle="modal" target = "_blank">To Give</a></span>
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