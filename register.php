<?php
include 'header.php';

session_start();

if($_SESSION['result']) {
  echo $_SESSION['result'];
}
?>

<style> 
* {box-sizing: border-box}

/* Add padding to containers */
.container {
  padding: 16px;
}

h1, p {
        color: white;

}

/* Full-width input fields */
input[type=text], input[type=password], input[type=number] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus, input[type=number]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit/register button */
.registerbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity:1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}

</style>

<?php

  require_once ('utils.php');

?>

<form action="phpFunctions/connection.php" method="POST">
      <div class="container">
      <h1 > Register </h1>
<p> Fill in form to create account. </p>

<hr>

<label> Email </label>
<input type="text" placeholder="Email Address" name="email" required>

<label> FirstName </label>
<input type="text" placeholder="First Name" name="firstname" required>

<label> Surname </label>
<input type="text" placeholder="Last Name" name="lastname" required>

<label> Telephone </label>
<input type="number" placeholder="Phone Number" name="telephone" required>

<label> Password </label>
<input type="password" placeholder="Password" name="password" required>

<label> Repeat Password </label>
<input type="password" placeholder="Repeat Password" name="password-repeat" required>

<hr>

<button type="submit" class="registerbtn">Register </button>
    </div>  

</form>
<!-- call func to add user to db addUser(email, pass, ...) -->
<?php
include 'footer.php';
?>