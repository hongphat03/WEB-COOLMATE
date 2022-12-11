<?php 
    session_start();
    require_once('../database/dbhelper.php'); 
            $email = $_POST['email'];
echo $email;
            $sql = "select * from members where email = '$email'";
            $result = executeResult($sql);
            if(count($result) > 0){
    echo 'false';
            }
            else{
    echo 'true';
            }

?>