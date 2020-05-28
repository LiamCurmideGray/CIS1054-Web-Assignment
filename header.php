<?php
session_start();

if (empty($_SESSION['userID'])) {
    $_SESSION['isLogged'] = false;
    // $_SESSION['isError'] = false;
}
?>

<!DOCTYPE html>

<html>
  <head>
    <!-- Meta data - To make page adaptable according to screen size per device -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="stylesheets\genStyles.css">

  <?php

include 'phpFunctions/stylesFunctions.php';

$URL = "$_SERVER[REQUEST_URI]";
echo getStylesheet($URL);

?>

  </head>

  <body>

  <div class="topnav">
      <a href="index.php">Home</a>
      <a href="about.php">About</a>
      <a href="menu.php">Menu</a>
      <a href="contact.php">Contact</a>
      <?php
if ($_SESSION['isLogged']) {
    ?>
       <a href="favourites.php">Favourites</a>
       <a href="userAccount.php">User Account</a>
      <?php
} else {
    ?>
      <a href="login.php">Login</a>
      <?php
}
?>
    </div>
    </br>
