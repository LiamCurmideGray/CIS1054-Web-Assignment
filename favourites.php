<?php
include 'header.php';

$userId = $_SESSION['userID'];
$output = $_SESSION['result'];

require_once 'twigbootstrap.php';
require_once 'phpFunctions/connectToDB.php';
$conn = connectionDb();


if(isset($_POST['favourites'])){
        include 'phpFunctions/favouritesFunctions.php';
        $itemId = $_GET['item'];
        deleteFavourite($itemId,$_SESSION['userID']);
        $_POST['favourites'] = null;
    
}

if (isset($output)) {
        echo $_SESSION['result'];
        echo "OK THALT";
        $_SESSION['result'] = NULL;
    } else {
        echo "WTF??";
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
