<?php
include "header.php";

if (isset($_SESSION['roleId'])) {

    if ($_SESSION['roleId'] == 1) {

        ?>

<script language="Javascript">
    function hideUsers(x) {
        if (x.checked) {
            document.getElementById("users").style.visibility = "hidden";
            document.getElementById("dishes").style.visibility = "visible";
        }
    }

    function hideDishes(x) {
        if (x.checked) {
            document.getElementById("dishes").style.visibility = "hidden";
            document.getElementById("users").style.visibility = "visible";
        }
    }
</script>

<div class="adminPage">
    <div class="header">
    <h1 class="adminPageTitle">Admin Page</h1>
    <label> View Users
    <input type="radio" name="selection" onchange="hideDishes(this)" checked>
    </label> |

    <label class="queryLabel">
    <input type="radio" name="selection" onchange="hideUsers(this)">
    View Dishes</label>
    </div>

<div class="useritemtable">
    <div id="users">
            <br>
        <?php

        include "databaseFunctions/connectToDB.php";
        $conn = connectionDb();
        $sql = "SELECT * FROM user;";
        $result = mysqli_query($conn, $sql);

        ?>

       <div class= "userFormWrapper">
            <div class="userTable">
                <input id="collapsible" class="toggle" type="checkbox" checked>
                <label for="collapsible" class="lbl-toggle"></label>
                <div class="collapsible-content">
                        <table>
                            <th style="text-align: center;">Email</th>
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
        </div>


        <div id="dishes" style="visibility:hidden">
        </br>
        <?php

        $sqlItem = "SELECT * FROM item";
        $resultItem = mysqli_query($conn, $sqlItem);

        ?>
            <div class="dishFormWrapper">
            <form action="newItem.php" method="post">
                <input type="submit" class="addNewItem"name="editUser" value="Add New Dish">
            </form>

            <div class="itemTable">
                <input id="collapsible" class="toggle" type="checkbox" checked>
                <label for="collapsible" class="lbl-toggle"></label>
                <div class="collapsible-content">
                        <table>
                           <th style="text-align: center;">Item Name</th>
                            <th style="text-align: center;">Price</th>
                            <th style="text-align: center;">Description</th>
                            <th style="text-align: center;">Category</th>
                            <th style="text-align: center;">Edit</th>
                            <th style="text-align: center;">Delete</th>
<?php

        while ($row = mysqli_fetch_assoc($resultItem)) {
            echo "<tr>";
            echo "<td class='ItemName'>" . $row['ItemName'] . "</td>";
            foreach ($row as $key => $value) {

                if (strcmp($key, "ItemId") == 0) {
                    $sqlItemDetails = "SELECT * FROM itemdetails WHERE ItemId=$value";
                    $resultItemDetails = mysqli_query($conn, $sqlItemDetails);
                    while ($rowItemDetails = mysqli_fetch_assoc($resultItemDetails)) {
                        foreach ($rowItemDetails as $key => $value) {
                            if (strcmp($key, "ItemId") == 0) {
                            } else if (strcmp($key, "Price") == 0) {
                                echo "<td class='$key'>€" . $value . "</td>";
                            } else {
                                echo "<td class='$key'>" . $value . "</td>";
                            }
                        }

                    }
                }

                if (strcmp($key, "CategoryId") == 0) {
                    $sqlCategory = "SELECT * FROM category WHERE CategoryId=$value";
                    $resultCategory = mysqli_query($conn, $sqlCategory);
                    while ($rowCategory = mysqli_fetch_assoc($resultCategory)) {
                        foreach ($rowCategory as $key => $value) {
                            if (strcmp($key, "CategoryName") == 0) {
                                echo "<td class='$key'>" . $value . "</td>";
                            }
                        }

                    }

                }

            }

            echo "<td><form action=\"editItem.php?itemid=" . array_values($row)[0] . "\" method=\"post\">
                                <input type=\"submit\" class=\"editUserBtn\"name=\"editItem\" value=\"Edit\"></form></td>";

            echo "<td><form action=\"databaseFunctions/deleteItem.php?itemid=" . array_values($row)[0] . "\" method=\"post\">
                                <input type=\"submit\" class=\"deleteUserBtn\" name=\"deleteUser\" value=\"Delete\" onClick=\"javascript: return confirm('Are you sure you want to delete this item?');\" ></form></td>";

            echo "</tr>";
        }

        ?>
                        </table>
                    </div>
                </div>


            </div>
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