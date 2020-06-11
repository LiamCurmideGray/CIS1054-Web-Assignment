<?php

    include "connectToDB.php";
    session_start();

    $conn = connectionDb();
    $item_id = $_GET['itemid'];
    settype($item_id, "integer");

    $sql = "SELECT * FROM favourites WHERE ItemId  = $item_id;";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $sqlRemovingFavourites = "DELETE FROM favourites WHERE ItemId=$item_id;";
        if (mysqli_query($conn, $sqlRemovingFavourites) === true) {
            $_SESSION['result'] = '<script>alert("All Favourites have been deleted") </script>';
        } else {
            $_SESSION['result'] = '<script>alert("Error Occured trying to delete favourites") </script>';

        }
    } else {
        $_SESSION['result'] = '<script>alert("No Records of Favourites were found") </script>';
    }

    $sql = "SELECT * FROM itemdetails WHERE ItemId  = $item_id;";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $sqlRemovingItemDetails = "DELETE FROM itemdetails WHERE ItemId=$item_id;";
        if (mysqli_query($conn, $sqlRemovingItemDetails) === true) {
            $_SESSION['result'] = '<script>alert("Deleted Details of Item") </script>';
        } else {
            $_SESSION['result'] = '<script>alert("There was an error trying to delete Item Details") </script>';
        }
    } else {
        $_SESSION['result'] = '<script>alert("Item never had their Details declared") </script>';
    }

    $sql = "SELECT * FROM item WHERE ItemId  = $item_id;";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $sqlRemoveItem = "DELETE FROM item WHERE ItemId=$item_id;";
        if (mysqli_query($conn, $sqlRemoveItem) === true) {
            $_SESSION['result'] = '<script>alert("Item deleted successfully!") </script>';
        } else {
            $_SESSION['result'] = '<script>alert("There was an error trying to delete item") </script>';
        }
    } else {
        $_SESSION['result'] = '<script>alert("No Item record exists") </script>';
    }

    header("Location: ../adminPage.php");
    exit;

?>
