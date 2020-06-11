<?php
session_start();

$first_name = $_POST['firstName'];
$last_name = $_POST['lastName'];
$contact_number = $_POST['contactNumber'];
$customer_email = $_POST['email'];
$date = $_POST['date'];
$time = $_POST['time'];
$partySize = $_POST['numOfPeople'];
$notes = $_POST['note'];


$email_from = 'chummbuket@gmail.com';
$email_subject = "New Booking Request";
$email_body = "New booking request from $first_name $last_name.\nContact Number: $contact_number\nEmail: $customer_email\nDate & time: $date $time\nParty Size: $partySize\nNotes:\n $notes";

$to = "chummbuket@gmail.com";
$headers = "From: $email_from ";
$headers .= "Reply to:  $customer_email";

if (!empty($first_name) && !empty($last_name) && !empty($contact_number) && !empty($customer_email) && $partySize > 0 && filter_var($customer_email, FILTER_VALIDATE_EMAIL)) {
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo "<script type='text/javascript'> alert('Your booking request has been sent!'); window.location.href = 'http://localhost/CIS1054-Web-Assignment/contact.php'; </script>";
    } else {
        echo "<script type='text/javascript'> alert('Email sending failed!'); window.location.href = 'http://localhost/CIS1054-Web-Assignment/contact.php'; </script>";
        exit;
    }
}
else {
    echo "<script type='text/javascript'> alert('Email sending failed! Check all fields.'); window.location.href = 'http://localhost/CIS1054-Web-Assignment/contact.php'; </script>";
    exit;
}
