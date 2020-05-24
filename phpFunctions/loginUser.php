<?php
    session_start();

    $email = $_POST['Email'];
    $pswd = $_POST['UsrPassword'];

    if(!empty($email) || !empty($password)){

        require_once('connectToDB.php');
        require_once('utils.php');

        $conn = connectionDb();

        $sql = "SELECT * FROM user WHERE Email=?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $valueOfUsr = $result->fetch_object();

        $dbPassStr = $valueOfUsr->UsrPassword;

        if(password_verify($pswd, $dbPassStr)){ 
            $_SESSION['isLogged'] = true;
            $_SESSION['userID'] = $valueOfUsr->UserId; 
            $_SESSION['isError'] = false;
            header('Location: ../index.php');
            exit;
        }else{
            $_SESSION['isLogged'] = false;
            $_SESSION['isError'] = true;
            header('Location: ../login.php');    
            exit;
        }

    }else{
        $_SESSION['isLogged'] = false;
        $_SESSION['isError'] = true;
        header('Location: ../login.php');    
        exit;
    }
?>