<?php
include 'header.php';

        if ($_SESSION['result']) {
            echo $_SESSION['result'];
            $_SESSION['result'] = NULL;
        }
?>


<link rel="stylesheet" href="stylesheets\registerStyle.css">

<form action="phpFunctions/addNewUserToDb.php" method="POST">
      <div class="container">
      <h1> Register </h1>
<p> Fill in form to create account. </p>

<hr>

  <label> Email </label>
<input type="email" placeholder="Email Address" name="email" required>

  <label> FirstName </label>
<input type="text" placeholder="First Name" name="firstname" required>

<label> Surname </label>
<input type="text" placeholder="Last Name" name="lastname" required>

<label> Telephone </label>
<input type="number" placeholder="Phone Number" name="telephone" min="20000000" max="99999999" required>

<label> Password </label>
<input type="password" placeholder="Password" name="password" required>

<label> Repeat Password </label>
<input type="password" placeholder="Repeat Password" name="password-repeat" required>

<hr>

<button type="submit" class="registerbtn">Register </button>
    </div>

</form>
<?php
include 'footer.php';
?>