<?php
    require_once('../database/dbhelper.php');
    session_start();
    
    if(isset($_POST["add-admin"])){
        $email  = $password = "";
        if(!empty( $_POST['email']) && !empty( $_POST['password'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $sql = "insert into admins (email,password) values('$email','$password')";
            execute($sql);
        }
    }
    if(isset($_POST["delete-admin"])){
        $email  = "";
        if(!empty( $_POST['email'])){
            $email = $_POST['email'];
            $sql = "delete from admins where email = '$email'";
            execute($sql);
        }      
    }
       
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="../user/css/account.css"> -->
    <title>Document</title>

</head>
<body>
    
    <div class="nav-list">
        <ul class="col-2">
            <li class=""><a href="./members.php" class="">Quản lý thành viên</a></li>
            <li class=""><a href="./feedback.php" class="">Quản lý phản hồi</a></li>
            <li class=" active"><a href="./admins.php" class="">Quản lý admin</a></li>
            <li class=""><a href="./product.php" class="">Quản lý sản phẩm</a></li>
            <li class=""><a href="./order.php" class="">Quản lý đơn hàng</a></li>
            <li class=""><a href="./business.php" class="">Quản lý kinh doanh</a></li>
            <li class=""><a href="./infor.php" class="">Quản lý thông tin</a></li>
        </ul>
        <div class="col-10">
            <div class="content">
            <table class="table table-hover">
                <thead class="table-secondary">
                    <tr>
                        <td>Email</td>
                        <td>Password</td>
                        <td></td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "select * from admins";
                    $result = executeResult($sql);
                    if(count($result) > 0){
                        foreach($result as $row ){
                    ?>
                    <tr>
                        <td><?php echo $row['email']?></td>
                        <td><?php echo $row['password']?></td>
                        <td><a href=""><button class="btn btn-primary">Edit</button></a></td>
                        <td>
                        <form action="" method="post" >
                            <input type="hidden" name="email" value="<?php echo $row['email']?>">
                            <input type="submit" name="delete-admin" value="Xóa" class="btn btn-primary">
                        </form>
                        </td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
            <form action="" method="post" class="border-top">
                <label for="">Thêm admin</label> <br>
                <label for="email" class="form-text">Email</label>
                <input type="email" name="email" class="form-control">
                <label for="password" class="form-text">Password</label>
                <input type="text" id="password" name="password" class="form-control">
                <br>
                <input type="submit" name="add-admin" value="Thêm" class="btn btn-primary">
            </form>
            </div>
        </div>
    </div> 
</body>
<script src="../public/validation.js"></script>
</html>