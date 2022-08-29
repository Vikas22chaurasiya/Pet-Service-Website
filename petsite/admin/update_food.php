<?php
include('partials/menu.php');
?>

<?php 

if(isset($_GET['id']))
{
$id = $_GET['id'];

$sql2 = "SELECT * FROM food WHERE id=$id";

//Execute the Query
$res= mysqli_query($conn,$sql2);

//get the value based on query executed
$row2 = mysqli_fetch_assoc($res);

//get individual value
$title = $row2['title'];
$description =$row2['description'];
$price =$row2['price'];
$current_image =$row2['image_name'];
$current_category =$row2['category_id'];
$featured =$row2['featured'];
$active = $row2['active'];

}
else{
    //redirect
    header('location:'.SITEURL.'admin/manage_food.php');
}

?>
<div class="main-content">
    <div class="wrapper">
        <h1>Update Food</h1>
        <br><br>
<?php
      if(isset($_SESSION['upload-failed']))//checked whether session is set or not.
        {

          echo $_SESSION['upload-failed'];     //displaying session message
          unset($_SESSION['upload-failed']); // removing session message
      
        }
        ?>

<form action="" method="POST" enctype="multipart/form-data">

<table class="tbl-30">
    <tr>
        <td>title</td>
        <td>
            <input type="text" name="title" value="<?php echo $title;?>">
        </td>
    </tr> 

    <tr>
        <td>Description</td>
        <td><textarea name="description" cols="30" row ="5" ><?php echo $description;?></textarea></td>
    </tr>

    <tr>
        <td>Price</td>
         <td>
             <input type="number" name="price" value="<?php echo $price;?>">
         </td>
    </tr>

    <tr>
       <td>
        Current image:
        </td>
        <td>
        <?php
        if($current_image=="")
        {
            echo "<div class='error'>Image not available</div>";
        }
        else{
            //image available
            ?>
            
            <img src="<?php echo SITEURL;?>images/food/<?php echo $current_image;?>" width="150px">
            <?php

        }
        
        ?>
        </td>
    </tr>

    <tr>
        <td>
        new image:
        </td>
        <td>
        <input type="file" name="image">
        </td>
    </tr>

    <tr>
        <td>
            Category
        </td>
        <td>
            <select name="category">
            <?php
               //create php code to display categories
               //1.create sql to get all active categories
               $sql = "SELECT * FROM category WHERE active='yes'";
              
               //2.executing query
               $res = mysqli_query($conn,$sql);

               //count rows to check whether we categories or not
               $count = mysqli_num_rows($res);

               //if count is greater than zero, we have categories else not
               if($count>0)
               {
                   while($row=mysqli_fetch_assoc($res))
                   {
                       $category_id = $row['id'];
                       $category_title = $row['title'];
                    
                        //echo "<option value='$category_id'>$category_title </option>";---> other way of doing same as below.
                        ?>
                        <option <?php if($current_category==$category_id){echo "selected";}?> value="<?php echo $category_id;?>"> <?php echo $category_title;?> </option>

                       <?php

                    
                   }
               }
               else{
                   //no categories
                    echo "<option value='0'>category not available</option>";

               }

            ?>
            </select>
        </td>
        
    </tr>

    <tr>
        <td>featured</td>
        <td>
            <input <?php if($featured=="yes") {echo "checked";}?> type="radio" name ="featured" value="yes">yes
            <input <?php if($featured=="no") {echo "checked";}?> type="radio" name ="featured" value="no">no
        </td>
    </tr>

    <td>active</td>
        <td>
            <input <?php if($active=="yes") {echo "checked";}?> type="radio" name ="active" value="yes">yes
            <input <?php if($active=="no") {echo "checked";}?> type="radio" name ="active" value="no">no
        </td>
    </tr>

    <tr>
        <input type="hidden" name="id" value="<?php echo $id;?>">
        <input type="hidden" name="current_image" value="<?php echo $current_image;?>">
        <td colspan="2"><input type="submit" name="submit" value="update food" class="btn-secondary"></td>
    </tr>



    
</table>


</form>
<?php

if(isset($_POST['submit']))
{
    //1.get all details from form
    $id =$_POST['id'];
    $title =$_POST['title'];
    $description=$_POST['description'];
    $price = $_POST['price'];
    $current_image=$_POST['current_image'];
    $category=$_POST['category'];
    $featured=$_POST['featured'];
    $active =$_POST['active'];

    //2.Aupload image if selected
    if(isset($_FILES['image']['name']))
    {
        $image_name=$_FILES['image']['name'];

        //check whether filesb is available or not
        if($image_name!="")
        {
            //image available
            $ext = end(explode('.',$image_name));

            $image_name ="Food-name-".rand(0000,9999).'.'.$ext;

            $src_path = $_FILES['image']['tmp_name'];
            $dest_path="../images/food/".$image_name;

            //upload image
            $upload = move_uploaded_file($src_path,$dest_path);

            //check whether image is uploaded or not
            if($upload==false)
            {
                //failed to upload
                $_SESSION['upload']="<div class='error'>Failed to upload image.</div>";
                header('location:'.SITEURL.'admin/manage_food.php');

                //stop the process as if img upload failed we wont update data in database
                die();


            }
           // B.reomve current image if available
           if($current_image!="")
           {
               //current image available
               $remove_path="../images/food/".$current_image;
               $remove = unlink($remove_path);

               //check whether img is removed or not
               if($remove==false)
               {
                   $_SESSION['failed-remove-img']= "<div class='error'>Failed to remove current image</div>";
                   header('location:'.SITEURL.'admin/manage_food.php');

                   //stop the process
                   die();
               }
           }
        }
        else{
            $image_name=$current_image;
        }
    }
    else{
        $image_name=$current_image;
    }

       //3.update the food in database
         $sql3 = "UPDATE food SET 
                  title ='$title',
                  description ='$description',
                  price = $price,
                  image_name='$image_name',
                  category_id='$category',
                  featured='$featured',
                  active ='$active' WHERE id=$id";

         //Execute the query
         $res3 = mysqli_query($conn,$sql3);
         
         //check if query executed
         if($res==true)
         {
            $_SESSION['update']="<div class='success'>Food updated successfully</div>";
            header('location:'.SITEURL.'admin/manage_food.php');

         }
         else{
            $_SESSION['update']="<div class='error'>Failed to update food</div>";
            header('location:'.SITEURL.'admin/manage_food.php');

         }
       //redirect to manage food
}

?>

    </div>
</div>



<?php
include('partials/footer.php');
?>