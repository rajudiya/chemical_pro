<?php
    session_start();
    if(isset($_SESSION['login'])){
        header('location:index.php');   
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>DEPARTMENT OF CHEMISTRY SAURASHTRA UNIVERSITY</title>
    <link rel="icon" type="image/x-icon" href="/inventoryphp/organic/upload/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="js/jquery-1.11.0.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/myscript.js"></script>
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
body{
    background-image: url(/inventoryphp/organic/upload/back.jpg);
    background-repeat: no-repeat;
     -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
</style>
</head>
<body>
<form action="data/data.php" method="get">
<div class="container">


<!-- IPad Login - START -->
<div class="container">
    <div class="row">
        <div class="contcustom">
            <span>
                <img src="/inventoryphp/organic/upload/logo.png" class="rotate">
            </span>
            <h3>Chemistry Department Lab</h3>          
            <div>
                <div class="error"></div>
                <input type="text" placeholder="username" name="username" id="username" autofocus />
                <input type="password" placeholder="password" name="password" id="password" />
                
                <button class="btn btn-default wide" id="login"><span class="fa fa-lock med"> login</span></button>
            </div>         
        </div>
    </div>
</div>
</form>


<style>
body {
    background-color: #F0EEEE;
}

.row {
    padding:20px 0px;
    margin-top: 5%;
}

.bigicon {
    font-size:97px;
    color: #f96145;
}

.contcustom {
    text-align: center;
    width: 300px;
    border-radius: 0.5rem;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    margin: 10px auto;
    background-color: white;
    padding: 20px;
}   

input {
    width: 100%;
    margin-bottom: 17px;
    padding: 15px;
    background-color: #ECF4F4;
    border-radius: 2px;
    border: none;
}

h2 {
    margin-bottom: 20px;
    font-weight: bold;
    color: #ABABAB;
}

h3 {
    margin-bottom: 20px;
    font-weight: bold;
    color: #ABABAB;
}

.btn {
    border-radius: 2px;
    padding: 10px;     
}

.med {
    font-size: 27px;
    color: white;
}

.wide {
    background-color: #8EB7E4;
    width: 100%;
    -webkit-border-top-right-radius: 0;
    -webkit-border-bottom-right-radius: 0;
    -moz-border-radius-topright: 0;
    -moz-border-radius-bottomright: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
}
</style>

<!-- IPad Login - END -->

</div>

</body>
</html>