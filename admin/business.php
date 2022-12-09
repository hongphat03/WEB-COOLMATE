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
            <li class="list-group-item bg-light bg-gradient"><a href="./members.php" class="">Quản lý thành viên</a></li>
            <li class="list-group-item bg-light bg-gradient"><a href="./feedback.php" class="">Quản lý phản hồi</a></li>
            <li class="list-group-item bg-light bg-gradient"><a href="./admins.php" class="">Quản lý admin</a></li>
            <li class="list-group-item bg-light bg-gradient"><a href="./product.php" class="">Quản lý sản phẩm</a></li>
            <li class="list-group-item bg-light bg-gradient"><a href="./order.php" class="">Quản lý đơn hàng</a></li>
            <li class="list-group-item bg-light bg-gradient active"><a href="./business.php" class="">Quản lý kinh doanh</a></li>
        </ul>
        <div class="col-10">
            <div class="content">
                <h4>Các sản phẩm đã bán</h4>
                <form action="" method="post">
                    <select name="taskOption" class="form-select">
                        <option selected>Số lượng đã bán</option>
                        <option value="ASC">Tăng dần</option>
                        <option value="DESC">Giảm dần</option>
                        <!-- <input type="button" name="loc" id=""> -->
                    </select>
                    <input type="submit" name="submit" value="Lọc" class="btn btn-secondary" style="margin: 10px 0px;">
                </form>
                <?php
                $order = "";
                if(isset($_POST['submit']))
                if(!empty($_POST['taskOption']))
                    $order =  $_POST['taskOption'];
                ?>
                <table class="table table-hover">
                    <thead class="table-secondary">
                        <tr>
                            <td>Id</td>
                            <td>Name</td>
                            <td>Price</td>
                            <td>Type</td>
                            <td>Material</td>
                            <td>Đã bán</td>
                        </tr>
                    </thead>
                    <tbody>
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
                        $sql = "select * from products";
                        $result = executeResult($sql);
                        foreach ($result as $row) {
                            $id = $row['id'];
                            $sale = $arr[$row['id']];
                            $sql = "UPDATE products
                                SET sale = '$sale'
                                WHERE id = '$id';";
                            execute($sql);
                        }
                        $material = ["Vải Cotton"=>0,"Vải Excool"=>0,"Vải Polyester"=>0,"Vải Cafe"=>0,"Vải Recycle"=>0];
                        $type = ["Áo Sơ Mi"=>0, "Áo Tank top"=>0, "Áo T-shirt"=>0, "Áo Polo"=>0];
                        $sql = "select * from products ORDER BY sale "."$order";
                        $result = executeResult($sql);
                        foreach($result as $row){
                            $type[$row['type']] += $row['sale'];
                            $material[$row['material']] +=$row['sale'];
                        ?>
                        <tr>
                            <td><?php echo $row['id']?></td>
                            <td><?php echo $row['name']?></td>
                            <td><?php echo $row['price']?></td>
                            <td><?php echo $row['type']?></td>
                            <td><?php echo $row['material']?></td>
                            <td><?php echo $arr[$row['id']]?></td>
                        </tr>
                        <?php                           
                        }
                        ?>
                    </tbody>
                </table>
                <h4>Các Loại Đã Bán</h4>
                <form action="" method="post">
                    <select name="typeOrder" class="form-select">
                        <option selected>Số lượng đã bán</option>
                        <option value="ASC">Tăng dần</option>
                        <option value="DESC">Giảm dần</option>
                        <!-- <input type="button" name="loc" id=""> -->
                    </select>
                    <input type="submit" name="submit1" value="Lọc" class="btn btn-secondary" style="margin: 10px 0px;">
                </form>
                <?php
                $typeOrder = "";
                if (isset($_POST['submit1']))
                    if (!empty($_POST['typeOrder'])) {
                        $typeOrder = $_POST['typeOrder'];
                        if ($typeOrder == "ASC")
                            asort($type);
                        if ($typeOrder == "DESC")
                            arsort($type);
                    }
                ?>    
                <table class="table table-hover ">
                    <thead class="table-secondary">
                        <tr>
                            <td>Loại áo</td>
                            <td>Đã bán</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach($type as $key => $value) {
                         ?>
                         <tr>
                            <td> <?php echo $key ?></td>
                            <td> <?php echo $value ?></td>
                         </tr>
                         <?php } ?>
                    </tbody>
                </table>
                <h4>Các Chất Liệu Đã Bán</h4>
                <form action="" method="post">
                    <select name="materialOrder" class="form-select">
                        <option selected>Số lượng đã bán</option>
                        <option value="ASC">Tăng dần</option>
                        <option value="DESC">Giảm dần</option>
                        <!-- <input type="button" name="loc" id=""> -->
                    </select>
                    <input type="submit" name="submit2" value="Lọc" class="btn btn-secondary" style="margin: 10px 0px;">
                </form>
                <?php
                $materialOrder = "";
                if (isset($_POST['submit2']))
                    if (!empty($_POST['materialOrder'])) {
                        $materialOrder = $_POST['materialOrder'];
                        if ($materialOrder == "ASC")
                            asort($material);
                        if ($materialOrder == "DESC")
                            arsort($material);
                    }
                ?>
                <table class="table table-hover">
                    <thead class="table-secondary">
                        <tr>
                            <td>Chất liệu</td>
                            <td>Đã bán</td>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php
                        foreach($material as $key => $value) {
                         ?>
                         <tr>
                            <td> <?php echo $key ?></td>
                            <td> <?php echo $value ?></td>
                         </tr>
                         <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div> 
</body>
</html>