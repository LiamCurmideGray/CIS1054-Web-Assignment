<?php
include "header.php";
?>

<div class = "login">
    <h1>Login</h1>
    <form action="phpFunctions/loginUser.php" method="POST" >
        <div class = "formInput">
            <p>Email</p>
            <input type="text" name="Email" placeholder="Enter Email"/>
        </div>
        <div class = "formInput">
            <p>Password</p>
            <input type="text" name="UsrPassword" placeholder="Enter Password"/>
        </div>
        <input type="submit" name="submit" value="LOGIN" class="btn-login"/>
    </form>

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

    <p id = "error" style = "opacity:<?php echo $opacity ?>;">Email/Password incorrect!</p>



    <p>Don't have an account?</p>
    <a href="register.php">Sign up!</a>



</div>
<?php
include "footer.php";
?>