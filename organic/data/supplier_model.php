<?php
    
    $p = isset($_GET['p']) ? $_GET['p']:'error';
    
    $datasupplier = new Supplier_data();
    
    $datasupplier->$p();   
    class Supplier_data {
        
        function logs($operation){    
            include('db1.php');            
            $user = $_SESSION['fullname'];
            $date = date('m/d/Y H:i');
            $q = "insert into logs values(null,'$user','$operation','$date')";
            mysqli_query($conn,$q);
            return true;
        }
        
        function addsupplier(){
            include('db1.php');
            $name = $_POST['name'];
            $company = $_POST['company'];
            $contact = $_POST['contact'];
            $address = $_POST['address'];
            $email = $_POST['email'];
            $date = date('m/d/Y H:i');
            $createdBy = $_SESSION['fullname'];
            echo $q = "insert into supplier values(null,'$name','$company','$contact','$email','$address','$date','','$createdBy','')";
            mysqli_query($conn,$q);
            $op = "added $qty supplier ($name)";
            $this->logs($op);
            header("Location:../success.php?cat=supplier&&msg=added");
        }
        
        function updatesupplier(){
            include('db1.php');
            $name = $_POST['name'];
            $company = $_POST['company'];
            $contact = $_POST['contact'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $date = date('m/d/Y H:i');
            $updatedBy = $_SESSION['fullname'];        
            $id = $_GET['id'];

            echo $q = "UPDATE supplier set name='$name', company='$company', contact='$contact', email='$email', address='$address', dateUpdated='$date', updatedBy='$updatedBy' where id=$id";

            mysqli_query($conn,$q);
            $op = "updated supplier ($name)";
            $this->logs($op);
            header("Location:../success.php?cat=supplier&&msg=updated"); 
        }
        
        function getsuppliers(){  
            include('db1.php');          
           $q = "select * from supplier order by name asc";
            $result = mysqli_query($conn,$q);
            return $result;
        }
        
        function getsupplierbyid($id){
            
            $q = "select * from supplier where id=$id";
            $r = mysqli_query($q);
            return $r;
        }
        function searchsupplier(){
            include('db1.php');
            
            $search = $_POST['search'];
            $q = "SELECT * FROM supplier where name like '%$search%' or company like '%$search%' order by name asc";
            $result = mysqli_query($conn,$q);
            if(mysqli_num_rows($result)==0):
                echo '<tr><td class="text-danger text-center" colspan="4"><strong>*** EMPTY ***</strong></td></tr>';
            endif;
            
            while($row = mysqli_fetch_array($result)):
                echo '
                    <tr>
                        <td><a href="editsupplier.php?id='.$row['id'].'">'.$row['name'].'</a></td>
                        <td class="text-center">'.$row['company'].'</td>
                        <td class="text-center">'.$row['contact'].'</td>
                        <td class="text-center">'.$row['email'].'</td>

                    </tr>
            ';
            
            endwhile;
        }

        function error(){
            //header("location:index.php");   
        }
    }
?>