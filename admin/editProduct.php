
<?php 
    session_start();
    require_once('../database/dbhelper.php'); 
    $id = $_GET['id'];
    if(!empty($_POST)) {
        $name = $price = $img = $type = $material = $description = "";
        if(isset($_POST['name']) && isset($_POST['price']) && isset($_POST['img']) && isset($_POST['type']) && isset($_POST['material']) && isset($_POST['description'])){    
            $id =  $_POST['id'];
            $name = $_POST['name'];
            $price = $_POST['price'];
            $img = $_POST['img'];
            $type = $_POST['type'];
            $material = $_POST['material'];
            $description = $_POST['description'];
        
            $sql = "UPDATE products 
            SET 
                name = '$name',
                price = '$price',
                image = '$img',
                type = '$type',
                material = '$material',
                description = '$description'

            WHERE id = '$id';
            ";
            execute($sql);
            header('Location: product.php');
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>phan2_bai3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container p-5 my-5 border">
    <?php
    $id = $_GET['id'];
    $sql = "select * from products where id = '$id'";
    $result = executeResult($sql);
    if(count($result) > 0){
        foreach($result as $row ){
    ?>  
    <form method="post"> 
        <input required type="hidden" name="id" class="form-control" value="<?php echo $id ?>"> <br>     
        <!-- name  -->
        <label for="name" class="form-text"><b>Ten San Pham</b></label> <br>
        <input required type="text" name="name" class="form-control" value="<?php echo $row['name']?>"> <br>
        <!-- price -->
        <label for="price" class="form-text"><b>Gia</b></label> <br>
        <input required type="text" name="price" class="form-control" value="<?php echo $row['price']?>"> <br>
        <!-- image  -->
        <label for="img" class="form-text"><b>Hinh anh</b> </label>    <br>
        <input required type="text" name="img" class="form-control" value="<?php echo $row['image']?>">    <br>
        <!-- type  -->
        <label for="type" class="form-text"><b>Loai san pham</b></label> <br>
        <input required type="text" name="type" class="form-control" value="<?php echo $row['type']?>"> <br>
        <!-- material  -->
        <label for="material" class="form-text"><b>Chat lieu</b></label> <br>
        <input required type="text" name="material" class="form-control" value="<?php echo $row['material']?>"> <br>
        <!-- description -->
        <label for="description" class="form-text"><b>Mo ta</b></label> <br>
        <textarea type="text" name="description" class="form-control"><?php echo $row['description']?> </textarea> <br>
 
        <button class="btn btn-success" >Cap nhat</button>
    </form>
    <?php
        }
    }
    ?>
</div>
</body>
<script src="main.js"></script>
</html> 