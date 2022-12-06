
<?php 
    session_start();
    require_once('../database/dbhelper.php'); 
    $id = $_GET['id'];
    if(!empty($_POST)) {
        $name = $phone_number = $email = "";
        if(isset($_POST['name']) && isset($_POST['phone_number'])&& isset($_POST['email'])){    
           
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone_number = $_POST['phone_number'];    
            $sql= "UPDATE members
            SET 
                username = '$name',
                phone_number = '$phone_number',
                email = '$email'
            WHERE id = '$id';
            ";
            execute($sql);
            header('Location: members.php');
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
    <style>
        body{
            background-color: #F8F9FA;
        }
    </style>
</head>
<body>
<div class="container p-5 my-5 border">
    <?php
    $sql = "select * from members where id = '$id'";
    $result = executeResult($sql);
    if(count($result) > 0){
        foreach($result as $row ){
    ?>  
    <form method="post"> 
        <input type="hidden" name="id" class="form-control" value="<?php echo $id ?>"> <br>     
        <!-- name  -->
        <label for="name" class="form-text"><b>Ten San Pham</b></label> <br>
        <input type="text" name="name" class="form-control" value="<?php echo $row['username']?>"> <br>
        <!-- price -->
        <label for="phone_number" class="form-text"><b>Gia</b></label> <br>
        <input type="text" name="phone_number" class="form-control" value="<?php echo $row['phone_number']?>"> <br>
        <!-- email  -->
        <label for="email" class="form-text"><b>Hinh anh</b> </label>    <br>
        <input type="text" name="email" class="form-control" value="<?php echo $row['email']?>">    <br>
 
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