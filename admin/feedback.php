<?php
    require_once('../database/dbhelper.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <td>Ho va Ten</td>
                <td>So dien thoai</td>
                <td>Email</td>
                <td>Noi dung</td>
            </tr>
        </thead>
        <tbody>
        <?php
            $sql = "select * from feedback";
            $result = executeResult($sql);
            if(count($result) > 0){
                foreach($result as $row ){
            ?>
            <tr>
                <td><?php echo $row['username']?></td>
                <td><?php echo $row['phone_number']?></td>
                <td><?php echo $row['email']?></td>
                <td><?php echo $row['content']?></td>
            </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
</body>
</html>