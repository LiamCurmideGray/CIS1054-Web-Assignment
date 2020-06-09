<?php

    include "connectToDB.php";
    session_start();

    $conn = connectionDb();
    $user_id = $_GET['userId'];
    settype($user_id, "integer");

    $sql = "SELECT * FROM favourites WHERE UserId  = $user_id;";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $sqlRemovingFavourites = "DELETE FROM favourites WHERE UserId=$user_id;";
        if (mysqli_query($conn, $sqlRemovingFavourites) === true) {
            $_SESSION['result'] = '<script>alert("All Favourites have been deleted") </script>';
        } else {
            $_SESSION['result'] = '<script>alert("Error Occured trying to delete favourites") </script>';

        }
    } else {
        $_SESSION['result'] = '<script>alert("No Records of Favourites were found") </script>';
    }

    $sql = "SELECT * FROM userroles WHERE UserId  = $user_id;";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $sqlRemovingUserRoles = "DELETE FROM userroles WHERE UserId=$user_id;";
        if (mysqli_query($conn, $sqlRemovingUserRoles) === true) {
            $_SESSION['result'] = '<script>alert("Deleted Role of User") </script>';
        } else {
            $_SESSION['result'] = '<script>alert("There was an error trying to delete User Role") </script>';
        }
    } else {
        $_SESSION['result'] = '<script>alert("User never had Role declared") </script>';
    }

    $sql = "SELECT * FROM user WHERE UserId  = $user_id;";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $sqlRemoveUser = "DELETE FROM user WHERE UserId=$user_id;";
        if (mysqli_query($conn, $sqlRemoveUser) === true) {
            $_SESSION['result'] = '<script>alert("User deleted successfully!") </script>';
        } else {
            $_SESSION['result'] = '<script>alert("There was an error trying to delete user") </script>';
        }
    } else {
        $_SESSION['result'] = '<script>alert("No User record exists") </script>';
    }

    header("Location: ../adminPage.php");
    exit;

?>
