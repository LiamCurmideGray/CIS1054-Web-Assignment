<?php


function addToFavourites($itemId, $userId){

    require_once 'connectToDB.php';
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
    
    } else {
        $_SESSION['result'] = '<script>alert("You already have this on your favourites") </script>';
    }   
    header('Location: /CIS1054-Web-Assignment/menu.php');
    exit;
}

function deleteFavourite($itemId, $userId) {

    require_once 'connectToDB.php';
    $conn = connectionDb();

    settype($itemId, "integer");

    $sql = "DELETE FROM favourites WHERE UserId  = '$userId' AND ItemId = '$itemId'";
    if($conn->query($sql) === TRUE) {
        $_SESSION['result'] =  '<script>alert("Favourite Item has been Removed") </script>';
    } else {
        $_SESSION['result'] =  '<script>alert("There was an Error trying to delete favourite") </script>';

    }
    
    $conn->close();

    header('Location: /CIS1054-Web-Assignment/favourites.php');
    exit;
}

?>