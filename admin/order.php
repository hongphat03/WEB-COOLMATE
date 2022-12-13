<?php
        require_once('../database/dbhelper.php');
        session_start();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "delete from orders where id = '$id'";
            execute($sql);
            $sql = "UPDATE orders SET id = id-1 WHERE id>'$id'";
            execute($sql);
            $sql = "ALTER TABLE orders AUTO_INCREMENT=1";
            execute($sql);
            header('Location: order.php');
        }
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
        // $totalDone = 0;
        // $totalCancel = 0;
        $sql = "select * from orders";
        $result = executeResult($sql);
        $order = ["Tổng đơn"=>0,"Đang Chờ"=>0,"Đang Giao"=>0,"Đã Giao"=>0,"Hủy Đơn"=>0];
        foreach($result as $row ){
            $totalOrder++;
            if ($row['status'] != "Hủy Đơn")
                $total+= $row['total'];
            $order[$row['status']]++;
            // if ($row['status'] == "Đã Giao")
            //     $totalDone++;
            // if ($row['status'] == "Hủy Đơn")
            //     $totalCancel++;
            // if ($row['status'] == "Đang Chờ")
            // $totalCancel++;
            // if ($row['status'] == "Đang Giao")
            // $totalCancel++;    
        }
        $order['Tổng đơn'] = $totalOrder;
?>


    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../user/css/account.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="nav-list">
    <ul class="col-2">
            <li class=""><a href="./members.php" class="">Quản lý thành viên</a></li>
            <li class=""><a href="./feedback.php" class="">Quản lý phản hồi</a></li>
            <li class=""><a href="./admins.php" class="">Quản lý admin</a></li>
            <li class=""><a href="./product.php" class="">Quản lý sản phẩm</a></li>
            <li class="active"><a href="./order.php" class="">Quản lý đơn hàng</a></li>
            <li class=""><a href="./business.php" class="">Quản lý kinh doanh</a></li>
            <li class=""><a href="./infor.php" class="">Quản lý thông tin</a></li>
        </ul>
        <div class="vr"></div> 
        <div class="col-10">
            <div class="content">     
            <h5>Các Đơn Hàng</h5>
            <table class="table table-hover">
                <thead class="table-secondary"> 
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
                        <td></td>
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
                        <td><a href="order.php?OrderId=<?php echo $row['id']?>&status='Đang Giao' ">Đang Giao</a></td>
                        <td><a href="order.php?OrderId=<?php echo $row['id']?>&status='Đã Giao' ">Đã Giao</a></td>
                        <td><a href="order.php?OrderId=<?php echo $row['id']?>&status='Hủy Đơn' ">Hủy Đơn</a> </td>          
                        <td><a href="detailOrder.php?email=<?php echo $row['email'] ?>&idOrder=<?php echo $row['id'] ?>">Chi tiet</a></td>
                        <td> <a href="order.php?id=<?php echo $row['id'] ?>">Delete</a></td>
                    </tr>
                    <?php                 
                        }
                    }
                    ?>
                </tbody>
            </table style="white-space:nowrap;">
            <h5>Trạng Thái Đơn Hàng</h5>
                <table class="table table-hover"> 
                    <thead class="table-secondary">
                        <tr>
                            <?php foreach ($order as $key => $value) {?>
                            <td><?php echo $key;}?></td>
                            
                        </tr>
                    </thead>          
                    <tr>
                        <?php foreach ($order as $key => $value) { ?>
                        <td><?php echo $value;}?></td>
                        
                    </tr>
                </table>        
                <div>
                    <h5><b>Doanh Thu: </b> <?php echo $total;?> Đồng</h5>
                </div>

            </div>
        </div>
    </div>
</body>
<script src="../../public/validation.js"></script>
</html> 