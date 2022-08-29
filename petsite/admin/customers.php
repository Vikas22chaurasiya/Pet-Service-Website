
<?php include('partials/menu.php') ?>
      <!-- content section starts -->
      <div class="main-content">
          <div class="wrapper">
          <h1>Customers</h1>
          <br><br>

        

          <table class="table-full">
        <tr>
            <th>S.N</th>
            <th>Full name</th>
            <th>Username</th>
            <th>contact</th>
            <th>Email</th>
            <th>Address</th>
         </tr>

         <?php

         $sql = "SELECT * FROM customer";//query to get all admin.

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
               $address = $rows['address'];

           
            //display the value in table.  //?id=<?php echo $id==git method=taking value from url
               ?>
                <tr>
            <td><?php echo $sn++; ?></td>
            <td><?php echo $full_name; ?></td>              
            <td><?php echo $username; ?></td>
            <td><?php echo $email; ?></td>
            <td><?php echo $contact; ?></td>
            <td><?php echo $address; ?></td>
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