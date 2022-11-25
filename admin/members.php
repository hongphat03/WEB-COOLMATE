<?php
        require_once('../database/dbhelper.php');
        session_start();
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
    <table>
        <thead>
            <tr>
                <td>Id</td>
                <td>Name</td>
                <td>Phone Number</td>
                <td>Email</td>
                <td>Password</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "select * from members";
            $result = executeResult($sql);
            if(count($result) > 0){
                foreach($result as $row ){
            ?>
            <tr>
                <td><?php echo $row['id']?></td>
                <td><?php echo $row['username']?></td>
                <td><?php echo $row['phone_number']?></td>
                <td><?php echo $row['email']?></td>
                <td><?php echo $row['password']?></td>
                <td><a href="edit-user.php">Edit</a></td>
                <td>
                <a href="delete-user.php?id=<?php echo $row['id'] ?>">Delete</a>
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