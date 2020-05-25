<?php
include 'header.php';
require 'phpFunctions/userAccFunctions.php';
?>
<div class="usrAcc">
    <h1 class="userHead1">User Account</h1>
    <!-- <div class = "usrAccContainer"> -->
        <form class = "usrAccContainer" action="phpFunctions/userAccFunctions.php" method="POST">
            <input id="chngEmailbtn" class="usrAccBtn" name="chngEmail" type="button" onclick="openForm(name)" value="Change Email"/>
            <input class="usrAccBtn" name="chngName" type="button" onclick="openForm(name)" value="Change Name"/>
            <input class="usrAccBtn" name="chngTelNum" type="button" onclick="openForm(name)" value="Change Tel. Number"/>
            <input class="usrAccBtn" name="chngPswd" type="button" onclick="openForm(name)" value="Change Password"/>
            <input class="usrAccBtn" name="delAcc" type="submit" onclick="" value="Delete Account"/>
            <input class="usrAccBtn" name="logout" type="submit" value="Logout"/>
        </form>
    <!-- </div> -->
</div>

<div id="emailPopup" class="popup">
    <form action="phpFunctions/userAccFunctions.php" class="chgForm" method="POST">
        <h1>Change Email</h1>
        <label for="email"><b>Email</b></label>
        <input class="chngText" type="text" placeholder="Enter Email" name="email" required>
        <br>
        <button type="submit" class="chgBtn" name="chgEmail" onclick="">Change</button>
        <button type="button" class="chgBtn" name="chngEmail" class="btn cancel" onclick="closeForm(name)">Close</button>

    </form>
    <br>
</div>

<div id="namePopup" class="popup">
    <form action="phpFunctions/userAccFunctions.php" class="chgForm" method="POST">
        <h1>Change Name</h1>
        <label for="fName"><b>First Name</b></label>
        <input class="chngText" type="text" placeholder="Enter First Name" name="fName" required>
        <br>
        <label for="sName"><b>Second Name</b></label>
        <input class="chngText" type="text" placeholder="Enter Second Name" name="sName" required>
        <br>
        <button type="submit" class="chgBtn" name="chgName" onclick="">Change</button>
        <button type="button" class="chgBtn" name="chngName" class="btn cancel" onclick="closeForm(name)">Close</button>
        <br>
    </form>
</div>

<div id="telNumPopup" class="popup">
    <form action="phpFunctions/userAccFunctions.php" class="chgForm" method="POST">
        <h1>Change Tel. Number</h1>
        <label for="telNum"><b>Tel Num</b></label>
        <input class="chngText" type="text" placeholder="Enter Tel. Number" name="telNum" required>
        <br>
        <button type="submit" class="chgBtn" name="chgTelNum" onclick="">Change</button>
        <button type="button" class="chgBtn" name="chngTelNum" class="btn cancel" onclick="closeForm(name)">Close</button>
        <br>
    </form>
</div>

<div id="pswdPopup" class="popup">
    <form action="phpFunctions/userAccFunctions.php" class="chgForm" method="POST">
        <h1>Change Password</h1>
        <label for="pswd"><b>Password</b></label>
        <input class="chngText" type="text" placeholder="Enter Password" name="pswd" required>
        <label for="pswdRep"><b>Repeat Password</b></label>
        <input class="chngText" type="text" placeholder="Repeat New Password" name="pswdRep" required>
        <br>
        <button type="submit" class="chgBtn" name="chgPswd" onclick="">Change</button>
        <button type="button" class="chgBtn" name="chngPswd" class="btn cancel" onclick="closeForm(name)">Close</button>
        <br>
    </form>
</div>

<?php
if (isset($_SESSION['isError'])) {
    if ($_SESSION['isError']) {
        $opacity = 1;
    } else {
        $opacity = 0;
    }
} else {
    $opacity = 0;
}
?>
 <p id = "error" style = "opacity:<?php echo $opacity ?>;">Invalid Change!</p>

<?php
include 'footer.php';
?>