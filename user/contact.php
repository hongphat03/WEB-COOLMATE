<?php
	session_start();
	
	if(!empty($_POST)) {
		require_once('../database/dbhelper.php');
		$name = $email = $address = $phone_number = '';
		if(isset($_POST['email'])) {
			$email = $_POST['email'];
		}
        if(isset($_POST['name'])) {
			$name = $_POST['name'];
		}
		if(isset($_POST['address'])) {
			$address = $_POST['address'];
		}
        if(isset($_POST['phone_number'])) {
			$phone_number = $_POST['phone_number'];
		}
		if(!empty($email) && !empty($phone_number) && !empty($address)) {
			$sql = "insert into contacts (address,phone_number,email,name) values('$address','$phone_number','$email','$name')";
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
    <title>phan2_bai3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container p-5 my-5 border">
   
    <form method="post">       
         <!-- dia chi -->
        <label for="name" class="form-text"><b>Ho va Ten</b> </label>    <br>
        <input type="text" name="name" class="form-control">    <br>
        <!-- dia chi -->
        <label for="address" class="form-text"><b>Dia chi</b> </label>    <br>
        <input type="text" name="address" class="form-control">    <br>
        <!-- so dien thoai -->
        <label for="phone_number" class="form-text"><b>SDT</b> </label>    <br>
        <input type="text" name="phone_number" class="form-control">    <br>
        <!-- email -->
        <label for="email" class="form-text"><b>Email</b> </label>    <br>
        <input type="email" name="email" class="form-control">    <br>
    
        
        <!-- submit -->
        <button class="btn btn-success">Mua hang</button>
    </form>
</div>
</body>
</html> 