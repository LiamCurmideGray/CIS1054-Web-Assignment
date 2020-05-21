<?php
    session_start();

    $email = $_POST['Email'];
    $pswd = $_POST['UsrPassword'];

    if(!empty($email) || !empty($password)){

        require_once('connectToDB.php');
        require_once('utils.php');

        $conn = connectionDb();

        $sql = "SELECT UsrPassword FROM user WHERE Email=?";

        // $dbPass = mysqli_query($conn, $sql);
        // $dbPassArr = mysqli_fetch_array($dbPass);
        // $dbPassStr = implode($dbPassArr);

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $valueOfUsrPass = $result->fetch_object();

        $dbPassStr = $valueOfUsrPass->UsrPassword;

        // echo gettype($pswd);
        // echo gettype($dbPassStr);       
        
        // echo password_verify($pswd, $dbPassStr) ? 'true' : 'false';
        
        // if(mysqli_num_rows($dbPass)==1){
        if(password_verify($pswd, $dbPassStr)){            
            header('Location: ../index.php');
            exit;
        }else{
            $_SESSION['result'] = '<script>document.getElementById("loginError").style.opacity = "1";</script>';
            header('Location: ../login.php');    
            exit;
        }

    }else{
        $_SESSION['result'] = '<script>document.getElementById("loginError").style.opacity = "1";</script>';
        header('Location: ../login.php');    
        exit;
    }
?>