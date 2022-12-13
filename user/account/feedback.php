<?php
     include('../../view/header.php');
     require_once('../../database/dbhelper.php');
    if(!empty($_POST)) {
        $username = $phone_number= $content = "";
        $email = $_SESSION['email'];
        if(isset($_POST['name']) && isset($_POST['phone_number']) && isset($_POST['content'])){
            $username = $_POST['name'];
            $phone_number = $_POST['phone_number'];
            $content = $_POST['content'];
            $complete = true;
            if(strlen($username) <= 0 || strlen($phone_number) <= 0 || strlen($content) <= 0) {
                $complete = false;
            }
            if($complete){
                $sql = "insert into feedback (username,phone_number,email,content,status) values('$username','$phone_number','$email','$content','Chưa Phản Hồi') ";
                execute($sql);
            }
            
        }
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

</head>
<body>
    <div class="nav-list">
        <ul class="col-2">
            <li class=""><a href="./info.php" class="">Thông tin cá nhân </a></li>
            <li class=" active"><a href="./order.php" class="">Danh sách đơn hàng</a></li>
            <li class=""><a href="./feedback.php" class="">Gửi ý kiến</a></li>
            <li class=""><a href="./order.php?logout=true" class="">Thoát</a></li>
        </ul>
        <div class="vr"></div> 
        <div class="col-10">
            <div class="content">
                <form action="" method="post">
                    <label for="name" class="form-text"><b>Họ và Tên</b> </label>    <br>
                    <input type="text" name="name" class="form-control">    <br>
                    <!-- so dien thoai -->
                    <label for="phone_number" class="form-text"><b>Số điện thoại</b> </label>    <br>
                    <input type="text" name="phone_number" class="form-control">    <br>
                    <!-- dia chi -->
                    <label for="content" class="form-text"><b>Nội dung</b> </label>    <br>
                    <textarea name="content" class="form-control" id="" cols="30" rows="5"></textarea>
                    <button class="btn btn-success" style="margin-top: 15px;">Gửi</button>
                </form>
            </div>
        </div>
    </div> 
    <?php 
     include('../../view/footer.php');
    ?>
</body>
</html>