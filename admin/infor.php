<?php
        require_once('../database/dbhelper.php');
        session_start();
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $sql = "delete from infor where id = '$id'";
            execute($sql);
            $sql = "UPDATE members SET id = id-1 WHERE id>'$id'";
            execute($sql);
            $sql = "ALTER TABLE infor AUTO_INCREMENT=1";
            execute($sql);
            unset($_SESSION['email']);
        }
       
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">    
    <!-- <link rel="stylesheet" href="../user/css/account.css"> -->
    <title>Document</title>
</head>
<body>
    <div class="nav-list">
        <ul class="col-2">
            <li class=""><a href="./members.php" class="">Quản lý thành viên</a></li>
            <li class=""><a href="./feedback.php" class="">Quản lý phản hồi</a></li>
            <li class=""><a href="./admins.php" class="">Quản lý admin</a></li>
            <li class=""><a href="./product.php" class="">Quản lý sản phẩm</a></li>
            <li class=""><a href="./order.php" class="">Quản lý đơn hàng</a></li>
            <li class=""><a href="./business.php" class="">Quản lý kinh doanh</a></li>
            <li class=" active"><a href="./infor.php" class="">Quản lý thông tin</a></li>
        </ul>
        <div class="vr"></div> 
        <div class="col-10">
            <div class="content">
            <table class="table table-hover" style="white-space: nowrap;">
                <thead class="table-secondary">
                    <tr>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Facebook</th>
                        <th>Youtube</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "select * from infor";
                    $result = executeResult($sql);
                    if(count($result) > 0){
                        foreach($result as $row ){
                    ?>
                    <tr>
                        <td><?php echo $row['address']?></td>
                        <td><?php echo $row['phone']?></td>
                        <td><?php echo $row['email']?></td>
                        <td><?php echo $row['facebook']?></td>
                        <td><?php echo $row['youtube']?></td>
                        <td><a href="editInfor.php?id=<?php echo $row['id'] ?>">Edit</a></td>
                        <td> <a href="infor.php?id=<?php echo $row['id'] ?>">Delete</a></td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
            </div>
            
        </div>
    </div> 
</body>
</html>