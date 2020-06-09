<?php
include 'header.php';

$userId = $_SESSION['userID'];

require_once 'twigTemplates/twigbootstrap.php';
require_once 'databaseFunctions/connectToDB.php';
$conn = connectionDb();


if(isset($_POST['favourites'])){
        include 'databaseFunctions/favouritesFunctions.php';
        $itemId = $_GET['item'];
        deleteFavourite($itemId,$_SESSION['userID']);
        $_POST['favourites'] = null;
    
}


if (isset($conn)) {

    $sql = "SELECT * FROM favourites WHERE UserId  = '$userId'";
    $result = $conn->query($sql);

    $items = array();
    $counter = 0;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $itemId = $row['ItemId'];
            $sqlItems = "SELECT * FROM item WHERE ItemId  = '$itemId'";
            $resultItems = $conn->query($sqlItems);

            if ($resultItems->num_rows > 0) {
                while ($rowItem = $resultItems->fetch_assoc()) {
                    $image = base64_encode($rowItem['ItemImage']);
                    $items[$counter] = array('ItemId' => $rowItem['ItemId'], 'ItemName' => $rowItem['ItemName'],
                        'ItemImage' => $image, 'CategoryId' => $rowItem['CategoryId']);
                }
            }
            $counter++;
        }
    }
    $conn->close();

    echo $twig->render('favourites.html',
        ['items' => $items , 'userId' => $userId]);
       
} else {
        echo 'ERROR Connecting to DB';
}


include 'footer.php';
