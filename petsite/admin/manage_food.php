<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper"> <h1>manage food</h1>
    <br><br>
   
<!-- button -->
<a href="<?php echo SITEURL;?>admin/add_food.php" class="btn-primary"> Add food</a>
<br><br><br><br>
<?php
           if(isset($_SESSION['add']))//checked whether session is set or not.
           {
   
             echo $_SESSION['add'];     //displaying session message
             unset($_SESSION['add']); // removing session message
         
           }

           if(isset($_SESSION['update']))//checked whether session is set or not.
           {
   
             echo $_SESSION['update'];     //displaying session message
             unset($_SESSION['update']); // removing session message
         
           }

           if(isset($_SESSION['delete']))//checked whether session is set or not.
           {
   
             echo $_SESSION['delete'];     //displaying session message
             unset($_SESSION['delete']); // removing session message
         
           }

           if(isset($_SESSION['upload']))//checked whether session is set or not.
           {
   
             echo $_SESSION['upload'];     //displaying session message
             unset($_SESSION['upload']); // removing session message
         
           }

           if(isset($_SESSION['unauthorized']))//checked whether session is set or not.
           {
   
             echo $_SESSION['unauthorized'];     //displaying session message
             unset($_SESSION['unauthorized']); // removing session message
         
           }

           if(isset($_SESSION['failed-remove-img']))//checked whether session is set or not.
           {
   
             echo $_SESSION['failed-remove-img'];     //displaying session message
             unset($_SESSION['failed-remove-img']); // removing session message
         
           }

   ?>
    <table class="table-full">
        <tr>
            <th>S.N</th>
            <th>Title</th>
            <th>Price</th>
            <th>Image</th>
            <th>Featured</th>
            <th>active</th>
            <th>actions</th>
         </tr>

         <?php

         //create a sql query to get all food
         $sql = "SELECT * FROM food";

         //execute the query
         $res = mysqli_query($conn,$sql);

         //count the rows to check whether we have data or not
         $count = mysqli_num_rows($res);

         //create number variable
         $sn =1;

         if($count>0)
         {

            //we have data
            //get food from database and display

            while($row=mysqli_fetch_assoc($res))
            {
               //get values
               $id = $row['id'];
               $title = $row['title'];
               $price = $row['price'];
               $image_name =$row['image_name'];
               $featured = $row['featured'];
               $active =$row['active'];
               ?>
               <tr>
            <td><?php echo $sn++;?></td>
            <td class="food_title"><?php echo $title;?></td>
            <td><?php echo $price;?></td>
            <td><?php
             //check whether we have image or not
             if($image_name=="")
             {
                //we do not have image error msg
                echo "<div class='error'>Image not added</div>";
             }
             else{
                //we have image mDisplay the image
                ?>

                <img src= "<?php echo SITEURL;?>images/food/<?php echo $image_name;?>" width="100px">
                <?php
             }
            
            
            ?></td>

            <td><?php echo $featured;?></td>
            <td><?php echo $active;?></td>

            
            <td>
            <a href="<?php echo SITEURL; ?>admin/update_food.php?id=<?php echo $id;?>" class="btn-secondary"> update food</a>
            <a href="<?php echo SITEURL; ?>admin/delete_food.php?id=<?php echo $id;?>&image_name=<?php echo $image_name;?>" class="btn-danger">  delete food</a>
            </td>
         </tr>

               <?php
            }
         }
         else{
            // data do not exist
            //writing html in php
            echo "<tr><td colspan='2' class='error'>Food not added yet</td></tr>";
         }
         
         
         
         
         ?>

         

         
    </table>
</div>
   
</div>

<?php include('partials/footer.php')?>