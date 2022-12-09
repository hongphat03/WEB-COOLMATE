
<?php 
    session_start();
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
    <link rel="stylesheet" href="../css/account.css">
    <style>
        a{
        text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="nav-list">
        <ul class="list-group col-2">
            <li class="list-group-item bg-light bg-gradient active"><a href="./info.php" class="">Thông tin cá nhân </a></li>
            <li class="list-group-item bg-light bg-gradient"><a href="./order.php" class="">Danh sách đơn hàng</a></li>
            <li class="list-group-item bg-light bg-gradient"><a href="../feedback.php" class="">Gửi ý kiến</a></li>
            <li class="list-group-item bg-light bg-gradient"><a href="./order.php?logout=true" class="">Thoát</a></li>
        </ul>
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
                    <input type="text" name="name" class="form-control" value="<?php echo $row['username']?>"> <br>
                    <!-- sdt -->
                    <label for="phone_number" class="form-text"><b>Số điện thoại</b></label> <br>
                    <input type="text" name="phone_number" class="form-control" value="<?php echo $row['phone_number']?>"> <br>
                    <!-- email  -->
                    <label for="email" class="form-text"><b>Email</b> </label>    <br>
                    <input type="text" name="email" class="form-control" value="<?php echo $row['email']?>">    <br>
                    <!-- address  -->
                    <label for="address" class="form-text"><b>Địa chỉ</b> </label>    <br>
                    <input type="text" name="address" class="form-control" value="<?php echo $row['address']?>">    <br>
                    
                    <button class="btn btn-success" >Cập nhật</button>
                </form>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>
<script src="main.js"></script>
</html> 