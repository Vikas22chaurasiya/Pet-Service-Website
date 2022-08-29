<?php
//Authorization or access control
//check whether user is logged in or not

if(!isset($_SESSION['user'])) //if user session is not set
{
  //user not logged in
  $_SESSION['no-login-message']="<div class='error text-center'>Please login to access panel<div>";
  header("location:".SITEURL.'admin/login.php');
}



?>