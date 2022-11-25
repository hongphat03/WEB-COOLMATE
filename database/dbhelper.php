<?php
    require_once('config.php');
    function createDatabase() {
        //save data into table
        // open connection to database
        $con = mysqli_connect(HOST, USERNAME, PASSWORD);
        //insert, update, delete
        $sql = 'CREATE DATABASE IF NOT EXISTS '.DATABASE;
        mysqli_query($con, $sql);
    
        //close connection
        mysqli_close($con);
    }
    
    function execute($sql) {
        //save data into table
        // open connection to database
        $con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
        //insert, update, delete
        $res = mysqli_query($con, $sql);
    
        //close connection
        mysqli_close($con);
        return $res;
    }
    
    function executeResult($sql) {
        //save data into table
        // open connection to database
        $con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
        //insert, update, delete
        $result = mysqli_query($con, $sql);
        $data   = [];
        while ($row = mysqli_fetch_array($result, 1)) {
            $data[] = $row;
        }
    
        //close connection
        mysqli_close($con);
    
        return $data;
    }
?>