<?php
    function clean_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
    }

    // function to set up db connection

    // func to insert user

    //func to get user
?>