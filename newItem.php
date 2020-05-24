<?php
include 'header.php';

session_start();

if ($_SESSION['result']) {
    echo $_SESSION['result'];
    $_SESSION['result'] = null;
}

require_once 'phpFunctions/connectToDB.php';
$conn = connectionDb();
$sql = "SELECT * FROM category";
$result = $conn->query($sql);

$categories = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $categories[$row['CategoryId']] = $row['CategoryName'];
    }
}
?>


<link rel="stylesheet" href="stylesheets\registerStyle.css">

<form action="phpFunctions/addNewItemToDb.php" method="POST" enctype="multipart/form-data">
    <div class="container">
      <h1> New Dish </h1>
      <p> Fill in form to add New Dish to the Database. </p>

    <hr>

    <label> Item Name </label>
    <input type="text" placeholder="Item Name" name="itemname" required>

    <label>Select Image File: </label>
    <input type="file" name="image">

</br></br>

    <label> Category </label>
    <select name="categoryid">
      <option value="" > -- Select -- </option>
        <?php
foreach ($categories as $categoryId => $categoryName) {
    echo "<option value=" . $categoryId . "> $categoryName </option>";
}
?>
    </select>

</br></br>

    <label> Price </label>
    <input type="number" placeholder="0.00" name="price" required min="0" step="0.01">

    <label> Description </label>
</br>
    <textarea class="input" name="description" placeholder="Enter message..." required></textarea>

    <hr>

    <button type="submit" class="registerbtn">Add New Item </button>

</div>
</form>
<?php
include 'footer.php';
?>