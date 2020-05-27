<?php
include "header.php";

include "phpFunctions/connectToDB.php";

session_start();


if ($_SESSION['roleId'] == 1) {

    $conn = connectionDb();
    $sql = "SELECT * FROM user;";
    $result = mysqli_query($conn, $sql);
?>

    <form method="POST" name="editRowForm">
        <div class="container">
            <h1> Edit </h1>
            <p> Fill in form to update a row. </p>

            <hr>

            <label> ID </label>
            <input type="number" placeholder="User ID" name="userId" required>

            <label> Email </label>
            <input type="email" placeholder="Email Address" name="editEmail" required>

            <label> FirstName </label>
            <input type="text" placeholder="First Name" name="editFirstname" required>

            <label> Surname </label>
            <input type="text" placeholder="Last Name" name="editLastname" required>

            <label> Telephone </label>
            <input type="number" placeholder="Phone Number" name="editTelephone" min="20000000" max="99999999" required>

            <label> Password </label>
            <input type="password" placeholder="Password" name="editPassword" required>

            <label> Repeat Password </label>
            <input type="password" placeholder="Repeat Password" name="rptPassword" required>
            <hr>

            <button type="submit" class="editbtn" name="update">Update </button>
        </div>

    </form>

<?php

    if (isset($_POST['update'])) {
        $user_id = $_POST['userId'];
        $first_name = $_POST['editFirstname'];
        $last_name = $_POST['editLastname'];
        $contact_number = $_POST['editTelephone'];
        $customer_email = $_POST['editEmail'];
        $password = $_POST['editPassword'];
        $rptPassword = $_POST['rptPassword'];

        if (!empty($user_id) && !empty($first_name) && !empty($last_name) && !empty($customer_email) && !empty($contact_number) && !empty($password) && preg_match("/^[a-zA-Z ]*$/", $first_name) && preg_match("/^[a-zA-Z ]*$/", $last_name) && is_numeric($contact_number) && filter_var($customer_email, FILTER_VALIDATE_EMAIL)) {

            require_once 'phpFunctions/utils.php';
            $passwordHash = password_hash($password, PASSWORD_DEFAULT, createHash($password));
            $rptPasswordHash = password_hash($rptPassword, PASSWORD_DEFAULT, createHash($rptPassword));


            if (strcmp($passwordHash, $rptPasswordHash) == 0) {

                $id = $_POST['userId'];

                $sql = "UPDATE user SET Email='$_POST[editEmail]', Firstname='$_POST[editFirstname]',Surname='$_POST[editLastname]',Telephone='$_POST[editTelephone]',UsrPassword='$passwordHash' WHERE UserId='$_POST[userId]' ";
                $sql2 = "SELECT * FROM user WHERE UserId = '$_POST[userId]'";
                $query = mysqli_query($conn, $sql);
                $query2 = mysqli_query($conn, $sql2);

                if (mysqli_num_rows($query2) > 0) {
                    echo "<script type='text/javascript'> alert('Record updated successfully!'); window.location.href = 'http://localhost/CIS1054-Web-Assignment/adminPage.php'; </script>";
                } else {
                    echo "<script type='text/javascript'> alert('User ID does not exist!'); window.location.href = 'http://localhost/CIS1054-Web-Assignment/adminPage.php'; </script>";
                }
            } else {
                echo "<script type='text/javascript'> alert('Passwords don\'t match!'); window.location.href = 'http://localhost/CIS1054-Web-Assignment/adminPage.php'; </script>";
            }
        } else {
            echo "<script type='text/javascript'> alert('Please check that all fields are correct!'); window.location.href = 'http://localhost/CIS1054-Web-Assignment/adminPage.php'; </script>";
        }
    }
} else {
    header("Location: index.php");
}

include "footer.php";
