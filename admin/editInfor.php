
<?php 
    session_start();
    require_once('../database/dbhelper.php'); 
    if(isset($_GET['id']))
    $id = $_GET['id'];
    if(!empty($_POST)) {
        $address = $phone = $email = $facebook = $youtube = "";
        if(isset($_POST['address']) && isset($_POST['phone'])&& isset($_POST['email'])&& isset($_POST['facebook'])&& isset($_POST['youtube'])){    
            $address = $_POST['address'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $facebook = $_POST['facebook'];
            $youtube = $_POST['youtube'];
        echo $id;
            $sql= "UPDATE infor
            SET 
                address = '$address',
                phone = '$phone',
                email = '$email',
                facebook = '$facebook',
                youtube = '$youtube'
            WHERE id = '$id';
            ";
            execute($sql);
            header('Location: infor.php');
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
    $sql = "select * from infor where id = '$id'";
    $result = executeResult($sql);
    if(count($result) > 0){
        foreach($result as $row ){
    ?>  
    <form method="post"> 
        <input type="hidden" name="id" class="form-control" value="<?php echo $id ?>"> <br>     
        <!-- name  -->
        <label for="address" class="form-text"><b>Họ và Tên</b></label> <br>
        <input type="text" name="address" class="form-control" value="<?php echo $row['address']?>" > <br>
        <!-- sdt -->
        <label for="phone" class="form-text"><b>Số điện thoại</b></label> <br>
        <input type="text" name="phone" class="form-control" value="<?php echo $row['phone']?>" > <br>
        <!-- email  -->
        <label for="email" class="form-text"><b>Email</b> </label>    <br>
        <input type="email" name="email" class="form-control" value="<?php echo $row['email']?>">    <br>
         <!-- facebook  -->
        <label for="facebook" class="form-text"><b>Facebook</b> </label>    <br>
        <input type="text" name="facebook" class="form-control" value="<?php echo $row['facebook']?>">  
         <!-- youtube  -->
         <label for="youtube" class="form-text"><b>Youtube</b> </label>    <br>
        <input type="text" name="youtube" class="form-control" value="<?php echo $row['youtube']?>">  
    
        <button class="btn btn-success" >Cap nhat</button>
    </form>
    <?php
        }
    }
    ?>
</div>
</body>
</html> 