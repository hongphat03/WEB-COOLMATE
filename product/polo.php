<?php
        require_once('../database/dbhelper.php');
        session_start();
        if(isset($_POST['add'])){
            if(!empty($_POST['id'])){
                header('Location: ../user/contact.php');
                echo "ji";
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
    <?php
    $sql = "select * from products where type = 'Áo Polo' ";
    $result = executeResult($sql);
    if(count($result) > 0){
        foreach($result as $row ){
    ?>
        <div><?php echo $row['name']?></div>
        <div><?php echo $row['price']?></div>
        <div><?php echo $row['material']?></div>
        <div><?php echo $row['description']?></div>
        <div> <img src="<?php echo $row['image']?>" alt="" width="200px" ></div>
        <div>
        <form method="post" action="">
            <input type="hidden" name="id" value="<?php echo $row['id']?>">
            <input type="submit" name="add" value="Them vao gio hang">
        </form>
        </div>
    <?php
        }
    }
    ?>
    
</body>
</html>