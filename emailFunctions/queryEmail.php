<?php

session_start();

$first_name = $_POST['firstName'];
$last_name = $_POST['lastName'];
$customer_email = $_POST['email'];
$message = $_POST['message'];


if (!empty($first_name) && !empty($last_name) && !empty($customer_email) && !empty($message) && preg_match("/^[a-zA-Z ]*$/",$first_name) && preg_match("/^[a-zA-Z ]*$/",$last_name) && filter_var($customer_email, FILTER_VALIDATE_EMAIL)) {
    
$email_from = 'root@localhost';
$email_subject = "New Query/Complaint";
$email_body = "New query/complaint from $first_name $last_name.\nMessage:\n $message";

$to = "root@localhost";
$headers = "From: $email_from ";
$headers .= "Reply to: $customer_email";

mail($to,$email_subject,$email_body,$headers);

$_SESSION['result'] = '<script> alert("Your request has been sent!") </script>';

header('Location: ../contact.php');
}

else {
    $_SESSION['result'] = '<script> alert("Please check that all fields are correct") </script>';
    header('Location: ../contact.php');
    exit;
}
?>