<?php
    session_start();
    if(!empty($_POST)) {
		require_once('../database/dbhelper.php');
        $username = $phone_number= $content = "";
        $email = $_SESSION['email'];
        if(isset($_POST['name']) && isset($_POST['phone_number']) && isset($_POST['content'])){
            $username = $_POST['name'];
            $phone_number = $_POST['phone_number'];
            $content = $_POST['content'];
            $sql = "insert into feedback (username,phone_number,email,content,status) values('$username','$phone_number','$email','$content','Chưa Phản Hồi') ";
            execute($sql);
        }
    }
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
    <form action="" method="post">
        <label for="name" class="form-text"><b>Ho va Ten</b> </label>    <br>
        <input type="text" name="name" class="form-control">    <br>
        <!-- so dien thoai -->
        <label for="phone_number" class="form-text"><b>SDT</b> </label>    <br>
        <input type="text" name="phone_number" class="form-control">    <br>
        <!-- dia chi -->
        <label for="content" class="form-text"><b>Noi dung</b> </label>    <br>
        <textarea name="content" id="" cols="30" rows="10"></textarea>
        <button class="btn btn-success">Gui</button>
    </form>
</body>
</html>