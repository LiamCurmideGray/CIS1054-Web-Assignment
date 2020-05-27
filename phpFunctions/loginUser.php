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

        // echo gettype($valueOfUsr);


        if(password_verify($pswd, $dbPassStr)){
          
           $_SESSION['isLogged'] = true;
            $_SESSION['userID'] = $valueOfUsr->UserId; 
            $_SESSION['isError'] = false;
          
            $INSERT = "SELECT RoleId FROM userroles WHERE UserId=?";
            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("i", $valueOfUsrPass->UserId);
            $stmt->execute();
            $result = $stmt->get_result();
            $valueOfUsrRole = $result->fetch_object();
    
            $_SESSION['roleId'] = $valueOfUsrRole->RoleId;
            
            if ($_SESSION['roleId'] == 1){
            
            header('Location: ../adminPage.php');
            }

            else {
                header('Location: ../index.php');
            }


    }else{
        $_SESSION['isLogged'] = false;
        // $_SESSION['result'] = '<script>document.getElementById("loginError").style.opacity = "1";</script>';
        $_SESSION['isError'] = true;
        header('Location: ../login.php');    
        exit;
    }
    }
    else{
        $_SESSION['isLogged'] = false;
        // $_SESSION['result'] = '<script>document.getElementById("loginError").style.opacity = "1";</script>';
        $_SESSION['isError'] = true;
        header('Location: ../login.php');    
        exit;
    }
    ?>