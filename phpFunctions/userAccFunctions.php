<?php

if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

require_once 'connectToDB.php';
$conn = connectionDb();

if(array_key_exists('logout', $_POST)){
    logout();
}else if(array_key_exists('chgEmail', $_POST)){
    changeEmail();
}else if(array_key_exists('chgName', $_POST)){
    changeName();
}

function logout(){
    $_SESSION['isLogged'] = false;
    $_SESSION['userID'] = null;
    session_destroy();
    header('Location: ../index.php');
    exit;
}
   
function changeEmail(){
    $conn = connectionDb();

    $email = $_POST['email'];
    echo $email;
    
    $sql = "update user set Email=? where UserId= ".$_SESSION['userID']."";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();

    header('Location: ../index.php');
    exit;
}

function changeName(){
    $conn = connectionDb();

    $fName = $_POST['fName'];
    $sName = $_POST['sName'];

    $sql = "update user set Firstname=? where UserId = ".$_SESSION['userID']."";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $fName);
    $stmt->execute();

    $sql = "update user set Surname=? where UserId = ".$_SESSION['userID']."";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $sName);
    $stmt->execute();

    header('Location: ../index.php');
    exit;
}
?>