<?php

include('partials/menu.php');

?>

<div class="main-content"><div class="wrapper">

<h1>Add food</h1>

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
            <input type="text" name="title" placeholder="title of the food">
        </td>
    </tr> 

    <tr>
        <td>Description</td>
        <td><textarea name="description" cols="30" row ="5" placeholder="description of the food"></textarea></td>
    </tr>

    <tr>
        <td>Price</td>
         <td>
             <input type="number" name="price">
         </td>
    </tr>

    <tr>

    <td>
        select image:
    </td>
    <td>
        <input type="file" name="image">
    </td>
    </tr>

    <tr>
        <td>Category</td>
        <td><select name="category" id="">
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
                       $id = $row['id'];
                       $title = $row['title'];
                       ?>
                        <option value="<?php echo $id;?>"> <?php echo $title;?> </option>

                       <?php
                   }
               }
               else{
                   //no categories
                   ?>
                    <option value="0">no categories found</option>
                   <?php

               }

            ?>
            
        </select></td>
    </tr>

    <tr>
        <td>featured</td>
        <td>
            <input type="radio" name ="featured" value="yes">yes
            <input type="radio" name ="featured" value="no">no
        </td>
    </tr>

    <td>active</td>
        <td>
            <input type="radio" name ="active" value="yes">yes
            <input type="radio" name ="active" value="no">no
        </td>
    </tr>

    <tr>
        <td colspan="2"><input type="submit" name="submit" class="btn-secondary"></td>
    </tr>



    
</table>


</form>

<?php
 
 //check if submit is clicked
 if(isset($_POST['submit']))
 {
   
    //1.get data from form
    $title =$_POST['title'];
    $description =$_POST['description'];
    $price =$_POST['price'];
    $category =$_POST['category'];

    //2.check whether radio for ative and featured is set or not
    if(isset($_POST['featured']))
    {
        $featured = $_POST['featured'];

    }
    else{
        $featured="no";
    }

    if(isset($_POST['active']))
    {
        $active = $_POST['active'];

    }
    else{
        $active="no"; //setting default value
    }

    //2.upload image
    //check if select image btn is clicked or not

    if(isset($_FILES['image']['name']))
    {
     
        //get details of selected image
        $image_name =$_FILES['image']['name'];

        //check whether image is selected or not and upload image only if selected
        if($image_name!="")
        {
            //1.rename the image 
            //get extension of selected image
            $ext = end(explode('.',$image_name));

            //create new name for image
            $image_name = "food-name-".rand(0000,9999).".".$ext;

            //upload the image
            //get source path and destination path
            //source path is current location of image

            $soure_path =$_FILES['image']['tmp_name'];

            //destination path is where image will be saved
            $destination_path = "../images/food/".$image_name;

            //upload to folder food image
            $upload = move_uploaded_file($soure_path,$destination_path);
            
            //check whether img is uploaded
            if($upload==false)
            {
                //failed to upload 
                //redirect
                $_SESSION['upload-failed']="<div class='error'>Failed to upload image</div>";
                header('location:'.SITEURL.'admin/add_food.php');

                //stop the procees bcoz if img is not uploaded we dont want to continue
                die();

            }
        }

    }
    else{
        $image_name = "";
    }

    //3.insert the data in database
    //create sql
    //numerical value do not need single quotes only strings require it.
    $sql2 = "INSERT INTO food SET
             title ='$title',
             description = '$description',
             price = $price,
             image_name='$image_name',
             category_id=$category,
             featured = '$featured',
             active = '$active'";


             $dup = mysqli_query($conn,"SELECT * FROM food where title='$title'");

             if(mysqli_num_rows($dup)>0)
            {
            $_SESSION['add'] = "<div class='error'>Dulpicate entries are not allowed.</div>";    //session hold info till browser is not refreshed.
            header('location:'.SITEURL.'admin/manage_category.php');
            die();

             }
             else{

             //execute the query
             $res = mysqli_query($conn,$sql2);

             //check whether data inserted
             if($res==true)
             {
                 //data inserted successfully
                 $_SESSION['add']="<div class ='success'>Food added successfully</div>";
                header('location:'.SITEURL.'admin/manage_food.php');


             }
             else{
                 //failed to insert
                $_SESSION['add']="<div class ='error'>failed to add food</div>";
                header('location:'.SITEURL.'admin/manage_food.php');

             }

            }


 }

?>








</div></div>


<?php

include('partials/footer.php');

?>