<?php
        require_once('../database/dbhelper.php');
        session_start();
        $id = $_GET['id'];
        $sql = "delete from members where id = '$id'";
        execute($sql);
        $sql = "UPDATE members SET id = id-1 WHERE id>'$id'";
        execute($sql);
        $sql = "ALTER TABLE members AUTO_INCREMENT=1";
        execute($sql);
        header('Location:members.php');
?>