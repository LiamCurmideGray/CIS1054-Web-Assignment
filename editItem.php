<?php

include 'header.php';
include "databaseFunctions/connectToDB.php";

$conn = connectionDb();

if ($_SESSION['roleId'] == 1) {

    $itemId = $_GET['itemid'];

    if (isset($_POST['editItem'])) {

        $sqlItem = "SELECT * FROM item WHERE ItemId=$itemId;";
        $resultItem = mysqli_query($conn, $sqlItem);
        $rowItem = mysqli_fetch_assoc($resultItem);

        $sqlItemDetails = "SELECT * FROM itemdetails WHERE ItemId=$itemId;";
        $resultItemDetails = mysqli_query($conn, $sqlItemDetails);
        $rowItemDetails = mysqli_fetch_assoc($resultItemDetails);

        $sqlCategory = "SELECT * FROM category";
        $resultCategory = $conn->query($sqlCategory);
        $categories = array();
        if ($resultCategory->num_rows > 0) {
            while ($rowCategory = $resultCategory->fetch_assoc()) {
                $categories[$rowCategory['CategoryId']] = $rowCategory['CategoryName'];
            }
        }

        $sqlItemCategory = "SELECT * FROM category WHERE CategoryId =" . array_values($rowItem)[3] . "";
        $resultItemCategory = mysqli_query($conn, $sqlItemCategory);
        $rowItemCategory = mysqli_fetch_assoc($resultItemCategory);

        echo "<form action=\"databaseFunctions/editItemToDb.php\"  method=\"POST\" name=\"updateitem\" enctype=\"multipart/form-data\">";
        ?>

            <div class="container">
                <h1> Edit </h1>
                <p> Fill in form to update a Dish. </p>

                <hr>

                <input type="hidden"  value="<?php echo array_values($rowItem)[0]; ?>" name="itemId" required readonly>

                <label> Item Name </label>
                <input type="text" value="<?php echo array_values($rowItem)[1]; ?>" name="editItemName" required>

                <label>Current Image</label>
                <div class="menuItem-Image"> 
                    <?php $image = base64_encode(array_values($rowItem)[2]);?>
                    <img class="menuItem-Image" name="editImage" src="data:image/jpg;charset=utf8;base64,<?php echo $image ?>"/>
                </div> 

                </br>

                <label>Update Image File: </label>
                <input type="file" name="image">

                    </br></br>

                <label> Category </label>
                    <select name="categoryid">
                    <option value="<?php echo array_values($rowItemCategory)[0]; ?> " ><?php echo array_values($rowItemCategory)[1]; ?> </option>
                        <?php
                            foreach ($categories as $categoryId => $categoryName) {
                                if($categoryId != array_values($rowItemCategory)[0]){
                             echo "<option value=" . $categoryId . "> $categoryName </option>";
                            }
                        }
                      ?>
                    </select>

                    </br></br>

                <label> Price €</label>
                <input type="number" value="<?php echo array_values($rowItemDetails)[1]; ?>" name="editPrice" min="0" step="0.01"required>

                <label> Description </label>
                </br>
                <textarea class="description" name="editDescription" required><?php echo array_values($rowItemDetails)[2]; ?></textarea>

             <hr>

                <button type="submit" class="editbtn">Update </button>
            </div>

        </form>

<?php
}
}

include 'footer.php';

?>
