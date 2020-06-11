<?php

session_start();

$first_name = $_POST['firstName'];
$last_name = $_POST['lastName'];
$customer_email = $_POST['email'];
$message = $_POST['message'];
    
$email_from = 'chummbuket@gmail.com';
$email_subject = "New Query/Complaint";
$email_body = "New query/complaint from $first_name $last_name.\nEmail: $customer_email\nMessage:\n $message";

$to = "chummbuket@gmail.com";
$headers = "From: $email_from ";
$headers .= "Reply to: $customer_email";

if (!empty($first_name) && !empty($last_name) && !empty($customer_email) && !empty($message) && filter_var($customer_email, FILTER_VALIDATE_EMAIL)) {
if (mail($to,$email_subject,$email_body,$headers)){
    echo "<script type='text/javascript'> alert('Your booking request has been sent!'); window.location.href = 'http://localhost/CIS1054-Web-Assignment/contact.php'; </script>";
    }
    
    else {
        echo "<script type='text/javascript'> alert('Email sending failed!'); window.location.href = 'http://localhost/CIS1054-Web-Assignment/contact.php'; </script>";
        exit;
    }
}
else {
    echo "<script type='text/javascript'> alert('Email sending failed! Check all fields.'); window.location.href = 'http://localhost/CIS1054-Web-Assignment/contact.php'; </script>";
    exit;
}
?>