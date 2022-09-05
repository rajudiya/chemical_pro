<?php
    
    $p = isset($_GET['p']) ? $_GET['p']:'error';
    
    $dataitem = new Itemdata();
    
    $dataitem->$p();   
    class Itemdata {
        
        function logs($operation){    
            include('db1.php');            
            $user = $_SESSION['fullname'];
            $date = date('m/d/Y H:i');
            $query = "insert into logs values(null,'$user','$operation','$date')";
            mysqli_query($conn,$query);
            return true;
        }
        
        function additem(){
            include('db1.php');
            $name = $_POST['name'];
            $description = $_POST['description'];
            $qty = $_POST['qty'];
            $unit = $_POST['unit'];
            $unitsign = $_POST['unitsign'];
            $remarks = $_POST['remarks'];
            $supplier = $_POST['supplier'];
            $image = $name.'-'.$_FILES["image"]["name"];
            $date = date('m/d/Y H:i');
            $createdBy = $_SESSION['fullname'];
            $image_size= getimagesize($_FILES['image']['tmp_name']);
            if ($image_size==FALSE) {
                $image = 'default.jpg';
            }else{
                move_uploaded_file($_FILES["image"]["tmp_name"],"../upload/" . $image);
            }
            echo $query = "insert into items values(null,'$name','$description','$qty','$unit','$unitsign','$remarks','$image','$supplier','$date','','$createdBy','')";
            mysqli_query($conn,$query);
            $op = "added $qty item ($name)";
            $this->logs($op);
            header("Location:../success.php?cat=item&&msg=added");
        }
        
        function updateitem(){
            include('db1.php');
            $name = $_POST['name'];
            $description = $_POST['description'];
            $qty = $_POST['qty'];
            $unit = $_POST['unit'];
            $unitsign = $_POST['unitsign'];
            $remarks = $_POST['remarks'];
            $supplier = $_POST['supplier'];
            $image = $name.'-'.$_FILES["image"]["name"];
            $date = date('m/d/Y H:i');
            $updatedBy = $_SESSION['fullname'];
            $image_size= getimagesize($_FILES['image']['tmp_name']);
            if (isset($image_size)) {            
            $id = $_GET['id'];
            if($image == $name.'-'){
                $query = "UPDATE items set name='$name', description='$description', qty='$qty', unit='$unit', unitsign='$unitsign', remark='$remarks', supplier='$supplier', dateUpdated='$date', updatedBy='$updatedBy' where id=$id";
            }else{
                if ($image_size==FALSE) {
                    $image = 'default.jpg';
                }else{
                    move_uploaded_file($_FILES["image"]["tmp_name"],"../upload/" .$image);   
                }
                $query = "UPDATE items set name='$name', description='$description', qty='$qty', unit='$unit', unitsign='$unitsign', remark='$remarks',image='$image', supplier='$supplier', dateUpdated='$date', updatedBy='$updatedBy' where id=$id";
            }
           
            mysqli_query($conn,$query);
            $op = "updated $qty item ($name)";
            $this->logs($op);
            header("Location:../success.php?cat=item&&msg=updated"); 
        } else{
            echo "please uplode image";
        }
        }
        function getitems(){  
        include('db1.php');        
           $query = "SELECT * from items order by name asc";
            $result = mysqli_query($conn,$query);
            return $result;
        }
        
        function getitembyid($id){
            include("db1.php");
            $query = "select * from items where id=$id";
            $r = mysqli_query($conn,$query);
            return $r;
        }
        function searchitem(){
            include('db1.php');
            
            $search = $_POST['search'];
            $query = "SELECT * FROM items where name like '%$search%' order by name asc";
            $result = mysqli_query($conn,$query);
            
            if(mysqli_num_rows($result)==0):
                echo '<tr><td class="text-danger text-center" colspan="4"><strong>*** EMPTY ***</strong></td></tr>';
            endif;
            
            while($row = mysqli_fetch_array($result)):
            if($row['remark']=='Functional'){
                $class = "fa fa-thumbs-o-up fa-lg text-success";
                $op = 'disable';
            }else{
                $class = "fa fa-thumbs-o-down fa-lg text-danger";
                $op = 'enable';
            }
            echo '  <tr>
                    <td><a href="edititem.php?id='.$row['id'].'">'.$row['name'].'</a></td>
                    <td class="text-center">
                        <a href="data/item.php?p=updateqty&op=plus&id='.$row['id'].'"><i class="text-success fa fa-plus-circle fa-lg"></i></a>&nbsp; 
                        '.$row['qty'].'
                        &nbsp;<a href="data/item.php?p=updateqty&op=minus&id='.$row['id'].'"><i class="text-danger fa fa-minus-circle fa-lg"></i></a></td>
                    <td class="text-center">
                        <a href="data/item.php?p=updateunit&op=plus&id='.$row['id'].'"><i class="text-success fa fa-plus-circle fa-lg"></i></a>
                        &nbsp; '.$row['unit'].' '.$row['unitsign'].' &nbsp;
                        <a href="data/item.php?p=updateunit&op=minus&id='.$row['id'].'"><i class="text-danger fa fa-minus-circle fa-lg"></i></a>
                        </td>
                        <td class="text-center">  
                        <a href="data/item.php?p=updateremark&op='.$op.'&id='.$row['id'].'"<i class="'.$class.'"></i>
                        </td>
                </tr>';
            endwhile;
        }
        
        function updateqty(){
            include('db1.php');
            $id = $_GET['id'];
            $query = "select * from items where id=$id";
            $r = mysqli_query($conn,$query);
            $row = mysqli_fetch_array($r);
            if($_GET['op'] == 'plus'){
                $qty = $row['qty'] + 1;
            }else{
                $qty = $row['qty'] - 1;
            }
            if($qty == -1){
                $qty = 0;   
            }
            $date = date('m/d/Y H:i');
            $updatedBy = $_SESSION['fullname'];
            $initial = $row['qty'];
            mysqli_query($conn,"Update items set qty='$qty', dateUpdated='$date', updatedBy='$updatedBy' where id=$id");
            $op = "updated quantity from $initial to $qty of item ($row[name])";
            $this->logs($op);
            header("Location:../items.php?q=updated&cat=quantity");
        }
        
        function updateunit(){
            include('db1.php');
            $id = $_GET['id'];
            $query = "select * from items where id=$id";
            $r = mysqli_query($conn,$query);
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
            mysqli_query($conn,"Update items set unit='$unit',dateUpdated='$date', updatedBy='$updatedBy' where id=$id");
            $op = "updated unit from $initial to $unit of item ($row[name])";
            $this->logs($op);
            header("Location:../items.php?q=updated&cat=unit");
        }
        
        function updateremark(){
            include('db1.php');
            $id = $_GET['id'];
            $query = "select * from items where id=$id";
            $r = mysqli_query($conn,$query);
            $row = mysqli_fetch_array($r);
            if($_GET['op'] == 'enable'){
                $remark = 'Functional';
            }else{
                $remark = 'Not Functional';
            }
            $date = date('m/d/Y H:i');
            $updatedBy = $_SESSION['fullname'];
            mysqli_query($conn,"Update items set remark='$remark',dateUpdated='$date', updatedBy='$updatedBy' where id=$id");
            $op = "updated item to $remark of item ($row[name])";
            $this->logs($op);
            header("Location:../items.php?q=updated&cat=");
        }
        
        
        function error(){
            //header("location:index.php");   
        }
    }
?>