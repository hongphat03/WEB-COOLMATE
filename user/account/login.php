<?php
	session_start();
	$error['login'] = "";
	if(!empty($_POST)) {
		require_once('../../database/dbhelper.php');
		$email = $password = '';
		if(isset($_POST['email']) && isset($_POST['password'])) {
			$email = $_POST['email'];
			$password = $_POST['password'];
			$sql = "select * from members where email = '$email' and password = '$password'";
			$result = executeResult($sql);
			if($result != null && count($result) > 0) {
				//login success
				$_SESSION['email'] = $email;
				header('Location: http://localhost/COOLMATE/index.php');
			}
			else{
				$error['login'] = "Email hoặc mật khẩu chưa đúng";
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
    <link rel="stylesheet" href="../css/stylelogin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
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
				<p><?php if(strlen($error["login"]>0)) echo $error['login']; ?> </p>
				<!-- submit -->
				<button class="btnlogin">Đăng nhập</button> <br>
				<a href="./register.php" class="btnRegister">Đăng kí thành viên mới</a>
			</form>
		</div>
	</div>
</body>
</html> 