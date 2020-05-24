<?php
session_start();

if (empty($_SESSION['userID'])) {
    $_SESSION['isLogged'] = false;
} 
?>

<!DOCTYPE html>

<html>
  <head>
    <!-- Meta data - To make page adaptable according to screen size per device -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="stylesheets\genStyles.css">
    <link rel="stylesheet" href="stylesheets\indexStyles.css">
    <link rel="stylesheet" href="stylesheets\aboutStyles.css">
    <link rel="stylesheet" href="stylesheets\contactStyles.css">
    <link rel="stylesheet" href="stylesheets\loginStyles.css">
    <link rel="stylesheet" href="stylesheets\registerStyles.css">
    <link rel="stylesheet" href="stylesheets\userAccountStyles.css">



  </head>

  <body>

  <div class="topnav">
      <a href="index.php">Home</a>
      <a href="about.php">About</a>
      <a href="menu">Menu</a>
      <a href="contact">Contact</a>
      <a href="#favourites">Favourites</a>
      <?php
      if($_SESSION['isLogged']){
      ?>
       <a href="userAccount.php">User Account</a>
      <?php
      }else{
      ?>
      <a href="login.php">Login</a>
      <?php
      }
      ?>
    </div>
