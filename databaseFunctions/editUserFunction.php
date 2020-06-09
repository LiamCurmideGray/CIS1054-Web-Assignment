<?php
session_start();
include "connectToDB.php";

$conn = connectionDb();

$userID = $_GET['userId'];

$customer_email = $_GET['editEmail'];
$first_name = $_GET['editFirstname'];
$last_name = $_GET['editLastname'];
$contact_number = $_GET['editTelephone'];
$password = $_GET['editPassword'];
$rptPassword = $_GET['rptPassword'];
$passwordareHashed = false;

echo $userID , " \r\n";

if (empty($password) && empty($rptPassword)) {
    echo "Passwords are empty!\r\n";
    $sql = "SELECT * FROM user WHERE UserID=$userID;";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $password = array_values($row)[2];
    $rptPassword = array_values($row)[2];
    $passwordareHashed = true;

}

if (!empty($userID) && !empty($first_name) && !empty($last_name) && !empty($customer_email) &&
    !empty($contact_number) && !empty($password) && preg_match("/^[a-zA-Z ]*$/", $first_name) && preg_match("/^[a-zA-Z ]*$/", $last_name)
    && is_numeric($contact_number) && filter_var($customer_email, FILTER_VALIDATE_EMAIL)) {

    $passwordHash = "";
    $rptPasswordHash = "";

    if (!$passwordareHashed) {
        require_once 'utils.php';
        $passwordHash = password_hash($password, PASSWORD_DEFAULT, createHash($password));
        $rptPasswordHash = password_hash($rptPassword, PASSWORD_DEFAULT, createHash($rptPassword));
    } else {
        $passwordHash = $password;
        $rptPasswordHash = $rptPassword;
    }

    if (strcmp($passwordHash, $rptPasswordHash) == 0) {

        $sql = "UPDATE user SET Email='$customer_email', Firstname='$first_name',Surname='$last_name',Telephone='$contact_number',UsrPassword='$passwordHash' WHERE UserId='$userID' ";
        if ($conn->query($sql) === true) {
            $_SESSION['result'] = '<script type="text/javascript"> alert("Record updated successfully!")</script>';
        } else {
            echo "<script type='text/javascript'> alert('There was an Error Updating Database!'); window.location.href = 'http://localhost/CIS1054-Web-Assignment/adminPage.php'; </script>";
        }
    } else {
        echo "<script type='text/javascript'> alert('Passwords don\'t match!'); window.location.href = 'http://localhost/CIS1054-Web-Assignment/adminPage.php'; </script>";
    }
} else {
    echo "<script type='text/javascript'> alert('Please check that all fields are correct!') </script>";
}

header('Location: ../adminPage.php');
exit;
