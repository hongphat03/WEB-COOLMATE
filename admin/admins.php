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
    <title>Document</title>
    <style>
        a{
            text-decoration: none;
        }
    </style>
</head>
<body>
    
    <div class="nav-list">
        <ul class="list-group col-2">
            <li class="list-group-item bg-light bg-gradient"><a href="./members.php" class="">Quan ly thanh vien</a></li>
            <li class="list-group-item bg-light bg-gradient"><a href="./feedback.php" class="">Quan ly feedback</a></li>
            <li class="list-group-item bg-light bg-gradient"><a href="./contact.php" class="">Quan ly thong tin khach hang</a></li>
            <li class="list-group-item bg-light bg-gradient active"><a href="./admins.php" class="">Danh sach Admin</a></li>
            <li class="list-group-item bg-light bg-gradient"><a href="./view-product.php" class="">Quan ly san pham</a></li>
            <li class="list-group-item bg-light bg-gradient"><a href="./order.php" class="">Quan ly don hang</a></li>
            <li class="list-group-item bg-light bg-gradient"><a href="./business.php" class="">Quan ly kinh doanh</a></li>
        </ul>
        <div class="col-10">
            <div class="content">
            <table class="table table-hover">
                <thead>
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
                <input type="text" name="email" class="form-control">
                <label for="password" class="form-text">Password</label>
                <input type="text" name="password" class="form-control">
                <br>
                <input type="submit" name="add-admin" value="Thêm" class="btn btn-primary">
            </form>
            </div>
        </div>
    </div> 
</body>
</html>