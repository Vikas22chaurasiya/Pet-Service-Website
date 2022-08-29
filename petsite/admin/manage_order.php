<?php include('partials/menu.php') ?>

<div class="main-content">
    <div class="wrapper"> <h1>manage order</h1>
    <br><br>

    <?php
        if(isset($_SESSION['update']))
        {
 
          echo $_SESSION['update'];     //displaying session message
          unset($_SESSION['update']); // removing session message
      
        } 
    
    
    
    
    
    
    
    ?>

<!-- button -->

    <table class="table-full">
        <tr>
            <th>S.N</th>
            <th>  Food</th>
            <th>price</th>
            <th>Quantity</th>
            <th>total</th>
            <th>order_date</th>
            <th>status</th>
            <th>customer name</th>
            <!-- <th>customer contact</th> -->
            <th class="orderemail">Email</th>
            <th>address</th>
            <th>Actions</th>
         </tr>

         <?php
         
         $sql = "SELECT * FROM tbl_order";

         $res = mysqli_query($conn,$sql);

         $count =mysqli_num_rows($res);
         $sn =1;

         if($count>0)
         {
            while($row=mysqli_fetch_assoc($res))
            {
               $id =$row['id'];
               $food = $row['item'];
               $price = $row['price'];
               $qty = $row['quantity'];
               $total = $row['total'];
               $order_date=$row['order_date'];
               $status=$row['status'];
               $customer_name = $row['customer_name'];
               $customer_contact =$row['customer_contact'];
               $customer_email = $row['customer_email'];
               $customer_address = $row['customer_address'];

               ?>
                 <tr>
                 <td><?php echo $sn++;?></td>
                  <td><?php echo $food;?></td>
                 <td><?php echo $price;?></td>
                 <td><?php echo $qty;?></td>
                 <td><?php echo $total;?></td>
                 <td><?php echo $order_date;?></td>

                  <td>
                     <?php
                     if($status=="Ordered")
                     {
                        echo "<label>$status</label>";
                     }
                     elseif($status=="On delivery")
                     {
                        echo "<label style='color:orange'>$status</label>";
                     }
                     elseif($status=="Delivered")
                     {
                        echo "<label style='color:green'>$status</label>";
                     }
                     elseif($status=="cancelled")
                     {
                        echo "<label style='color:red'>$status</label>";
                     }
                     
                     ?>
                  </td>

                 <td><?php echo $customer_name;?></td>
                 <!-- <td><?php echo $customer_contact;?></td>         -->
                 <td><?php echo $customer_email;?></td>
                 <td><?php echo $customer_address;?></td>
                   <td colspan="5">
                    <a href="<?php echo SITEURL;?>admin/update_order.php?id=<?php echo $id;?>" class="btn btn-secondary">update</a>
                    </td>
                 </tr>


               <?php
         



            }

            

         }
         else
         {
            echo "<tr><td colspan='12' class='error'>Orders not available</td></tr>";
         }
         

         
         
         
         ?>


        

        
    </table>
</div>
   
</div>

<?php include('partials/footer.php')?>