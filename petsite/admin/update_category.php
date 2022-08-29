<?php include('partials/menu.php'); ?>


<div class="main-content"><div class="wrapper">
    <h1>Update category</h1>
    <br><br>

    <?php
     //check whether id is set or not
     if(isset($_GET['id']))
     {
         //get id and all other data.
         $id =$_GET['id'];

         //create sql query to get all data
         $sql = "SELECT * FROM category WHERE id=$id";

         //execute the query
         $res = mysqli_query($conn,$sql);

         //count the rows to check whether data with id exist or not
         $count = mysqli_num_rows($res);

         if($count==1)
         {
             //get all the data
             $row = mysqli_fetch_assoc($res);
             $title = $row['title'];
             $current_image = $row['image_name'];
             $featured = $row['featured'];
             $active = $row['active'];
         }
         else{
             //redirect to manage category
             $_SESSION['no-category-found']="<div class='error'>Category not found</div>";
             header('location:'.SITEURL.'admin/manage_category.php');
         }
     }
     else{  
         //redirect to category manage page
         header('location:'.SITEURL.'admin/manage_category.php');

     }
    
    ?>

    <form action="" method="POST" enctype="multipart/form-data">
    <table class="table-30">
     <tr>
         <td> title:</td>
         <td><input type="text" name="title" value="<?php echo $title;?>"></td>
      </tr>

      <tr>
         <td> current image:</td>
         <td>
             <?php
             if($current_image != "")
             {
                 //display image
                 ?>
                 <img src="<?php echo SITEURL.'images/category/'.$current_image; ?>" width="150px">

                 <?php
             }
             else{
                 //display msg
                 echo "<div class='error'>Image not added</div>";
             }
             
             ?>
         </td>
      </tr>

      <tr>
         <td> new image:</td>
         <td><input type="file" name="image"></td>
      </tr>

      <tr>
         <td>featured : </td>
         <td><input <?php if($featured=="yes"){echo "checked";} ?> type="radio" name="featured" value="yes">yes
         <input <?php if($featured=="no"){echo "checked";} ?> type="radio" name="featured" value="no">no</td>
     </tr>

     <tr>
         <td>active: </td>
         <td><input <?php if($active=="yes"){echo "checked";} ?> type="radio" name="active" value="yes">yes
         <input <?php if($active=="no"){echo "checked";} ?> type="radio" name="active" value="no">no</td>
     </tr>

     <tr>
         <td colspan="2">
             <input type="hidden" name="current_image" value="<?php echo $current_image?>">
             <input type="hidden" name="id" value="<?php echo $id?>">
             <input type="submit" name="submit" value="update category" class="btn-secondary"></input>
         </td>
    </tr>

 </table>
    </form>

    <?php
    if(isset($_POST['submit']))
    {
        //1.get all values from our form
        $title=$_POST['title'];
        $id =$_POST['id'];
        $current_image=$_POST['current_image'];
        $featured = $_POST['featured'];
        $active = $_POST['active'];

        //2.updating new image if selected
        //check if image is selected or not
        if(isset($_FILES['image']['name']))
        {
            //get image details
            $image_name = $_FILES['image']['name'];

            //check whether the image is available  or not
            if($image_name != "")
            {
                //A.upload the new image
                
                // auto rename our image so that it dont get replaced in folder if name is same
                //break name till specified in quotes and end wii give end part of the image name.
                $ext = end(explode('.',$image_name));

                //rename the image
                $image_name = "Food_category_".rand(000,999).'.'.$ext;

                $source_path=$_FILES['image']['tmp_name'];
                $destination_path="../images/category/".$image_name;

                //finally upload the image
                $upload = move_uploaded_file($source_path,$destination_path);

                //check whether the image is uploaded or not.
               //if image is not uploaded then we will stop the process and redirect with error msg
                if($upload==false)
                {
                    $_SESSION['upload']="<div class='error'>Failed to upload image</div>";
                    header('location:'.SITEURL.'admin/add_category.php');

                    //stop the process if we failed to upload image.
                    die();
                }

                //B .remove the current image if avaiable
                if($current_image!="")
                {
                $remove_path = "../images/category/".$current_image;
                $remove = unlink($remove_path);

                //check whether image is removed or not
                //if failed to remove image display msg and stop the process
                if($remove==false)
                {
                    $_SESSION['failed-remove']="<div class='error'>Failed to remove image</div>";
                    header('location:'.SITEURL.'admin/manage_category.php');
                    die(); //stop the process.
                }
            
            }
            }
            else
            {
                $image_name=$current_image;
            }
            
        }
        else{
            $image_name=$current_image;

        }
       


        //3.update the database
        $sql2 = "UPDATE category SET
                 title='$title',
                 image_name='$image_name',
                 featured='$featured',
                 active='$active'
                 WHERE id=$id";

        // execute the query
        $res2 = mysqli_query($conn,$sql2);

        //4.redirect to manage caregory
        if($res==true)
        {
            $_SESSION['update']="<div class='success'>Category updated succesfully</div>";
            header('location:'.SITEURL.'admin/manage_category.php');

        }
        else{
            $_SESSION['update']="<div class='error'>Category updated succesfully</div>";
            header('location:'.SITEURL.'admin/manage_category.php');

        }



    }
    
    
    ?>

</div></div>



<?php include('partials/footer.php'); ?>