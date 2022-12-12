<?php
        require_once('../database/dbhelper.php');
        session_start();
        // if(empty($_SESSION['email'])){
        // header('Location: ../user/login.php');
        // }
        // else{
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
                require_once('../database/dbhelper.php');
                $name = $address = $phone_number = '';
                if(isset($_POST['name'])) {
                    $name = $_POST['name'];
                }
                if(isset($_POST['address'])) {
                    $address = $_POST['address'];
                }
                if(isset($_POST['phone_number'])) {
                    $phone_number = $_POST['phone_number'];
                }
                if(isset($_POST['email']) && empty($_SESSION['email'])) {
                    $email = $_POST['email'];
                    $sql = "update products_in_cart set email = '$email'";
                    execute($sql);
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
    <link rel="stylesheet" href="./bootstrap-5.2.2-dist/css/bootstrap.css">
    <link rel="stylesheet" href="./styleproduct.css">
    <title>Thanh toán - Coolmate</title>
</head>
<body>
    <!-- Begin Header -->

    <!-- End Header -->
    <!-- Begin Container -->
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="left-cart">
                <div class="title"><h2>Thông tin vận chuyển</h2></div>
                        <!-- Begin form -->
                        <form method="post">       
                        <!-- dia chi -->
                        <label for="name" class="form-text"><b>Họ và Tên</b> </label>    <br>
                        <input type="text" name="name" class="form-control">    <br>
                        <!-- dia chi -->
                        <label for="address" class="form-text" ><b>Địa chỉ</b> </label>    <br>
                        <input type="text" name="address" class="form-control"  placeholder="ví dụ: 103 Vạn Phúc, phường Vạn Phúc">    <br>
                        <!-- so dien thoai -->
                        <label for="phone_number" class="form-text"><b>Số điện thoại</b> </label>    <br>
                        <input type="text" name="phone_number" class="form-control">    <br>

                        <label for="email" class="form-text"><b>Email</b> </label>    <br>
                        <input type="text" name="email" class="form-control">    <br>
                        <!-- submit -->
                        <button class="btn btn-success" name="buy">Mua hàng</button>
                        </form>
                        <?php
                        
                        if(!empty($email) && !empty($phone_number) && !empty($address) && $totalCost>0) {
                            echo "aa";
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
                        ?>
                </div>
            </div>
                        <!-- End form -->
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="right-cart">
                    <div class="title"><h2>Giỏ hàng</h2></div>
                        <!-- Begin table -->
                        <table>
                            <thead>
                                
                                <tr>
                                
                                    <td>Image</td>
                                    <td>Name</td>
                                    <td>Price</td>
                                    <td>Type</td>
                                    <td>Size</td>
                                    <td>So Luong</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "select * from products_in_cart where email = '$email'";
                                $result = executeResult($sql);
                                if(count($result) > 0){
                                    foreach($result as $row ){
                                        
                                        $idProduct = $row['productId'];
                                        $sql2 = "select * from products where id = '$idProduct'";
                                        $result2 = executeResult($sql2);
                                        foreach($result2 as $row2 ){
                                ?>
                                <tr>
                                    <!-- Begin product -->
                                        
                                        <td>
                                            <div>
                                                <img class="image-product" src="<?php echo $row2['image']?>" alt="" width="100px">
                                            </div>
                                        </td>
                                        <div class="right-item">
                                        <td><?php echo $row2['name']?></td>
                                        <td><?php echo $row2['price']?></td>
                                        <td>
                                            <div class="type-product">
                                                <?php echo $row2['type']?>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="size-product">
                                                <?php echo $row['size']?>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="quantity-product">
                                                <?php echo $row['quantity']?>
                                            </div>
                                        </td>
                                        </div>
                                        <td>
                                        <form action="" method="post">
                                            <button class="btn btn-danger" name="deleteProductInCart" value="<?php echo $idProduct?>">Xoá</button>
                                        </form>
                                        </td>
                                        <td>
                                        
                                        <?php
                                                $temp = $row['quantity'];
                                                while($temp>0){
                                                    $product .="$idProduct";
                                                    $temp--;
                                                }
                                            $totalCost += $row2['price']*$row['quantity'];
                                        ?>           
                                        </td>
                                     
                                    <!-- End product -->
                                </tr> 
                                <?php
                                        }
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    <div><a class="btn btn-success" href="../product/products.php">Mua thêm sản phẩm</a></div>
                </div>
            </div>
                        <!-- End table -->
        </div>
    </div>
    <!-- End Container -->
    <!-- Begin Footer -->
    <!-- End Footer -->
</body>
</html>