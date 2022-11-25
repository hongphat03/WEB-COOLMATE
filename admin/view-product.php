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
                <td>Id</td>
                <td>Name</td>
                <td>Price</td>
                <td>Image</td>
                <td>Type</td>
                <td>Material</td>
                <td>Description</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "select * from products";
            $result = executeResult($sql);
            if(count($result) > 0){
                foreach($result as $row ){
            ?>
            <tr>
                <td><?php echo $row['id']?></td>
                <td><?php echo $row['name']?></td>
                <td><?php echo $row['price']?></td>
                <td><?php echo $row['image']?></td>
                <td><?php echo $row['type']?></td>
                <td><?php echo $row['material']?></td>
                <td><?php echo $row['description']?></td>
                <td><a href="editProduct.php?id=<?php echo $row['id'] ?>">Edit</a></td>
                <td>
                <a href="deleteProduct.php?id=<?php echo $row['id'] ?>">Delete</a>
                </td>
            </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
    <div><a href="addProduct.php">Them san pham</a></div>
</body>
</html>