<?php
    include "header.php";

    session_start();

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
            <input type="password" name="UsrPassword" placeholder="Enter Password"/>
        </div>
        <input type="submit" name="submit" value="LOGIN" class="btn-login"/>
    </form>

    <p id = "loginError" >Email/Password incorrect!</p>

    <?php
    
    if(isset($_SESSION['result'])) {
        echo $_SESSION['result'];
        $_SESSION['result'] = NULL;
      }

    ?>

    <p>Don't have an account?</p>
    <a href="register.php">Sign up!</a>

  

</div>
<?php
    include "footer.php";
?>