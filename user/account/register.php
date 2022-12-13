
<?php 
    session_start();
    require_once('../../database/dbhelper.php');
    $error["email"] = "";
    if(isset($_POST['submit'])) {
        $name = $phone = $email = $password = $password2 = "";
        if (isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['email']) && isset($_POST['address']) && isset($_POST['password']) && isset($_POST['password2']) && $_POST['password2'] == $_POST['password']) {
            $name =  htmlspecialchars($_POST['name']);
            $phone =  htmlspecialchars($_POST['phone']);
            $email =  htmlspecialchars($_POST['email']);
            $address =  htmlspecialchars($_POST['address']);
            $password =  htmlspecialchars($_POST['password']);
            $password2 =  htmlspecialchars($_POST['password2']);
            $complete = true; 
            if(strlen($name) <= 0 || strlen($phone) <= 0 || strlen($address) <= 0) {
                $complete = false;
            }
            // Email
            $check = preg_match("/^.*@.*\..*/i", $email);
            if($check == 0) {
                $complete = false;
            }
            // Password
            if(strlen($password) < 8 || strlen($password) > 30 || $password != $password2) {
                $complete = false;
            }
            $sql = "select * from members where email = '$email'";
            $result = executeResult($sql);
            if(count($result) > 0){
                $error["email"] = "Email đã tồn tại";
                $complete = false;
            }
            if($complete){
                $sql = "insert into members (username,phone_number,email,password,address) values('$name','$phone','$email','$password','$address')";
                execute($sql);
                header('location: login.php');
            }       
        }
    }

?>
<!DOCTYPE html>
<html lang="vi">
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
    <div class="screenRegister ">
            <div class="centerScreen">
                <div class="title">Đăng ký tài khoản</div>
                <form method="post" id="RegForm" action="register.php">   
                   
                    <!-- name  -->
                    <div>
                        <input type="text" name="name" class="formControl" placeholder="Tên của bạn" required>     
                    </div>
                    <input type="text" name="phone" id="phone" class="formControl" placeholder="SĐT của bạn" required>
                    <!-- email -->
                    <input type="email" id="email" name="email" class="formControl" placeholder="Email của bạn" required>  
                    <div style="color: red;">
                    <?php if(strlen($error["email"]>0)) echo $error['email']; ?> 
                    </div> 
                    <!-- address -->
                    <input type="text" name="address" class="formControl" placeholder="Địa chỉ" required>    
                     <!-- password -->
                     <input type="password" id = "password" name="password" class="formControl" placeholder="Mật khẩu" required>     
                    <!-- nhap lai password  -->
                    <input type="password" id="password2" name="password2" class="formControl" placeholder="Nhập lại mật khẩu" required> 
            
                    <!-- submit -->
                    <input type="submit" class="btnlogin" value="Đăng ký" name="submit">
                </form>
            </div>
        </div>
</body>
   <script src="../../js/validation.js" type="text/javascript"></script>
</html> 
