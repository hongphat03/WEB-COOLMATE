<?php
        require_once('../database/dbhelper.php');
        session_start();
        if(isset($_GET['OrderId'])){
            $status = $_GET['status'];
            $id = $_GET['OrderId'];
            echo $status;
            $sql= "UPDATE orders
            SET 
                status = $status
            WHERE id = '$id';
            ";
            execute($sql);
            header('Location: order.php');
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
            <li class="list-group-item bg-light bg-gradient"><a href="./admins.php" class="">Danh sach Admin</a></li>
            <li class="list-group-item bg-light bg-gradient"><a href="./view-product.php" class="">Quan ly san pham</a></li>
            <li class="list-group-item bg-light bg-gradient active"><a href="./order.php" class="">Quan ly don hang</a></li>
        </ul>
        <div class="col-10">
            <div class="content">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <td>Id</td>
                        <td>Email</td>
                        <td>Name</td>
                        <td>Address</td>
                        <td>Phone</td>
                        <td>Product</td>
                        <td>Total</td>
                        <td>Status</td>
                        <td>Đã nhận</td>
                        <td>Hủy Đơn</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "select * from orders";
                    $result = executeResult($sql);
                    if(count($result) > 0){
                        foreach($result as $row ){
                    ?>
                    <tr>
                        <td><?php echo $row['id']?></td>
                        <td><?php echo $row['email']?></td>
                        <td><?php echo $row['name']?></td>
                        <td><?php echo $row['address']?></td>
                        <td><?php echo $row['phone']?></td>
                        <td><?php echo $row['product']?></td>
                        <td><?php echo $row['total']?></td>
                        <td>
                            <?php echo $row['status']?>
                            
                        </td>
                        <td>   
                            
                            <a href="order.php?OrderId=<?php echo $row['id']?>&status='Đã Nhận' ">Đã Nhận</a>
                        </td>
                        <td>
                        <a href="order.php?OrderId=<?php echo $row['id']?>&status='Đã Hủy' ">Đã Hủy</a>
                        </td>
                    </tr>
                    <?php           
                    if(isset($_POST['done'])){
                        echo "hahaa";
                    }         
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