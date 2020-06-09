<?php

include 'header.php';

require_once 'twigTemplates/twigbootstrap.php';
require_once 'databaseFunctions/connectToDB.php';
$conn = connectionDb();

$itemId = $_GET['item'];

if(isset($_POST['addfavourites'])){
    if(isset($_SESSION['userID'])) {
        include 'databaseFunctions/favouritesFunctions.php';
        addToFavourites($itemId,$_SESSION['userID']);
        $_POST['favourites'] = null;
    }  
}




if (isset($conn)) {

    $sql = "SELECT * FROM item WHERE ItemId=$itemId";
    $result = $conn->query($sql);

    $items = array();
    $counter = 0;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $image = base64_encode($row['ItemImage']);
            $items[$counter] = array('ItemId' => $row['ItemId'], 'ItemName' => $row['ItemName'],
                'ItemImage' => $image, 'CategoryId' => $row['CategoryId']);
            $counter++;
        }
    }

    $sql = "SELECT * FROM itemdetails WHERE ItemId=$itemId";
    $result = $conn->query($sql);

    $itemDetails = array();
    $counter = 0;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $itemDetails[$counter] = $row;
            $counter++;
        }
    }

    $conn->close();

    // Condition to check if a User is not logged in
    if(!isset($_SESSION['userID'])) {
        $_SESSION['userID'] = null;
    }

    echo $twig->render('itemDetails.html',
        ['items' => $items, 'itemDetails' => $itemDetails, 'user' =>$_SESSION['userID']]
    );
} else {
    echo 'ERROR Connecting to DB';
}




include 'footer.php';
?>