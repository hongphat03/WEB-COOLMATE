
<?php 
    session_start();
    require_once('../database/dbhelper.php'); 
    if(!empty($_POST)) {
        $name = $price = $img = $type = $material = $description = "";
        if(isset($_POST['name']) && isset($_POST['price']) && isset($_POST['img']) && isset($_POST['type']) && isset($_POST['material']) && isset($_POST['description'])){
            $name = $_POST['name'];
            $price = $_POST['price'];
            $img = $_POST['img'];
            $type = $_POST['type'];
            $material = $_POST['material'];
            $description = $_POST['description'];
        
            $sql = "insert into products (name,price,image,type,material,description) values('$name','$price','$img','$type','$material','$description')";
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
    <form method="post">      
        <!-- name  -->
        <label for="name" class="form-text"><b>Ten San Pham</b></label> <br>
        <input type="text" name="name" class="form-control"> <br>
        <!-- price -->
        <label for="price" class="form-text"><b>Gia</b></label> <br>
        <input type="text" name="price" class="form-control"> <br>
        <!-- image  -->
        <label for="img" class="form-text"><b>Hinh anh</b> </label>    <br>
        <input type="text" name="img" class="form-control">    <br>
        <!-- type  -->
        <label for="type" class="form-text"><b>Loai san pham</b></label> <br>
        <input type="text" name="type" class="form-control"> <br>
        <!-- material  -->
        <label for="material" class="form-text"><b>Chat lieu</b></label> <br>
        <input type="text" name="material" class="form-control"> <br>
        <!-- description -->
        <label for="description" class="form-text"><b>Mo ta</b></label> <br>
        <input type="text" name="description" class="form-control"> <br>
 
        <button class="btn btn-success" >Them vao</button>
    </form>
</div>
</body>
<script src="main.js"></script>
</html> 