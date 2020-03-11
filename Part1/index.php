<?php
session_start();
$_SESSION["entryTime"] = strtotime("now");
?>

<!DOCTYPE html>
<html>

<head>
<script type="text/javascript">

var phpvalue = <?php echo $_SESSION["entryTime"] ?>;

function Update() {
    var num = Math.round(new Date().getTime()/1000);
    var total = num - phpvalue;

    document.getElementById("demo").innerHTML = "Time Elapsed "+ total + " seconds";
}
</script>

</head>
<body>

<p id="demo">  </p>

<p>
<?php 
echo "First Entered the page at: " . date("h:i:sa");
?>
</p>

<button type="button" onclick="Update()">Update Time 
</button>
</body>

</html>