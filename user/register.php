
<?php 
    session_start();
    require_once('../database/dbhelper.php'); 
    if(!empty($_POST)) {
        $name = $phone = $email = $password = $password2 = "";
        if(isset($_POST['name'])){
            $name = $_POST['name'];
        }
        if(isset($_POST['phone'])){
            $phone = $_POST['phone'];
        }
        if(isset($_POST['email'])){
            $email = $_POST['email'];
        }
        if(isset($_POST['password'])){
            $password = $_POST['password'];
        }
        if(isset($_POST['password2'])){
            $password2 = $_POST['password2'];
        }
            $sql = "insert into members (username,phone_number,email,password) values('$name','$phone','$email','$password')";
            execute($sql);
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: login.php');
        
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>phan2_bai3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container p-5 my-5 border">
   
    <form method="post">      
        
        <p style="font-size: 50px;" class="form-text text-center">REGISTER</p>
        <!-- name  -->
        <label for="firstName" class="form-text"><b>Ten Cua Ban</b></label> <br>
        <input type="text" name="name" class="form-control"> <br>

        <label for="secondName" class="form-text"><b>So Dien Thoai</b></label> <br>
        <input type="text" name="phone" class="form-control"> <br>

        <!-- email -->
        <label for="email" class="form-text"><b>Email</b> </label>    <br>
        <input type="text" name="email" class="form-control">    <br>
    
        <!-- password -->
        <label for="password" class="form-text"><b>Password</b></label> <br>
        <input type="password" name="password" class="form-control"> <br>
        <!-- nhap lai password  -->
        <label for="password" class="form-text"><b>Password</b></label> <br>
        <input type="password" name="password2" class="form-control"> <br>

        <!-- submit -->
        <button class="btn btn-success" >Dang ky</button>
    </form>
</div>
</body>
<script src="main.js"></script>
</html> 