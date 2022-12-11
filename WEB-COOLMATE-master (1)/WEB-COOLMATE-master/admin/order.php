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
        $total = 0;
        $totalOrder = 0;
        $totalDone = 0;
        $totalCancel = 0;
        $sql = "select * from orders";
        $result = executeResult($sql);
        foreach($result as $row ){
            $totalOrder++;
            if ($row['status'] != "Hủy Đơn")
                $total+= $row['total'];
            if ($row['status'] == "Đã Giao")
                $totalDone++;
            if ($row['status'] == "Hủy Đơn")
                $totalCancel++;
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
                        <td>Total</td>
                        <td>Status</td>
                        <td>Đang Giao</td>
                        <td>Đã Giao</td>
                        <td>Hủy Đơn</td>
                        <td>Chi tiet don hang</td>
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
                        <td><?php echo $row['total']?></td>
                        <td>
                            <?php echo $row['status']?>
                            
                        </td>
                        <td><a href="order.php?OrderId=<?php echo $row['id']?>&status='Hủy Đơn' ">Đang Giao</a></td>
                        <td><a href="order.php?OrderId=<?php echo $row['id']?>&status='Đã Giao' ">Đã Giao</a></td>
                        <td><a href="order.php?OrderId=<?php echo $row['id']?>&status='Hủy Đơn' ">Hủy Đơn</a> </td>          
                        <td><a href="detailOrder.php?email=<?php echo $row['email'] ?>&idOrder=<?php echo $row['id'] ?>">Chi tiet</a></td>
                    </tr>
                    <?php                 
                        }
                    }
                    ?>
                </tbody>
            </table>
                <div>
                    <p><b>Doanh Thu: </b> <?php echo $total;?></p>
                    
                </div>
                <div>
                    <p><b>Tổng đơn đã đặt: </b><?php echo $totalOrder; ?> </p>
                    
                </div>
                <div>
                    <p><b>Tổng đơn đã giao: </b><?php echo $totalDone;?></p>
                    
                </div>
                <div>
                    <p><b>Tổng đơn đã hủy: </b><?php echo $totalCancel;?></p>                    
                </div>
                <?php
                $sql = "select * from orders where not status = 'Hủy Đơn'";
                $result = executeResult($sql);
                $arr = array_fill(0,1000,0);
                foreach($result as $row){
                    $str = $row['product'];
                    for ($x = 0; $x < strlen($str); $x++) {
                        $arr[$str[$x]]++;
                    }
                }
                for($x = 0; $x < 20; $x++) {
                    if($arr[$x]>0){
                        echo $x . $arr[$x]."\n";
                    }
                }
                ?>
            </div>
        </div>
    </div> 
</body>
</html>