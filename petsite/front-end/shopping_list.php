<?php 
include('partials-front/front-menu.php');


?>


             <?php
                if(isset($_GET['customer_username']))
                {

                $username =$_GET['customer_username'];
                }
            ?>
<div class="main" id="bill">
    <div class="wrapper"> 
      
          <a class="button btn-primary" href="<?php echo SITEURL; ?>front-end/confirmed_orders.php?customer_username=<?php echo $username; ?>">Your orders</a>
       
    <br><br>
    <?php
    
    if(isset($_SESSION['delete']))
    {

      echo $_SESSION['delete'];     //displaying session message
      unset($_SESSION['delete']); // removing session message
  
    } 
    
    
    
    
    ?>
    
    <div id="bill">

    <table class="table-full">
        <tr>
            <th>S.N</th>
            <th>Title</th>
            <th>Image</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>total</th>
            <th>order_date</th>
            <th>Action</th>
         </tr>

         <?php

         //create a sql query to get all food
         $sql = "SELECT * FROM cart WHERE customer_username='$username'";


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
               $title = $row['item'];
               $price = $row['price'];
               $quantity =$row['quantity'];
               $total = $row['total'];
               $order_date =$row['order_date'];
               $image_name = $row['image_name'];
               
               // $status =$row['status'];
               ?>

               <tr>
            <td><?php echo $sn++;?></td>
            
            <td><?php
            
            if($image_name!="")
            {
               ?>
               <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name;?>"  height="100px" class="img-responsive img-round">
               <?php
            }
            else{
               echo "<div class='error'>image not available</div>";
            
            }
            
            
            ?></td>
            <td><?php echo $title;?></td>

            <td><?php echo $price;?></td>
            

            <td><?php echo $quantity;?></td>
            <td><?php echo $total;?></td>
            <td><?php echo $order_date;?></td>
            <td>  <a href="<?php echo SITEURL; ?>front-end/cart_delete.php?id=<?php echo $id; ?>" class="btn-danger"> Delete </a></td>
            

            
            </tr>
          
            

               <?php
            }

         
           
   
   

         }
         else{
            // data do not exist
            //writing html in php
            echo "<tr><td colspan='2' class='error'>Nothing in cart</td></tr>";
         }
         
        
         
         
         ?>

         

         
    </table>

    <a class="button btn-primary confirm-order" href="<?php echo SITEURL; ?>front-end/order.php?customer_username=<?php echo $username; ?>" >confirm orders</a>
    
   </div>
   <?php
   
   $sql4 = "SELECT SUM(total) AS total FROM cart WHERE customer_username='$username'";

   $res4 = mysqli_query($conn,$sql4);

   $row = mysqli_fetch_assoc($res4);
   
   $total_bill = $row['total'];
   ?>

<div id="totalincart">
   Total : <?php echo $total_bill;?>
</div>

   
</div>





<?php

include('partials-front/front-footer.php');


?>