<?php
	session_start();
	
	if(!empty($_POST)) {
		require_once('../../database/dbhelper.php');
		$email = $password = '';
		if(isset($_POST['email'])) {
			$email = $_POST['email'];
		}
		if(isset($_POST['password'])) {
			$password = $_POST['password'];
		}
		if(!empty($email)) {
			$sql = "select * from admins where email = '$email' and password = '$password'";
			$result = executeResult($sql);
			if($result != null && count($result) > 0) {
				//login success
				header('Location: ../admin/index.php');
				die();
			}
			$sql = "select * from members where email = '$email' and password = '$password'";
			$result = executeResult($sql);
			if($result != null && count($result) > 0) {
				//login success
				$_SESSION['email'] = $email;
				header('Location: ../../index.php');
				die();
			}
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
        <!-- email -->
        <label for="email" class="form-text"><b>Email</b> </label>    <br>
        <input type="email" name="email" class="form-control">    <br>
    
        <!-- password -->
        <label for="password" class="form-text"><b>Password</b></label> <br>
        <input type="password" name="password" class="form-control"> <br>
    
        <!-- submit -->
        <button class="btn btn-success">Login</button>
        <a href="register.php" class="btn btn-success">Register</a>
    </form>
</div>
</body>
</html> 