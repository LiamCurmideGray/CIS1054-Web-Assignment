<?php
session_start();

$itemname = $_POST['itemname'];
$image = $_FILES["image"]["name"];
$categoryid = $_POST['categoryid'];
$price = $_POST['price'];
$description = $_POST['description'];

if (!empty($itemname) && !empty($image) && !empty($categoryid) && !empty($price) && !empty($description)) {
    require_once 'connectToDB.php';

    $conn = connectionDb();

    if (isset($conn)) {

        $fileName = basename($image);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        echo $image . "<br>";

        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
        if (in_array($fileType, $allowTypes)) {

            $images = $_FILES['image']['tmp_name'];
            $imgContent = addslashes(file_get_contents($images));

            $INSERT = $conn->query("INSERT into item (ItemName,ItemImage,CategoryId) VALUES ('$itemname' , '$imgContent' , '$categoryid')");

            if ($INSERT) {
                // echo "Added New Item to Database";

                $sql = "SELECT * FROM item ";
                $result = $conn->query($sql);
                $itemId = "";
                while ($row = $result->fetch_assoc()) {
                    $itemId = $row['ItemId'];
                }

                $INSERT = $conn->query("INSERT into itemdetails (ItemId, Price, Description) VALUES ('$itemId', '$price' , '$description')");

                if ($INSERT) {

                    $_SESSION['result'] = '<script> alert("Successfully Added to Database") </script>';
                } else {
                    $_SESSION['result'] = '<script> alert("There was an error while uploading Item Details") </script>';
                }
            } else {
                $_SESSION['result'] = '<script> alert("There was an error while uploading Items") </script>';
            }

        } else {
            $_SESSION['result'] = '<script> alert("Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.") </script>';
        }
    }

} else {
    $_SESSION['result'] = '<script> alert("All fields are required") </script>';
}

header('Location: ../newItem.php');
exit;
