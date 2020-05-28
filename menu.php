<?php
include 'header.php';

require_once 'twigbootstrap.php';
require_once 'phpFunctions/connectToDB.php';
$conn = connectionDb();

if (isset($conn)) {

    $sql = "SELECT * FROM item";
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

    $sql = "SELECT * FROM category";
    $result = $conn->query($sql);

    $categories = array();
    $counter = 0;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $categories[$counter] = $row;
            $counter++;
        }
    }

    $conn->close();

    echo $twig->render('menu.html',
        ['items' => $items, 'categories' => $categories]
    );
} else {
    echo 'ERROR Connecting to DB';
}

include 'footer.php';
?>
