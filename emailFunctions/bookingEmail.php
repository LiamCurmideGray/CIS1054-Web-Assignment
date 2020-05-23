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

if (!empty($first_name) && !empty($last_name) && !empty($customer_email) && $date >= date('Y-m-d') && $partySize > 0 && preg_match("/^[a-zA-Z ]*$/",$first_name) && preg_match("/^[a-zA-Z ]*$/",$last_name) && is_numeric($contact_number) && filter_var($customer_email, FILTER_VALIDATE_EMAIL)){

$email_from = 'root@localhost';
$email_subject = "New Booking Request";
$email_body = "New booking request from $first_name $last_name.\nContact Number: $contact_number\nEmail: $customer_email\nDate & time: $date $time\nParty Size: $partySize\nNotes:\n $notes";

$to = "root@localhost";
$headers = "From: $email_from ";
$headers .= "Reply to:  $customer_email";

mail($to,$email_subject,$email_body,$headers);

$_SESSION['result'] = '<script> alert("Your booking request has been sent!") </script>';

header('Location: ../contact.php');
}

else {
    $_SESSION['result'] = '<script> alert("Please check that all fields are correct") </script>';
    header('Location: ../contact.php');
    exit;
}
?>
