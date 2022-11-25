<?php
        require_once('../database/dbhelper.php');
        session_start();
        $id = $_GET['id'];
        $sql = "delete from products where id = '$id'";
        execute($sql);
        $sql = "UPDATE products SET id = id-1 WHERE id>'$id'";
        execute($sql);
        $sql = "ALTER TABLE products AUTO_INCREMENT=1";
        execute($sql);
        header('Location:view-product.php');
?>