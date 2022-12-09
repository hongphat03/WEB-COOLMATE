<?php
    require_once('../database/dbhelper.php');
    if(isset($_GET['content'])){
        $content = $_GET['content'];
        if(isset($_GET['status'])){
            $status = $_GET['status'];
            $sql = "update feedback
            set status = $status where content ='$content' ";
            execute($sql);
        }
        else{
            $sql = "delete from feedback where content = '$content'";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <title></title>
    <style>
        a{
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="nav-list">
        <ul class="list-group col-2">
            <li class="list-group-item bg-light bg-gradient"><a href="./members.php" class="">Quản lý thành viên</a></li>
            <li class="list-group-item bg-light bg-gradient active"><a href="./feedback.php" class="">Quản lý phản hồi</a></li>
            <li class="list-group-item bg-light bg-gradient"><a href="./admins.php" class="">Quản lý admin</a></li>
            <li class="list-group-item bg-light bg-gradient"><a href="./product.php" class="">Quản lý sản phẩm</a></li>
            <li class="list-group-item bg-light bg-gradient"><a href="./order.php" class="">Quản lý đơn hàng</a></li>
            <li class="list-group-item bg-light bg-gradient"><a href="./business.php" class="">Quản lý kinh doanh</a></li>
        </ul>
        <div class="col-10">
            <div class="content">
                <table class="table table-hover">
                    <thead class="table-secondary">
                        <tr>
                            <td>Ho va Ten</td>
                            <td>So dien thoai</td>
                            <td>Email</td>
                            <td>Noi dung</td>
                            <td>Trạng thái</td>
                            <td></td>
                            <td></td>
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
                            <td><?php echo $row['status']?></td>
                            <td><a href="feedback.php?content=<?php echo $row['content']?>&status='Đã Phản Hồi'">Đã Phản Hồi</a></td>
                            <td><a href="feedback.php?content=<?php echo $row['content']?>">Delete</a></td>
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