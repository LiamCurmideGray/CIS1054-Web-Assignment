<?php

include 'header.php';
include "databaseFunctions/connectToDB.php";

$conn = connectionDb();

if ($_SESSION['roleId'] == 1) {

    $userID = $_GET['user'];

    if (isset($_POST['editUser'])) {

        $sql = "SELECT * FROM user WHERE UserID=$userID;";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        echo "<form action=\"databaseFunctions/editUserFunction.php?user=" . $userID . "  method=\"POST\" name=\"update\"> ";
        ?>

            <div class="container">
                <h1> Edit </h1>
                <p> Fill in form to update a row. </p>

                <hr>

                <input type="hidden"  value="<?php echo array_values($row)[0]; ?>" name="userId" required readonly>

                <label> Email </label>
                <input type="email" value="<?php echo array_values($row)[1]; ?>" name="editEmail" required>

                <label> FirstName </label>
                <input type="text" value="<?php echo array_values($row)[3]; ?>" name="editFirstname" required>

                <label> Surname </label>
                <input type="text" value="<?php echo array_values($row)[4]; ?>" name="editLastname" required>

                <label> Telephone </label>
                <input type="number" value="<?php echo array_values($row)[5]; ?>" name="editTelephone" min="20000000" max="99999999" required>

                <label> Password </label>
                <input type="password" placeholder="Password: Can be left blank" name="editPassword">

                <label> Repeat Password </label>
                <input type="password" placeholder="Repeat Password: Can be left blank if Password is blank" name="rptPassword">
                <hr>

                <button type="submit" class="editbtn">Update </button>
            </div>

        </form>

<?php
}
}

include 'footer.php';

?>