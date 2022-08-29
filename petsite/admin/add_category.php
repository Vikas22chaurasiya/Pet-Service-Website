<?php include('partials/menu.php'); ?>

<div class="main-content"><div class="wrapper">
    <h1>Add category</h1>
    <br><br>

    <?php
          
          if(isset($_SESSION['add']))//checked whether session is set or not.
        {

          echo $_SESSION['add'];     //displaying session message
          unset($_SESSION['add']); // removing session message
      
        }

        if(isset($_SESSION['upload']))//checked whether session is set or not.
        {

          echo $_SESSION['upload'];     //displaying session message
          unset($_SESSION['upload']); // removing session message
      
        }


        ?>
        <br><br>

    <!-- form to add category starts -->

    <form action="" method="POST" enctype="multipart/form-data">   <!-- enctype property allows to upload file //  post so that info is hidden -->           
    
    <table class="table-30">
     <tr>
         <td> title:</td>
         <td><input type="text" name="title" placeholder="category title"></td>
      </tr>

      <tr>
         <td> Select image:</td>
         <td><input type="file" name="image"></td>
      </tr>

      <tr>
         <td>featured : </td>
         <td><input type="radio" name="featured" value="yes">yes
         <input type="radio" name="featured" value="no">no</td>
     </tr>

     <tr>
         <td>active: </td>
         <td><input type="radio" name="active" value="yes">yes
         <input type="radio" name="active" value="no">no</td>
     </tr>

     <tr>
         <td colspan="2">
             <input type="submit" name="submit" value="Add category" class="btn-secondary"></input>
         </td>
    </tr>

 </table>

</form>



    <!-- form to add category ends -->



    <?php
     //check whether submit button is clicked or not
     if(isset($_POST['submit']))
     {

        //1. get value from form.
       $title=$_POST['title'];

       //for radio we need to check whether the button is selected or not.
       if(isset($_POST['featured']))
       {
           //get the value from form
           $featured =$_POST['featured'];
       }
       else{
           //set default  value
           $featured="no";
       }

       if(isset($_POST['active']))
       {
           //get the value from form
           $active =$_POST['active'];
       }
       else{
           //set default  value
           $active ="no";
       }
       // check whether image is selected or not and set value for image name accordingly.
    //    print_r($_FILES['image']);

    //    die();//break the code here

    if(isset($_FILES['image']['name']))    // if file type whose name is image has some value of  name of image that means it s filled
    {
       //upload image
       //to upload image we need image name and then source path and destination path.
       $image_name=$_FILES['image']['name'];

       
       //upload image only if it is available.
      if($image_name !="")
      {


       

       


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
     }
    }
    else{
        //dont upload image abd set image_name value as blank
        $image_name ="";
       
    }

       //2.create sql query to insert category into database.
       $sql ="INSERT INTO category SET
              title='$title',
              image_name='$image_name',
              featured ='$featured',
              active='$active'
              ";

         $dup = mysqli_query($conn,"SELECT * FROM category where title='$title'");

         if(mysqli_num_rows($dup)>0)
         {
            $_SESSION['add'] = "<div class='error'>Duplicate entries are not allowed.</div>";    //session hold info till browser is not refreshed.
            header('location:'.SITEURL.'admin/manage_category.php');
            die();

         }

         else{



        //3.execute the quert and save it in database
         $res =mysqli_query($conn,$sql);

       

        //4.check whether query is executed or not

        if($res==true)
        {
            //query executed and category added
            $_SESSION['add'] = "<div class='success'>category added Successfully.</div>";    //session hold info till browser is not refreshed.
            header('location:'.SITEURL.'admin/manage_category.php');
        }
        else{
            //fail to add category
            if(mysqli_errno($conn)==1062)
            {
               $_SESSION['add'] = "<div class='succes'>Failed to add category.</div>";
            }
            $_SESSION['add'] = "<div class='succes'>Failed to add category.</div>";    //session hold info till browser is not refreshed.
            header('location:'.SITEURL.'admin/add_category.php');
        }


    }



     }
    
    ?>



</div></div>


<?php include('partials/footer.php'); ?>