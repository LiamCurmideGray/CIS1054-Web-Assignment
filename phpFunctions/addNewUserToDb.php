<?php
session_start();

$email = $_POST['email'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$telephone = $_POST['telephone'];
$password = $_POST['password'];
$rptPassword = $_POST['password-repeat'];

if (!empty($email) || !empty($firstname) || !empty($lastname) || !empty($telephone) || !empty($password) || !empty($rptPassword)) {
    require_once 'connectToDB.php';

    $conn = connectionDb();

    if (isset($conn)) {

        require_once '../utils.php';
        $passwordHash = password_hash($password, PASSWORD_DEFAULT, createHash($password));
        $rptPasswordHash = password_hash($rptPassword, PASSWORD_DEFAULT, createHash($rptPassword));

        
      
        if (strcmp($passwordHash, $rptPasswordHash) == 0) {

            if ($telephone > 20000000 && $telephone < 28000000) {
                
                $INSERT = "INSERT INTO user (Email, UsrPassword, Firstname, Surname, Telephone) values(?, ?, ?, ?, ?)";

                $stmt = $conn->prepare($INSERT);
                //Need to map the data type of the database s = string , i = integer
                $stmt->bind_param("ssssi", $email, $passwordHash, $firstname, $lastname, $telephone);
                $stmt->execute();

                $_SESSION['result'] = '<script>alert("Record inserted in database") </script>';

                $stmt->close();
                $conn->close();
                header('Location: ../register.php');
                exit;
            } else {
                $_SESSION['result'] = '<script>alert("Telephone Number Out Of Range") </script>';
                header('Location: ../register.php');
                exit;
            }

        } else {
            $_SESSION['result'] = '<script>alert("Passwords do not match") </script>';
            header('Location: ../register.php');
            exit;
        }

    } else {
        $_SESSION['result'] = '<script> alert("All fields are required") </script>';
        header('Location: ../register.php');
        exit;
    }
}
