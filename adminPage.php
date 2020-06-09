<?php
include "header.php";

if (isset($_SESSION['roleId'])) {
    
    if ($_SESSION['roleId'] == 1) {
        
        include "databaseFunctions/connectToDB.php";
        $conn = connectionDb();
        $sql = "SELECT * FROM user;";
        $result = mysqli_query($conn, $sql);

        ?>

        <div>
            <br>
            <div class="userTable">
                <input id="collapsible" class="toggle" type="checkbox" checked>
                <label for="collapsible" class="lbl-toggle">Click here to show/hide users</label>
                <div class="collapsible-content">
                        <table>
                            <!-- <th class="header" style="text-align: center;">User ID</th> -->
                            <th style="text-align: center;">Email</th>
                            <!-- <th style="text-align: center;">Password ID</th> -->
                            <th style="text-align: center;">First Name</th>
                            <th style="text-align: center;">Last Name</th>
                            <th style="text-align: center;">Telephone</th>
                            <th style="text-align: center;">Edit</th>
                            <th style="text-align: center;">Delete</th>
<?php

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            foreach ($row as $field => $value) {
                if (strcmp($field, "UserId") == 0 || strcmp($field, "UsrPassword") == 0) {
                } else {
                    echo "<td class='$field'>" . $value . "</td>";
                }
            }

            echo "<td><form action=\"editUser.php?user=" . array_values($row)[0] . "\" method=\"post\">
                                <input type=\"submit\" class=\"editUserBtn\"name=\"editUser\" value=\"Edit\"></form></td>";
                                
            echo "<td><form action=\"databaseFunctions/deleteUser.php?userId=" . array_values($row)[0] . "\" method=\"post\">
                                <input type=\"submit\" class=\"deleteUserBtn\" name=\"deleteUser\" value=\"Delete\" onClick=\"javascript: return confirm('Are you sure you want to delete this user?');\" ></form></td>";

            echo "</tr>";
        }
        ?>
                        </table>
                </div>
            </div>
        </div>


<?php

        $conn->close();

    } else {
        echo "Oops you're not an Admin";
        header("Location: index.php");
        exit;
    }
} else {
    echo "Session Role Not declared";
    header("Location: index.php");
    exit;
}

include "footer.php";
?>