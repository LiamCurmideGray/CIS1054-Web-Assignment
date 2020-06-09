<script src="jsScripts\index_script.js"></script>
<script src="jsScripts\userAccounts.js"></script>

</body>

<footer> 
<br>
<div class="line"></div>

<p class = "footerText">  Trademark Restaurant </p>



</footer>
</html>

<?php

if (isset($_SESSION['result'])) {
    usleep(200000);
    echo $_SESSION['result'];
    $_SESSION['result'] = NULL;
}

?>