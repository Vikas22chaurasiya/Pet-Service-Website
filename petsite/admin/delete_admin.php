
<?php

//include constant.php file here for $conn
include('../config/constants.php');

//1. get id of admin to be deleted
 $id = $_GET['id'];

//2.create sql query to delete admin

$sql ="DELETE FROM admin WHERE id=$id";

//3.redirect to admin page with message sucess or error
$res = mysqli_query($conn,$sql);

//check whether query executed successfully or not

if($res==true)
{
 //echo "Admin deleted";
 $_SESSION['delete'] = "<div class='success' style='color: #2ed573;'>Admin Deleted Successfully.</div>";    //session hold info till browser is not refreshed.
 header('location:'.SITEURL.'admin/manage_admin.php');   //takes back to specified page.

}
else{
   // echo " failed to delete deleted";
   $_SESSION['delete'] = "<div class='error' style='color: #ff4757;'>Failed to delete admin.tryAgain later.</div>"; 
   header('location:'.SITEURL.'admin/manage_admin.php');
}
?>