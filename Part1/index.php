<?php
session_start();
$_SESSION['entryTime'] = NULL;

if (empty($_GET['date'])) {
    $_SESSION["entryTime"] = strtotime("now");
} else {
    $_SESSION['entryTime'] = $_GET['date'];
}

?>

<!DOCTYPE html>
<html>

<head>
<script type="text/javascript">

var phpvalue = <?php echo $_SESSION["entryTime"]; ?>

function Update() {
    var num = Math.round(new Date().getTime()/1000);
    var total = num - phpvalue;

    document.getElementById("demo").innerHTML = "Time Elapsed "+ total + " seconds";
}
</script>

</head>
<body>

<p id="demo">  </p>
<button type="button" onclick="Update()">Update Time</button>

<p>
<?php

if(empty($_GET['date'])) {
    $date = $_SESSION['entryTime'];
    $date = date("h:i:sa", $date);
    echo "First Entered the page at: " . $date;
} 

else {
    $date =  $_GET['date'];
    $date = date("h:i:sa", $date);
    echo "Using GET, First Entered the page at: " . $date;
    echo  "</br>";
}

if(!empty($_POST['textInput'])){
    $text = $_POST['textInput'];
    echo "Using POST, text inserted: " , $text;
}
?>
</p>



    <form action="index.php?date=<?php echo $_SESSION['entryTime'] ?>" method="POST">
        <label> Enter Text </label>
        <input type="text" placeholder="Enter Text Here" name="textInput">
        <button type="submit">Submit </button>
    </form>
</body>

</html>