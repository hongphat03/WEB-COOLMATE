<?php
        require_once('../database/dbhelper.php');
        session_start();
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
</head>
<body>
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
            }
            ?>
        </tbody>
    </table>
    <div><a href="../product/products.php">Mua them san pham</a></div>

    <div class="container p-5 my-5 border">
   
    <form method="post">    
        <?php if(empty($_SESSION['email'])){ ?>   
         <!-- dia chi -->
        <label for="name" class="form-text"><b>Ho va Ten</b> </label>    <br>
        <input type="text" name="name" class="form-control">    <br>
        <!-- dia chi -->
        <label for="address" class="form-text"><b>Dia chi</b> </label>    <br>
        <input type="text" name="address" class="form-control">    <br>
        <!-- so dien thoai -->
        <label for="phone_number" class="form-text"><b>SDT</b> </label>    <br>
        <input type="text" name="phone_number" class="form-control">    <br>

        <label for="email" class="form-text"><b>Email</b> </label>    <br>
        <input type="text" name="email" class="form-control">    <br>
        <?php } ?>
        <!-- submit -->
        <button class="btn btn-success" name="buy">Mua hang</button>
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
        ?>
        
</div>
</body>
</html>