<?php
session_start();
?>

<!DOCTYPE html>
<html>

<script type="text/javascript">

function setSession() {
    var time = GetTime();
    '<%Session["entyTime"] = "'+ time +'"; %>';
    alert('<%Session["entyTime"]%>');
}

function GetTime() {
    var time = new Date();
    return time;
}

function Update() {
    document.getElementById("timeDisplay").innerhtml =
    "Time Elapsed: " + Math.abs(GetTime() = $_SESSION("entrytime"));
}

</script>


<body>

<?php
$_SESSION["entryTime"] = "DIS TIME";

?>

<p id="timeDisplay"> HELLO </p>

<p>
<?php echo $_SESSION["entryTime"]; ?>
</p>

<button type="button" onclick="Update()">
<!-- <button type="button"> -->

Update Time 
</button>
</body>

</html>