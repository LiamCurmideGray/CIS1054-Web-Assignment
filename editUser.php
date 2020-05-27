<?php
include "header.php";

include "phpFunctions/connectToDB.php";

$conn = connectionDb();


if ($_SESSION['roleId'] == 1) {

    $userID = $_GET['user'];
    if (isset($_POST['editUser'])) {

        $sql = "SELECT * FROM user WHERE UserID=$userID;";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

?>

        <head>
            <link rel="stylesheet" href="stylesheets\editUserStyle.css">
        </head>

        <form method="POST" name="editRowForm">
            <div class="container">
                <h1> Edit </h1>
                <p> Fill in form to update a row. </p>

                <hr>

                <label> ID </label>
                <input type="number" value="<?php echo array_values($row)[0]; ?>" name="userId" required readonly>

                <label> Email </label>
                <input type="email" value="<?php echo array_values($row)[1]; ?>" name="editEmail" required>

                <label> FirstName </label>
                <input type="text" value="<?php echo array_values($row)[3]; ?>" name="editFirstname" required>

                <label> Surname </label>
                <input type="text" value="<?php echo array_values($row)[4]; ?>" name="editLastname" required>

                <label> Telephone </label>
                <input type="number" value="<?php echo array_values($row)[5]; ?>" name="editTelephone" min="20000000" max="99999999" required>

                <label> Password </label>
                <input type="password" placeholder="Password" name="editPassword">

                <label> Repeat Password </label>
                <input type="password" placeholder="Repeat Password" name="rptPassword">
                <hr>

                <button type="submit" class="editbtn" name="update">Update </button>
            </div>

        </form>

<?php
    }
    if (isset($_POST['update'])) {
        $user_id = $_POST['userId'];
        $first_name = $_POST['editFirstname'];
        $last_name = $_POST['editLastname'];
        $contact_number = $_POST['editTelephone'];
        $customer_email = $_POST['editEmail'];
        $password = $_POST['editPassword'];
        $rptPassword = $_POST['rptPassword'];

        if (empty($password) && empty($rptPassword)) {
            $sql = "SELECT UsrPassword FROM user WHERE UserId=$userID;";
            $query = $conn -> prepare($sql);
            $query->execute();
            $result = $query->get_result();
            $valuePassword = $result->fetch_object();
            $password = $valuePassword->UsrPassword;
            $rptPassword = $valuePassword->UsrPassword;
        }

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
