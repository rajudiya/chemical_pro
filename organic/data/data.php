<?php   
    include('db.php');   
        $username = $_REQUEST['username']; 
        $password = $_REQUEST['password'];
        $q = "SELECT * from userdata where username='$username' and password='$password'";
            $r = mysqli_query($con,$q);
           if($row = mysqli_fetch_array($r)){
                $_SESSION['login'] = 'yes';
                $_SESSION['fullname'] = $row['fname'].' '.$row['lname'];
                $_SESSION['key'] = 'admin';
                header("location:/inventoryphp/organic/index.php");
           }else{
                header("location:/inventoryphp/organic/login.php");   
           }

    $data = new Data();
    $p = isset($_GET['p']) ? $_GET['p'] : null;
    if($p == 'verifylogin'){
        $data->verifylogin();
    }else if($p == 'delete'){
        $data->delete();   
    }else if($p == 'verifykey'){
        $data->verifykey();   
    }else if($p == 'verifyusername'){
        $data->verifyusername();   
    }
   
    class Data{
        
        function logs($operation){
            include('db1.php');
            $user = isset($_SESSION['fullname']) ? $_SESSION['fullname']: 'System';
            $date = date('m/d/Y h:i A');
            $q = "insert into logs values(null,'$user','$operation','$date')";
            mysqli_query($conn,$q);
            return true;
        }
        /*function verifylogin(){
            echo $username = $_REQUEST['username']; 
    echo $password = $_REQUEST['password'];
            echo $q = "select * from userdata where username='$username' and password='$password'";
            $r = mysqli_query($con,$q);
           if($row = mysqli_fetch_array($r)){
                echo '1';
                $_SESSION['login'] = 'yes';
                $_SESSION['fullname'] = $row['fname'].' '.$row['lname'];
                $_SESSION['key'] = 'admin';
                $op = 'logged in';
           }else{
                $op = 'someone wants to login but failed';   
           }
            
            $this->logs($op);
        }   */
        
        function delete(){
            $id = $_GET['id'];
            $table = $_GET['table'];
            mysqli_query("delete from $table where id=$id");
            $op = "deleted 1 data in $table";
            $this->logs($op);
            header("Location:../$table.php?q=deleted&cat=");
        }
        
        function verifykey(){
            $key = $_REQUEST['key'];
            if($key == $_SESSION['key']){
                echo '1';   
            }else{
                echo '2';   
            }
        }
        
        function verifyusername(){
            $username = $_POST['username'];
            $q = "select * from userdata where username='$username'";
            $r = mysqli_query($q);
            echo mysqli_num_rows($r);
        }
                
    }
?>