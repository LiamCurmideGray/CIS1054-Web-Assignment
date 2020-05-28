<?php


function addToFavourites($itemId, $userId){

    // echo '<script>alert("UMM HELLOO? '.$itemId.' '.$userId.'") </script>';

    require_once 'phpFunctions/connectToDB.php';
    $conn = connectionDb();

    settype($itemId, "integer");

    $sql = "SELECT * FROM favourites WHERE UserId  = '$userId' AND ItemId = '$itemId'";
    $result = $conn->query($sql);

    if($result->num_rows <= 0) {
        $INSERT = "INSERT INTO favourites (UserId, ItemId) values (?,?)";
        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param('ii', $userId, $itemId);
        $stmt->execute();
    
        $stmt->close;
        $conn->close;
    
        $_SESSION['result'] = '<script>alert("Dish Added to Favourites") </script>';
        header('Location: /CIS1054-Web-Assignment/itemDetails.php?item='.$itemId);
        exit;
    
    } else {
        $_SESSION['result'] = '<script>alert("You already have this on your favourites") </script>';
        header('Location: /CIS1054-Web-Assignment/itemDetails.php?item='.$itemId);
        exit;
       
    }   
}

function deleteFavourite($itemId, $userId) {

    require_once 'phpFunctions/connectToDB.php';
    $conn = connectionDb();

    settype($itemId, "integer");

    $sql = "DELETE FROM favourites WHERE UserId  = '$userId' AND ItemId = '$itemId'";
    if($conn->query($sql) === TRUE) {
           echo '<script>alert("Favourite Item has been Removed") </script>';
    } else {
        echo '<script>alert("There was an Error trying to delete favourite") </script>';

    }
    
    $conn->close();


    // $_SESSION['result'] = '<script>alert("Removing Favourite Item Id:" '.$itemId.' ") </script>';
    // header('Location: /CIS1054-Web-Assignment/favourites.php');
    // exit;
}


?>