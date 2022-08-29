<?php include('../config/constants.php');
include('login_check.php'); 


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pet serivice website</title>
    
    
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <!-- menu section starts -->
       <div class="menu text-center">
           <div class="wrapper">
               <ul>
                   <li><a href="<?php echo SITEURL;?>admin/index.php">home</a> </li>
                   <li><a href="<?php echo SITEURL;?>admin/manage_admin.php">admin</a> </li>
                   <li><a href="<?php echo SITEURL;?>admin/manage_category.php">Category</a> </li>
                   <li><a href="<?php echo SITEURL;?>admin/manage_food.php">food</a> </li>
                   <li><a href="<?php echo SITEURL;?>admin/manage_accessories.php">Accessory</a> </li>
                   <li><a href="<?php echo SITEURL;?>admin/manage_order.php">order</a> </li>
                   <li><a href="<?php echo SITEURL;?>admin/customers.php">customers</a> </li>
                   <li><a href="<?php echo SITEURL;?>admin/logout.php">Logout</a> </li>
                   <li><span class="current-log"><?php echo $_SESSION['user']; ?> </span></li>
               </ul>
        
           </div>
          
       </div>
    <!-- menu section ends -->