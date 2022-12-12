<?php
        require_once('../database/dbhelper.php');
        session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
    <style>
        a{
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="nav-list">
        <ul class="list-group col-2">
            <li class="list-group-item bg-light bg-gradient active"><a href="./members.php" class="">Quan ly thanh vien</a></li>
            <li class="list-group-item bg-light bg-gradient"><a href="./feedback.php" class="">Quan ly feedback</a></li>
            <li class="list-group-item bg-light bg-gradient"><a href="./contact.php" class="">Quan ly thong tin khach hang</a></li>
            <li class="list-group-item bg-light bg-gradient"><a href="./admins.php" class="">Danh sach Admin</a></li>
            <li class="list-group-item bg-light bg-gradient"><a href="./view-product.php" class="">Quan ly san pham</a></li>
            <li class="list-group-item bg-light bg-gradient"><a href="./order.php" class="">Quan ly don hang</a></li>
            <li class="list-group-item bg-light bg-gradient"><a href="./business.php" class="">Quan ly kinh doanh</a></li>
        </ul>
        <div class="col-10">
            <div class="content">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <td>Id</td>
                        <td>Name</td>
                        <td>Phone Number</td>
                        <td>Email</td>
                        <td>Password</td>
                        <td></td>
                        <td></td>
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
                        <td><a href="edit-user.php?id=<?php echo $row['id'] ?>">Edit</a></td>
                        <td> <a href="delete-user.php?id=<?php echo $row['id'] ?>">Delete</a></td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
            </div>
            
        </div>
    </div> 
</body>
</html>