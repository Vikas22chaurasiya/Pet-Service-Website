<?php
//include constant files
include('../config/constants.php');

 //check whether the id and image_name is set or not,to prevent getting to this page by hacking.
 if(isset($_GET['id']) AND isset($_GET['image_name']))
 {
     //get the values and delete.
     $id = $_GET['id'];
     $image_name=$_GET['image_name'];

     //remove the physical image file if available then only we will delete data from database.
     if($image_name!="")
     {
         //image is available then remove it.
         $path ="../images/category/".$image_name;

         //remove image .reomve is boolean
         $remove = unlink($path);


           //if failed to remove image then add error msg and stop the process
         if($remove==false)
         {
            //set the session msg
            $_SESSION['remove']="<div class='error'>Failed to remove image</div>";
            //redirect to manage category page
            header('location:'.SITEURL.'admin/manage_category.php');
        
            //stop the process
            die();

         }
     }

     //sql query to delet data from database
     $sql = "DELETE FROM category WHERE id=$id";

     //execute the query
     $res = mysqli_query($conn,$sql);

     //chwck whether the data is deleted from database or not
     if($res==true)
     {
         //set success msg
         $_SESSION['delete']="<div class='success'>category deleted successfully</div>";
         header('location:'.SITEURL.'admin/manage_category.php');
     }

     else{
         //set failed msg
         $_SESSION['delete']="<div class='error'>Failed to delete category</div>";
         header('location:'.SITEURL.'admin/manage_category.php');
     }
 }
 else{
     //redirect to manage category page
     header('location:'.SITEURL.'admin/manage_category.php');
 }

?>