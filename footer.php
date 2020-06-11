<!DOCTYPE HTML>
<html>

<head>
    <script src="jsScripts\index_script.js"></script>
    <script src="jsScripts\userAccounts.js"></script>
    <link rel="stylesheet" href="stylesheets\genStyles.css">
</head>

</body>

<footer>
    <br>
    <div class="line"></div>

    <p class="footerText"> Chumm Buket&trade; </p>
    <p class="address">123, Underwater Street, Bikkini Bottom</p>
    <p class="openingHours"> Monday - Sunday: 9:00am - 10:00pm</p>


</footer>

</html>

<?php

if (isset($_SESSION['result'])) {
    usleep(200000);
    echo $_SESSION['result'];
    $_SESSION['result'] = NULL;
}

?>