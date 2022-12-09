<?php
        require_once('../../database/dbhelper.php');
        session_start();
        if(isset($_GET['email']) && isset($_GET['idOrder'])){
            $id = $_GET['idOrder'];
            $status = $_GET['status'];
            $email= $_GET['email'];
            $sql= "UPDATE orders
            SET 
                status = $status
            WHERE email = '$email' and id = '$id';
            ";
            execute($sql);
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/account.css">
    <title>Document</title>
    <style>
        
    </style>
</head>
<body>
    <div class="nav-list">
        <ul class="list-group col-2">
            <li class="list-group-item bg-light bg-gradient"><a href="./info.php" class="">Thông tin cá nhân </a></li>
            <li class="list-group-item bg-light bg-gradient active"><a href="./order.php" class="">Danh sách đơn hàng</a></li>
            <li class="list-group-item bg-light bg-gradient"><a href="../feedback.php" class="">Gửi ý kiến</a></li>
            <li class="list-group-item bg-light bg-gradient"><a href="./order.php?logout=true" class="">Thoát</a></li>
        </ul>
        <div class="col-10">
            <div class="content">
                <h5>Các Đơn Hàng</h5>
            <table class="table table-hover">
                <thead class="table-secondary"> 
                    <tr>
                        <td>Email</td>
                        <td>Name</td>
                        <td>Address</td>
                        <td>Phone</td>
                        <td>Total</td>
                        <td>Status</td>
                        <td></td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $email = $_SESSION['email'];
                    $sql = "select * from orders where email = '$email'";
                    $result = executeResult($sql);
                    if(count($result) > 0){
                        foreach($result as $row ){
                    ?>
                    <tr>
                        <td><?php echo $row['email']?></td>
                        <td><?php echo $row['name']?></td>
                        <td><?php echo $row['address']?></td>
                        <td><?php echo $row['phone']?></td>
                        <td><?php echo $row['total']?></td>
                        <td>
                            <?php echo $row['status']?>
                            
                        </td>
                        <td><a href="./order.php?email=<?php echo $row['email']?>&status='Hủy Đơn'&idOrder=<?php echo $row['id'] ?> ">Hủy Đơn</a> </td>          
                        <td><a href="../../admin/detailOrder.php?email=<?php echo $row['email'] ?>&idOrder=<?php echo $row['id'] ?>">Chi tiet</a></td>
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