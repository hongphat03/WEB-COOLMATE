<?php
        require_once('../../database/dbhelper.php');
        include('../../view/header.php');
            $email = "";
            if(!empty($_SESSION['email'])){
                $email = $_SESSION['email'];
            }
            $totalCost = 0;
            $product= "";
            if(isset($_POST['deleteProductInCart'])){
                $idProduct = $_POST['deleteProductInCart'];
                $sql = "delete from products_in_cart where productId = '$idProduct' LIMIT 1";     
                execute($sql);
            }
            if(isset($_POST['buy'])) {
                $name = $address = $phone_number = '';
                if(empty($_SESSION['email'])){
                    if (isset($_POST['name']) && isset($_POST['phone_number']) && isset($_POST['email']) && isset($_POST['address'])) {
                        $name = $_POST['name'];
                        $address = $_POST['address'];
                        $phone_number = $_POST['phone_number'];
                        $email = $_POST['email'];
                        $sql = "update products_in_cart set email = '$email'";
                        execute($sql);
                    }   
                }
                else{
                    $sql = "select * from members where email='$email'";
                    $result = executeResult($sql);
                    foreach($result as $row){
                        $name = $row['username'];
                        $address = $row['address'];
                        $phone_number = $row['phone_number'];
                    }
                } 
            }    
        // }              
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="../../view/css/stylefooter.css">
    <link rel="stylesheet" href="../../view/css/styleheader.css">
    <link rel="stylesheet" href="styleproduct.css">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="right-cart">
                    <?php
                        $sql = "select * from products_in_cart where email = '$email'";
                        $result = executeResult($sql);
                        if (count($result) <= 0) {
                    ?>
                        <h3 style="color: black;">Bạn chưa có sản phẩm nào trong giỏ hàng</h3 >
                        <div class="btn-addproduct">
                        <a class="btn btn-success" href="product.php">Tiếp tục mua hàng</a>
                        </div>
                    <?php     
                    }
                    if(count($result) > 0){
                        ?>
                    <div class="title"><h2>Giỏ hàng</h2></div>
                        <table>
                            <thead>
                                <tr>
                                    <td>Name</td>
                                    <td>Price</td>
                                    <td>Image</td>
                                    <td>Type</td>
                                    <td>Size</td>
                                    <td>So Luong</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($result as $row ){
                                        
                                        $idProduct = $row['productId'];
                                        $sql2 = "select * from products where id = '$idProduct'";
                                        $result2 = executeResult($sql2);
                                        foreach($result2 as $row2 ){
                                ?>
                                
                                <tr>
                                    <td><?php echo $row2['name']?></td>
                                    <td><?php echo $row2['price']?></td>
                                    <td><img src="<?php echo $row2['image']?>" alt="" width="100px"></td>
                                    <td><?php echo $row2['type']?></td>
                                    <td><?php echo $row['size']?></td>
                                    <td><?php echo $row['quantity']?></td>
                                    <td>
                                    
                                    <form action="" method="post">
                                        <button name="deleteProductInCart" value="<?php echo $idProduct?>">Xoa</button>
                                    </form>
                                    </td>
                                    <td>
                                    <?php
                                            $temp = $row['quantity'];
                                            while($temp>0){
                                                $product .="$idProduct ";
                                                $temp--;
                                            }
                                        $totalCost += $row2['price']*$row['quantity'];
                                    ?>           
                                    </td>
                                </tr>
                                <?php
                                        }
                                    }
                                
                                ?>
                            </tbody>
                            <tfoot>
                                <td colspan="2">Tổng</td>
                                <td><?php echo $totalCost ?></td>
                            </tfoot>
                        </table>
                                
                    <div class="btn-addproduct">
                        <a class="btn btn-success" href="products.php">Mua thêm sản phẩm</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="left-cart">
                <div class="title"><h2>Thông tin vận chuyển</h2></div>   
                <form method="post">   
                <?php if(empty($_SESSION['email'])){ ?>   
                    <div class="form-container">
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" id="" placeholder="Họ tên" name="name" required>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="" placeholder="Số điện thoại" name="phone_number" required>
                        </div>
                    </div>
                        <br>
                        <!-- email -->
                        <input type="mail" class="form-control" id="" placeholder="Email" name="mail" required> <br>
                        <!-- Địa chỉ -->
                        <input type="text" class="form-control" id="" placeholder="Địa chỉ (ví dụ: 103 Vạn Phúc, phường Vạn Phúc)" name="address" required> <br>
                        <?php } ?>
                        <button class="btn btn-success" name="buy">Đặt hàng</button>
                        </div>
                </form>
                
        <?php
       
        
        if(!empty($name) && !empty($email) && !empty($phone_number) && !empty($address) && $totalCost>0) {
            $complete = true;
            if(strlen($name) <= 0 || strlen($phone_number) <= 0 || strlen($address) <= 0) {
                $complete = false;
            }
            // Email
            $check = preg_match("/^.*@.*\..*/i", $email);
            if($check == 0) {
                $complete = false;
            }
            if($complete){
                $sql = "insert into orders (email,name,address,phone,product,total,status) values('$email','$name','$address','$phone_number','$product','$totalCost','Đang Chờ') ";
                execute($sql);
                $sql = " SELECT * FROM orders;";
                $res = executeResult($sql);
                $id = count($res);
                $sql = "select * from products_in_cart where email = '$email'";
                $result = executeResult($sql);
                if (count($result) > 0) {
                    foreach ($result as $row) {
                        $productId = $row['productId'];
                        $size = $row['size'];
                        $quantity = $row['quantity'];
                        $sql = "insert into ordersdetail(idOrder,productId,size,quantity) values('$id','$productId','$size','$quantity');";
                        execute($sql);
                    }
                }
                $sql = "delete from products_in_cart";
                execute($sql);
            }           
        }
    }
        ?>
                </div>
            </div>  
        </div>
    </div>
    
</body>
<script src="../public/validation.js"></script>
</html>