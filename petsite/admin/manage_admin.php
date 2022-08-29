
<?php include('partials/menu.php') ?>
      <!-- content section starts -->
      <div class="main-content">
          <div class="wrapper">
          <h1>manage Admin</h1>
          <br><br>

        <?php
       if(isset($_SESSION['add']))
       {

         echo $_SESSION['add'];     //displaying session message
         unset($_SESSION['add']); // removing session message
     
       } 


       if(isset($_SESSION['delete']))
       {

         echo $_SESSION['delete'];     //displaying session message
         unset($_SESSION['delete']); // removing session message
     
       } 

       if(isset($_SESSION['update']))
       {

         echo $_SESSION['update'];     //displaying session message
         unset($_SESSION['update']); // removing session message
     
       } 

       if(isset($_SESSION['user-not-found']))
       {

         echo $_SESSION['user-not-found'];     //displaying session message
         unset($_SESSION['user-not-found']); // removing session message
     
       } 

       if(isset($_SESSION['password-not-matched']))
       {

         echo $_SESSION['password-not-matched'];     //displaying session message
         unset($_SESSION['password-not-matched']); // removing session message
     
       } 

       
       if(isset($_SESSION['change-pwd']))
       {

         echo $_SESSION['change-pwd'];     //displaying session message
         unset($_SESSION['change-pwd']); // removing session message
     
       } 
      
        ?>
        <br><br>


         <!-- button -->
          <a href="add_admin.php" class="btn-primary"> Add admin</a>
          <br><br><br><br>

          <table class="table-full">
        <tr>
            <th>S.N</th>
            <th>Full name</th>
            <th>Username</th>
            <th>contact</th>
            <th>Email</th>
            <th>Actions</th>
         </tr>

         <?php

         $sql = "SELECT * FROM admin";//query to get all admin.

         $res = mysqli_query($conn,$sql);//execute query

         if($res==TRUE)//check whether query is executed or not.
         {
           //count row to check whether we have data in database
           $count = mysqli_num_rows($res);

           $sn=1; //create a variable and assign the value

           if($count>0)
           {
             while($rows=mysqli_fetch_assoc($res)) //row will store that row data fetched by fect_assoc
             {
             
               // while will run as long as we have data in database i.e as long aa $row is not empty
               $id=$rows['id'];
               $full_name=$rows['full_name'];
               $username  = $rows['username'];
               $email =$rows['email'];
               $contact = $rows['contact_no'];

           
            //display the value in table.  //?id=<?php echo $id==git method=taking value from url
               ?>
                <tr>
            <td><?php echo $sn++; ?></td>
            <td><?php echo $full_name; ?></td>              
            <td><?php echo $username; ?></td>
            <td><?php echo $email; ?></td>
            <td><?php echo $contact; ?></td>
            <td>  
            <a href="<?php echo SITEURL;?>admin/update_password.php?id=<?php echo $id;?>" class="btn-primary"> change password</a>
            <a href="<?php echo SITEURL;?>admin/update_admin.php?id=<?php echo $id;?>" class="btn-secondary"> update admin</a>                                            
            <a href="<?php echo SITEURL; ?>admin/delete_admin.php?id=<?php echo $id; ?>" class="btn-danger">  delete admin</a>  
            </td>
         </tr>

               <?php

             }
           }
           else
           {
            echo "error database is empty";

           }

         }

         ?>
        
    </table>
         
          </div>
         
      </div>
    <!-- content section ends -->

    <?php include('partials/footer.php')?>