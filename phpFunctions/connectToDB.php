<?php
    function connectionDb(){
        $servername = "localhost";
        $username = "root";
        $dbPassword = "";
        $dbname = "webassignment";
            
        $conn = new mysqli($servername, $username, $dbPassword, $dbname); 
        
        if (mysqli_connect_error()) {
        
            die('Connect Error('. mysqli_connect_error().')'. mysqli_connect_error());
        }else{
           return $conn; 
        }
    }
?>