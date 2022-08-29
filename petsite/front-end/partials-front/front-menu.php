<?php 
ob_start();
include('../config/constants.php');

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Your Pets Care</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
     <link rel="stylesheet" href="css/styles.css"> 
     <link rel="stylesheet" href="css/style2.css"> 
     <script src="https://kit.fontawesome.com/1642e8d77f.js" crossorigin="anonymous"></script>
  </head>
<body>

  <header>
    <nav id="header-nav" class="navbar navbar-default">
     <div class="container">
       <div class="navbar-header">
        <a href="<?php SITEURL;?>homepage.php" class="pull-left visible-md visible-lg visible-sm">
          <div id="logo-img" alt="Logo-image">
          </div>
        </a>
        <div class="navbar-brand">
          <a href="homepage.php"><h1> Your Pet's Care</h1></a>
          <p>
          <!-- <img src="image/Canine-Care-Certified-logo.jpg" alt=""> -->
          <span>canine Certified</span>
        </p>
        </div>

        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapsable-nav" aria-expanded="false">
          <span class=sr-only>Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
    </div>
    
     <div id="collapsable-nav" class="collapse navbar-collapse">

    

      <ul id="nav-list" class="nav navbar-nav navbar-right">

          

        <li>
          <a href="<?php echo SITEURL;?>front-end/homepage.php">
          <span class="glyphicon glyphicon-home"></span><br class="hidden-xs hidden-md hidden-lg">Home</a></li>
       <li>
  
       <li>
         <a href="<?php echo SITEURL;?>front-end/foodcategory.php">
           <span class="glyphicon glyphicon-info-sign"></span><br class="hidden-xs hidden-md hidden-lg">categories</a>
       </li>


       <?php

       if(isset($_SESSION['c-user']))
       {

        ?>
          <li>
         <a href="<?php echo SITEURL;?>front-end/shopping_list.php?customer_username=<?php echo $_SESSION['c-user'];?>">
           <span class="glyphicon glyphicon-shopping-cart"></span><br class="hidden-xs hidden-md hidden-lg">Cart</a>
       </li>
       <?php

       }
       
       ?>


        <?php


       if(!isset($_SESSION['c-user']))

       {
         ?>

       <li><a href="<?php echo SITEURL;?>front-end/customer_signup.php"><span class="glyphicon glyphicon-user"></span><br class="hidden-xs hidden-md hidden-lg">Sign Up </a></li>
       <?php
       }
      ?>
      
       <li>
    
        <?php
        if(isset($_SESSION['c-user']))
        {
        ?>
           <a href="<?php echo SITEURL;?>front-end/customer_logout.php"><span class="glyphicon glyphicon-log-out"></span>
           </span><br class="hidden-xs hidden-md hidden-lg"><?php echo $_SESSION['c-user']; ?></a>
        <?php
        } 
        else{
        ?>
        <a href="<?php echo SITEURL;?>front-end/customer_login.php"><span class="glyphicon glyphicon-log-in">
      </span><br class="hidden-xs hidden-md hidden-lg"> Login</a>
      <?php 
        }
        ?>
       </li>
         
       

   
        
           
    </ul>


    <ul id="search_li" class="nav navbar-nav navbar-right">

<li class="searchbar">
  <div>
  <form action="<?php echo SITEURL;?>front-end/food-search.php" method="POST">
  <div class="form-size">
   <input type="text" name="search" placeholder="Search" class="form-bar" required>
   <input type="submit" name="submit" value="search" class="btn btn-primary">
  </div>
  </form>
  </div>

</li>
    </ul>
     
   

     

     


   </div>
       </div>


    </nav>
  </header> 


  
