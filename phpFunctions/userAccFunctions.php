<?php
session_start();

require_once 'connectToDB.php';
$conn = connectionDb();

if(array_key_exists('logout', $_POST)){
    logout();
}else if(array_key_exists('chgEmail', $_POST)){

    changeEmail();
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
?>