<?php

// start session 
session_start();

//create constants to store non repeating values
define('SITEURL','http://localhost/petsite/');
define('LOCALHOST','localhost');  //constants are in big letters
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','pet-order');

 
 $conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error($conn)); //database connection,can pass database name here too beside root.then next line will be uselesss
 $db_select = mysqli_select_db($conn,DB_NAME) or die(mysqli_error($conn));
  


?>