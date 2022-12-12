<?php
        require_once('../database/dbhelper.php');
        session_start();
        $email = $_GET['email'];
        $idOrder = $_GET['idOrder'];
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
            $sql = "select * from ordersdetail where idOrder = '$idOrder'";
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
            </tr>
            <?php
                    }
                }
            }
            ?>
        </tbody>
    </table>

    
</div>
</body>
</html>