<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper"> <h1>manage category</h1>
    <br><br>
    <?php
          
          if(isset($_SESSION['add']))//checked whether session is set or not.
        {

          echo $_SESSION['add'];     //displaying session message
          unset($_SESSION['add']); // removing session message
      
        }

        if(isset($_SESSION['remove']))//checked whether session is set or not.
        {

          echo $_SESSION['remove'];     //displaying session message
          unset($_SESSION['remove']);   // removing session message
        
        }

        
        if(isset($_SESSION['delete']))//checked whether session is set or not.
        {

          echo $_SESSION['delete'];     //displaying session message
          unset($_SESSION['delete']); // removing session message
      
        }

        if(isset($_SESSION['no-category-found']))//checked whether session is set or not.
        {

          echo $_SESSION['no-category-found'];     //displaying session message
          unset($_SESSION['no-category-found']); // removing session message
      
        }

        if(isset($_SESSION['update']))//checked whether session is set or not.
        {

          echo $_SESSION['update'];     //displaying session message
          unset($_SESSION['update']); // removing session message
      
        }

        if(isset($_SESSION['upload']))//checked whether session is set or not.
        {

          echo $_SESSION['upload'];     //displaying session message
          unset($_SESSION['upload']); // removing session message
      
        }

        if(isset($_SESSION['failed-remove']))//checked whether session is set or not.
        {

          echo $_SESSION['failed-remove'];     //displaying session message
          unset($_SESSION['failed-remove']); // removing session message
      
        }
        ?>
        <br><br>

<!-- button -->
<a href="<?php echo SITEURL?>admin/add_category.php" class="btn-primary"> Add category</a>
<br><br><br><br>
    <table class="table-full">
        <tr>
            <th>S.N</th>
            <th>Title</th>
            <th>Image</th>
            <th>featured</th>
            <th>active</th>
            <th >Actions</th>
         </tr>

         <?php

         //query to get all categories from database
         $sql = "SELECT * FROM category";

         //execute the query
         $res = mysqli_query($conn,$sql);

         //count rows
         $count =mysqli_num_rows($res);

         $sn=1;//serial number

         //check whether we have data in database or not
         if($count > 0)
         {
            //we have data in database
            //get the data and display
            while($row=mysqli_fetch_assoc($res))
            {
              $id = $row['id'];
              $title =$row['title'];
              $image_name =$row['image_name'];
              $featured =$row['featured'];
              $active =$row['active'];
              
              ?>
            <tr>
            <td><?php echo $sn++; ?></td>
            <td><?php echo $title; ?></td>

            <td>
               <?php 
               //check whether image name is available or not
               if($image_name!="")
               {
                  //display image
                  ?>
                  <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name;?>" width="100px">
                  <?php
               }
               else{
                  //display the message
                  echo "<div class='error'>image not added.</div>";
               }

               
               ?>
            </td>

            <td><?php echo $featured; ?></td>
            <td><?php echo $active; ?></td>
            <td>
            <a href="<?php echo SITEURL;?>admin/update_category.php?id=<?php echo $id;?>" class="btn-secondary"> update category</a>
            <a href="<?php echo SITEURL;?>admin/delete_category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name;?>" class="btn-danger">  delete category</a> <!--get method -->
            </td>
            </tr>

              <?php

            }
         }
         else{
             //we do not have data 
             //we will display the message inside table
             ?>

             <tr>
                <td colspan="6"><div class="error">No category added</div></td>
             </tr>
             <?php
         }

         ?>
        
          
         
    </table>

    
</div>
    
   
</div>

<?php include('partials/footer.php'); ?>