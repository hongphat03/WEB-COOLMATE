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
    <?php
    $sql = "select * from products where type = 'Áo Tank top' ";
    $result = executeResult($sql);
    if(count($result) > 0){
        foreach($result as $row ){
    ?>
        <div><?php echo $row['name']?></div>
        <div><?php echo $row['price']?></div>
        <div><?php echo $row['material']?></div>
        <div><?php echo $row['description']?></div>
        <div> <img src="<?php echo $row['image']?>" alt="" width="200px"></div>
    <?php
        }
    }
    ?>
    
</body>
</html>