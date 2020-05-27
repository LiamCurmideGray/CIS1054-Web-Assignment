<?php
function addToFavourites($itemId, $userId){

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
        $_SESSION['result'] = '<script>alert("Dish is already in your Favourites!") </script>';
        header('Location: /CIS1054-Web-Assignment/itemDetails.php?item='.$itemId);
        exit;
    }

    
}


?>