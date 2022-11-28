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
    <p><a href="../user/product_in_cart.php">Gio Hang</a></p>
    <form method="post" action="">
        <select name="Type">
            <option value="">Loai</option>
            <option value="Áo Tank top">Áo Tank top</option>
            <option value="Áo T-shirt">Áo T-shirt</option>
            <option value="Áo Polo">Áo Polo</option>
            <option value="Áo Sơ Mi">Áo Sơ Mi</option>
        </select>
        
        <select name="material" id="">
            <option value="">Chat Lieu</option>
            <option value="Vải Cotton">Vải Cotton</option>
            <option value="Vải Excool">Vải Excool</option>
            <option value="Vải Polyester tính n">Vải Polyester tính n</option>
        </select>
        <button class="btn btn-success" >Tim</button>
    </form>
    <?php
    $sql = "select * from products";
    $result = executeResult($sql);
    if(!empty($_POST['Type'])){
        $type = $_POST['Type'];
        $result2 = [];
        foreach($result as $row ){
            if($row['type'] == $type){
                $result2[] =  $row;
            }
        }
        $result = [];
        $result = $result2;
    }
    if(!empty($_POST['material'])){
        $material = $_POST['material'];
        $result2 = [];
        foreach($result as $row ){
            if($row['material'] == $material){
                $result2[] =  $row;
            }
        }
        $result = [];
        $result = $result2;
    }
    if(count($result) > 0){
        foreach($result as $row ){
    ?>
        <a href="detailProduct.php?ProductId=<?php echo $row['id']?>">
            <div><?php echo $row['name']?></div>
            <div><?php echo $row['price']?></div>
            <div><?php echo $row['material']?></div>
            <div><?php echo $row['description']?></div>
            <div> <img src="<?php echo $row['image']?>" alt="" width="200px"></div>
        </a>    
    <?php
        }
    }
    ?>

</body>
</html>