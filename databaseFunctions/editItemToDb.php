<?php
session_start();

$itemId = $_POST['itemId'];
$itemname = $_POST['editItemName'];
$image = $_FILES["image"]["name"];
$categoryid = $_POST['categoryid'];
$price = $_POST['editPrice'];
$description = $_POST['editDescription'];

require_once 'utils.php';
$itemname = trimString($itemname);
$description = trimString($description);


if (!empty($itemId) && !empty($itemname) && !empty($categoryid) && !empty($price) && !empty($description)) {
    require_once 'connectToDB.php';

    $conn = connectionDb();

    if (isset($conn)) {

        $INSERT = NULL;

        if(!empty($image)) {

        $fileName = basename($image);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

       
        $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
            if (in_array($fileType, $allowTypes)) {

                $images = $_FILES['image']['tmp_name'];
                $imgContent = addslashes(file_get_contents($images));
                $INSERT = $conn->query("UPDATE item SET ItemName = '$itemname', ItemImage='$imgContent', CategoryId='$categoryid' WHERE ItemId='$itemId'");

            } else {
                $_SESSION['result'] = '<script> alert("All fields are required") </script>';
            }
        } else {
            $INSERT = $conn->query("UPDATE item SET ItemName = '$itemname', CategoryId='$categoryid' WHERE ItemId='$itemId'");
        }

        
            if ($INSERT) {
                // echo "Added New Item to Database";

                $sql = "SELECT * FROM item ";
                $result = $conn->query($sql);
                $itemId = "";
                while ($row = $result->fetch_assoc()) {
                    $itemId = $row['ItemId'];
                }

                $INSERT = $conn->query("UPDATE itemdetails SET Price='$price', Description='$description' WHERE ItemId='$itemId'");

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



$conn->close();
header('Location: ../adminPage.php');
exit;


?>