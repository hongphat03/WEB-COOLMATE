<?php
        require_once('../database/dbhelper.php');
        session_start();
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
                <td>Email</td>
                <td>Name</td>
                <td>Address</td>
                <td>Phone</td>
                <td>Product</td>
                <td>Total</td>
                <td>Status</td>
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
                <td><?php echo $row['status']?></td>
            </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
</body>
</html>