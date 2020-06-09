<?php

$userId = $_GET['userId'];
$emailToSend = $_POST['favouriteEmail'];

require_once '../databaseFunctions/connectToDB.php';
$conn = connectionDb();

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

                $rowItem = $resultItems->fetch_assoc();
                $image = base64_encode($rowItem['ItemImage']);
                $items[$counter] = array('ItemId' => $rowItem['ItemId'], 'ItemName' => $rowItem['ItemName'],
                    'ItemImage' => $image, 'CategoryId' => $rowItem['CategoryId']);

                $sqlItemDetails = "SELECT * FROM itemdetails WHERE ItemId='$itemId'";
                $resultItemDetails = $conn->query($sqlItemDetails);
                if ($resultItemDetails->num_rows > 0) {
                    $rowItemDetails = $resultItemDetails->fetch_assoc();
                    $items[$counter] += array('Price' => $rowItemDetails['Price'], 'Description' => $rowItemDetails['Description']);

                }
            }

            $counter++;
        }
    }

    $sqlSenderEmail = "SELECT Email from user Where UserId = '$userId'";
    $resultUser = $conn->query($sqlSenderEmail);

    $rowUser = $resultUser->fetch_assoc();
    $emailSender = $rowUser['Email'];

    $conn->close();

    $length = count($items);

    $msg = "
    <html>
    <head>
    <style>
    
    table {
        border-collapse:collapse;
        width:100%;
        max-width:700px;
        min-width:400px;
        text-align:center;
    }
    
    table,th, td {
        border: 1px solid gray;
    }
    
    th, td {
        height: 24px;
        padding:4px;
        vertical-align:middle;
    }
    
    th {
        background-image:url(table-shaded.png);
    }
    
    .chummPromo {
       font-weight: bold;
        font-family: Arial, Helvetica, sans-serif;
        font-size: 25px
    }
    
     </style>
    <title>Favourite List </title>
    </head>
    <body>
    <p>Dear $emailToSend </p>
    <table>
    <tr>
    <th> Item Name </th>
    <th> Price </th>
    <th> Description </th>
    </tr>";

    for ($i = 0; $i < $length; $i++) {

        $msg .= "<tr>";
        $msg .= "<td>" . $items[$i]['ItemName'] . "</td>";
        $msg .= "<td> €" . $items[$i]['Price'] . "</td>";
        $msg .= "<td>" . $items[$i]['Description'] . "</td>";
        $msg .= "</tr>";

    }
    $msg .= "</table>
            <div class=\"chummPromo\">
            <p> You can find all of these dishes Exclusive at the Chumm Buket! </p>
            </div> 
            <p> Happy Eating!</p>
            <p> From: $emailSender <p>
            </body>
             </html>";

    $to = $emailToSend;
    $subject = "Check out my Favourite Dishes!";
    $headers = "MIME-Version:1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: $emailSender ";
    $headers .= "Reply to: $emailSender";

    // echo $msg;

    if (mail($to, $subject, $msg, $headers)) {
        // echo "<script type='text/javascript'> alert('Favourites Dish has been sent!'); window.location.href = 'http://localhost/CIS1054-Web-Assignment/favourites.php'; </script>";
        $_SESSION['result'] = '<script>alert('."Favourites Dish has been sent!".') </script>';
        header('Location: ../favourites.php');
        exit;
    } else {
        $_SESSION['result'] = '<script>alert("There was an Error Sending email! \r\n Email was not sent!") </script>';
        header('Location: /CIS1054-Web-Assignment/favourites.php');
        exit;
    }

}
