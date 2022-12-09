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
	<link rel="stylesheet" href="../css/stylelogin.css">
</head>
<body>

<div class="screenLogin">
		<div class="centerScreen">
			<div class="title">Đăng Nhập</div>
			<form method="post">       
				<!-- email -->
				<input type="email" name="email" class="formControl" placeholder="Email/SĐT của bạn">    <br>
			
				<!-- password -->
				<input type="password" name="password" class="formControl" placeholder="Mật khẩu"> <br>
			
				<!-- submit -->
				<button class="btnlogin">Đăng nhập</button> <br>
				<a href="./register.php" class="btnRegister">Đăng kí thành viên mới</a>
			</form>
		</div>
	</div>
</body>
</html> 