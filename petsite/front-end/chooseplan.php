<?php
include('../config/constants.php');

if(isset($_GET['plan']))
{
    $plan = $_GET['plan'];
    $price = $_GET['price'];

    if(isset($_SESSION['c-user']))
{

    $username = $_SESSION['c-user'];
$sql2 = "SELECT * FROM customer WHERE username ='$username'
";

  $res2 = mysqli_query($conn,$sql2);

   $count = mysqli_num_rows($res2);

   if($count==1)
   {
    $row2 = mysqli_fetch_assoc($res2);

       $fullname =$row2['full_name'];
       $phone=$row2['contact_no'];
       $email_id=$row2['email'];
       $addrs = $row2['address'];
  }


  /***inserting in cart table */
  $order_date = date("y-m-d h:i:sa");
  $total = $price;
  $status ='ordered';

  $sql3 = "INSERT INTO cart SET
 item ='$plan',
 price=$price,
 quantity=1,
 total=$total,
 order_date='$order_date',
 status = '$status',
 customer_name='$fullname',
 customer_contact='$phone',
 customer_email = '$email_id',
 customer_address='$addrs',
 customer_username='$username'
 ";

   $res3=mysqli_query($conn,$sql3);

   if($res3)
   {
       $_SESSION['plan-order']="<div class='text-center'>Plan ordered successfully</div>";
       header('location:'.SITEURL.'front-end/homepage.php');  
   }

}
   
}
else
{
    $_SESSION['plan-order']="<div class='text-center'>Plan order failed</div>";
    header('location:'.SITEURL.'front-end/homepage.php');  
}


?>