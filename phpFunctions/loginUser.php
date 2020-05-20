<?php
    session_start();

    $email = $_POST['Email'];
    $pswd = $_POST['UsrPassword'];

    if(!empty($email) || !empty($password)){

        require_once('connectToDB.php');

        $conn = connectionDb();

        $sql = "select * from user where Email='$email' and UsrPassword='$pswd' limit 1";

        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result)==1){            
            header('Location: ../index.php');
            exit;
        }else{
            $_SESSION['result'] = '<script>document.getElementById("loginError").style.opacity = "1";</script>';
            header('Location: ../login.php');    
        }

    }else{
        $_SESSION['result'] = '<script>document.getElementById("loginError").style.opacity = "1";</script>';
        header('Location: ../login.php');    
        exit;
    }
?>