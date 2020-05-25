<?php

if (!isset($_SESSION)) {
    session_start();
}

require_once 'connectToDB.php';
require_once 'utils.php';

$conn = connectionDb();

if (array_key_exists('logout', $_POST)) {
    logout();
} else if (array_key_exists('chgEmail', $_POST)) {
    changeEmail();
} else if (array_key_exists('chgName', $_POST)) {
    changeName();
} else if (array_key_exists('chgTelNum', $_POST)) {
    changeTelNum();
} else if (array_key_exists('chgPswd', $_POST)) {
    changePswd();
}

function logout()
{
    $_SESSION['isLogged'] = false;
    $_SESSION['userID'] = null;
    session_destroy();
    header('Location: ../index.php');
    exit;
}

function changeEmail()
{
    $conn = connectionDb();

    $email = $_POST['email'];
    echo $email;

    $sql = "update user set Email=? where UserId= " . $_SESSION['userID'] . "";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();

    header('Location: ../index.php');
    exit;
}

function changeName()
{
    $conn = connectionDb();

    $fName = $_POST['fName'];
    $sName = $_POST['sName'];

    $sql = "update user set Firstname=? where UserId = " . $_SESSION['userID'] . "";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $fName);
    $stmt->execute();

    $sql = "update user set Surname=? where UserId = " . $_SESSION['userID'] . "";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $sName);
    $stmt->execute();

    header('Location: ../index.php');
    exit;
}

function changeTelNum()
{
    $conn = connectionDb();

    $telNum = $_POST['telNum'];
    // echo $telNum;

    if ($telNum > 20000000 && $telNum < 99999999) {

        $sql = "update user set Telephone=? where UserId= " . $_SESSION['userID'] . "";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $telNum);
        $stmt->execute();

        $_SESSION['isError'] = false;

        header('Location: ../index.php');
        exit;
    } else {
        $conn->close();
        $_SESSION['isError'] = true;
        header('Location: ../userAccount.php');
    }
}

function changePswd()
{
    $conn = connectionDb();

    $pswd = $_POST['pswd'];
    $pswdRep = $_POST['pswdRep'];

    // echo $pswd;
    // echo $pswdRep;

    if ($pswd == $pswdRep) {
        $pswdHash = password_hash($pswd, PASSWORD_DEFAULT, createHash($pswd));
        $sql = "update user set UsrPassword=? where UserId= " . $_SESSION['userID'] . "";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $pswdHash);
        $stmt->execute();

        $_SESSION['isError'] = false;

        header('Location: ../index.php'); 
        exit;
    } else {
        $_SESSION['isError'] = true;

        header('Location: ../userAccount.php'); 
        exit;
    }
   
}
