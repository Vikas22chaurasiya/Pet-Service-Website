<?php
include('../config/constants.php');
if(isset($_GET['id']) && isset($_GET['image_name']))
{
 //1.get the id and image name
 $id = $_GET['id'];
 $image_name=$_GET['image_name'];
 
 //2.reomive image if available
 if($image_name!="")
 {
     //remove the image
     $path = "../images/food/".$image_name;

     //remove imageb file from folder
     $remove = unlink($path);

     //check if image removed or not
     if($remove==false)
    {
        //failed to delete
        $_SESSION['failed-remove-img']="<div class='error'>Failed to remove the image file</div>";
        header('location:'.SITEURL.'admin/manage_food.php');

        //stop the process if we failed to delete image we dont want to delete info from database
        die();
    }

    }

    //3 delete info from database
    $sql ="DELETE FROM food WHERE id=$id";

    //execute the query
    $res = mysqli_query($conn,$sql);

    //check whether query is executed or not.
    if($res==true)
    {
        //food deleted
        $_SESSION['delete']="<div class='success'>Food deleted successfully</div>";
        header('location:'.SITEURL.'admin/manage_food.php');


    }
    else{
        $_SESSION['delete']="<div class='error'>Failed to delete food</div>";
        header('location:'.SITEURL.'admin/manage_food.php');

    }

 }

else{
    //redirect
    $_SESSION['unauthorized']="<div class='error'>Unauthorized access</div>";
    header('location:'.SITEURL.'admin/manage_food.php');
}

?>