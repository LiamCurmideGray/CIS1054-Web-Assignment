<?php
session_start();

$email = $_POST['email'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$telephone = $_POST['telephone'];
$password = $_POST['password'];
$rptPassword = $_POST['password-repeat'];

if (!empty($email) && !empty($firstname) && !empty($lastname) && !empty($telephone) && !empty($password) && !empty($rptPassword)) {
    require_once 'connectToDB.php';

    $conn = connectionDb();

    if (isset($conn)) {

        require_once 'utils.php';
        $passwordHash = password_hash($password, PASSWORD_DEFAULT, createHash($password));
        $rptPasswordHash = password_hash($rptPassword, PASSWORD_DEFAULT, createHash($rptPassword));

        if (strcmp($passwordHash, $rptPasswordHash) == 0) {

            $sql = "SELECT Email FROM user WHERE Email = '$email'";

            $query = mysqli_query($conn, $sql);

            if (mysqli_num_rows($query) <= 0) {

                if ($telephone > 20000000 && $telephone < 99999999) {

                    $INSERT = "INSERT INTO user (Email, UsrPassword, Firstname, Surname, Telephone) values(?, ?, ?, ?, ?)";
                    $stmt = $conn->prepare($INSERT);
                    //Need to map the data type of the database s = string , i = integer
                    $stmt->bind_param("ssssi", $email, $passwordHash, $firstname, $lastname, $telephone);
                    $stmt->execute();

                    $GetUserId = "SELECT UserId FROM user WHERE Email=?";
                    $stmt = $conn->prepare($GetUserId);
                    $stmt->bind_param('s', $email);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $valueOfUserId = $result->fetch_object();

                    $GetRoleId = "SELECT RoleId FROM roledetails WHERE RoleName=?";
                    $stmt = $conn->prepare($GetRoleId);
                    $RoleName = "User";
                    $stmt->bind_param('s', $RoleName);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $valueOfRoleId = $result->fetch_object();

                    $INSERT = "INSERT INTO userroles (UserId, RoleId) values (?,?)";
                    $stmt = $conn->prepare($INSERT);
                    $stmt->bind_param("ii", $valueOfUserId->UserId, $valueOfRoleId->RoleId);
                    $stmt->execute();

                    $stmt->close();
                    $conn->close();
                    $_SESSION['result'] = '<script>alert("Record inserted in database") </script>';
                    header('Location: ../register.php');
                    exit;
                } else {
                    $conn->close();
                    $_SESSION['result'] = '<script>alert("Telephone Number Out Of Range") </script>';
                    header('Location: ../register.php');
                    exit;
                }

            } else {
                $conn->close();
                $_SESSION['result'] = '<script>alert("Email Address already exists") </script>';
                header('Location: ../register.php');
                exit;
            }

        } else {
            $conn->close();
            $_SESSION['result'] = '<script>alert("Passwords do not match") </script>';
            header('Location: ../register.php');
            exit;
        }
    }
    
} else {
    $conn->close();
    $_SESSION['result'] = '<script> alert("All fields are required") </script>';
    header('Location: ../register.php');
    exit;
}
