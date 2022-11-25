<?php
    require_once('../database/dbhelper.php');
    session_start();
    
    if(isset($_POST["add-admin"])){
        $email  = $password = "";
        if(!empty( $_POST['email']) && !empty( $_POST['password'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $sql = "insert into admins (email,password) values('$email','$password')";
            execute($sql);
        }
    }
    if(isset($_POST["delete-admin"])){
        $email  = "";
        if(!empty( $_POST['email'])){
            $email = $_POST['email'];
            $sql = "delete from admins where email = '$email'";
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
        <input type="text" name="email">
        <input type="text" name="password">
        <input type="submit" name="add-admin">
    </form>
    <table>
        <thead>
            <tr>
                <td>Email</td>
                <td>Password</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "select * from admins";
            $result = executeResult($sql);
            if(count($result) > 0){
                foreach($result as $row ){
            ?>
            <tr>
                <td><?php echo $row['email']?></td>
                <td><?php echo $row['password']?></td>
                <td><a href="">Edit</a></td>
                <td>
                <form action="" method="post" >
                    <input type="hidden" name="email" value="<?php echo $row['email']?>">
                    <input type="submit" name="delete-admin">
                </form>
                </td>
            </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
    
</body>
</html>