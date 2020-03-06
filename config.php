<?php

$dbhost=”localhost”; //replace with your hostname

$dbuser = “root”; //replace with your admin username

$dbpass = “password”; //password of your admin

$dbname = “database_name”;

$con = myslqi_connect($dbhost, $dbuser, $dbpass);

if($con){

$db = mysqli_select_db($dbname);

if(!$db){

echo "Could not connect to database".mysqli_error($con);

}

}

else{

echo "Could not connect to server";

}

?>