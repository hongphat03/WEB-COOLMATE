
<?php 
    session_start();
    require_once('../../database/dbhelper.php'); 
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
        if(isset($_POST['address'])){
            $address = $_POST['address'];
        }
        if(isset($_POST['password'])){
            $password = $_POST['password'];
        }
        if(isset($_POST['password2'])){
            $password2 = $_POST['password2'];
        }
            $sql = "insert into members (username,phone_number,email,password,address) values('$name','$phone','$email','$password','$address')";
            execute($sql);
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
    <link rel="stylesheet" href="../css/stylelogin.css">
</head>
<body>
    <div class="screenRegister">
            <div class="centerScreen">
                <div class="title">Đăng ký tài khoản</div>
                <form method="post">       
                    <!-- name  -->
                    <input type="text" name="name" class="formControl" placeholder="Tên của bạn"> <br>
                    <input type="text" name="phone" class="formControl" placeholder="SĐT của bạn"> <br>
                    <!-- email -->
                    <input type="text" name="email" class="formControl" placeholder="Email của bạn">    <br>
                    <!-- password -->
                    <input type="password" name="password" class="formControl" placeholder="Mật khẩu"> <br>
                    <!-- nhap lai password  -->
                    <input type="password" name="password2" class="formControl" placeholder="Nhập lại mật khẩu"> <br>
                    <!-- submit -->
                    <button class="btnlogin" >Đăng kí</button>
                </form>
            </div>
        </div>
</body>
<script src="main.js"></script>
</html> 