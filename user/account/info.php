
<?php
    include('../../view/header.php');
    require_once('../../database/dbhelper.php');
    $email = $_SESSION['email'];
    // if(isset($_GET['id']))
    // $id = $_GET['id'];
    if(!empty($_POST)) {
        $name = $phone_number = $email = $address = "";
        if(isset($_POST['name']) && isset($_POST['phone_number'])&& isset($_POST['email'])){    
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone_number = $_POST['phone_number'];
            $address = $_POST['address'];   
            $sql= "UPDATE members
            SET 
                username = '$name',
                phone_number = '$phone_number',
                email = '$email',
                address = 'address'
            WHERE email = '$email';
            ";
            execute($sql);
            header('Location: info.php');
        }
        if(isset($_POST['oldPassword']) && isset($_POST['newPassword']) &&  isset($_POST['newPassword2'])){
        $oldPassword = $_POST['oldPassword'];
        $sql = "select * from members where password = '$oldPassword' and email = '$email'";
        $result = executeResult($sql);
            if(count($result) > 0){
                if($_POST['newPassword'] == $_POST['newPassword2']){
                    $newPassword = $_POST['newPassword'];
                    $sql = "update members set password = '$newPassword' where email ='$email'";
                    execute($sql);
                }
            }
        }
    }
    if(isset($_GET['logout'])){
        session_destroy();
        header('Location: ../../index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../../view/css/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../css/account.css">
    <link rel="stylesheet" href="../../view/css/stylefooter.css">
    <link rel="stylesheet" href="../../view/css/styleheader.css">
    <link rel="stylesheet" href="../../view/css/stylemain.css">
    <link rel="stylesheet" href="../../view/css/themify-icons/themify-icons.css">

    <style>
        
    </style>
</head>
<body>
    <div class="nav-list">
        <ul class="col-2">
            <li class="active"><a href="./info.php" class="">Thông tin cá nhân </a></li>
            <li class=""><a href="./order.php" class="">Danh sách đơn hàng</a></li>
            <li class=""><a href="./feedback.php" class="">Gửi ý kiến</a></li>
            <li class=""><a href="./order.php?logout=true" class="">Thoát</a></li>
        </ul>
        <div class="vr"></div> 
        <div class="col-10">
            <div class="content">     
                <?php
                $sql = "select * from members where email = '$email'";
                $result = executeResult($sql);
                if(count($result) > 0){
                    foreach($result as $row ){
                ?>  
                <form method="post">    
                    <!-- name  -->
                    <label for="name" class="form-text"><b>Họ và Tên</b></label> <br>
                    <input type="text" name="name" class="form-control" value="<?php echo $row['username']?>" required> <br>
                    <!-- sdt -->
                    <label for="phone_number"  class="form-text"><b>Số điện thoại</b></label> <br>
                    <input type="text" id="phone" name="phone_number" class="form-control" value="<?php echo $row['phone_number']?>"> <br>
                    <!-- email  -->
                    <label for="email" class="form-text"><b>Email</b> </label>    <br>
                    <input type="email" name="email" class="form-control" value="<?php echo $row['email']?>" required>    <br>
                    <!-- address  -->
                    <label for="address" class="form-text"><b>Địa chỉ</b> </label>    <br>
                    <input type="text" name="address" class="form-control" value="<?php echo $row['address']?>" required>    <br>
                    
                    <!-- oldPassword -->
                    <label for="oldPassword" class="form-text"><b>Nhập mật khẩu cũ</b></label>
                    <input type="password"  name="oldPassword" class="formControl form-control" placeholder="Mật khẩu"> <br>
                    <!-- password -->
                    <label for="newPassword" class="form-text"><b>Nhập mật khẩu mới</b></label>
                    <input type="password" id="password" name="newPassword" class="formControl form-control" placeholder="Mật khẩu"> <br>
                    <!-- nhap lai password  -->
                    <label for="newPassword2" class="form-text"><b>Nhập mật khẩu mới</b></label>
                    <input type="password" id="password2" name="newPassword2" class="formControl form-control" placeholder="Nhập lại mật khẩu"> <br>

                    <button class="btn btn-success" >Cập nhật</button>
                </form>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <?php 
    include('../../view/footer.php');
    ?>
</body>
<script src="../../js/validation.js"></script>
</html> 