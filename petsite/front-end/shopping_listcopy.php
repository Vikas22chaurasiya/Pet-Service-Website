<?php 
include('partials-front/front-menu.php');


?>


             <?php
                if(isset($_GET['customer_username']))
                {

                $username =$_GET['customer_username'];
                }
            ?>
<div class="main">
    <div class="wrapper"> 
    <br><br>


    <table class="table-full">
        <tr>
            <th>S.N</th>
            <th>Title</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>total</th>
            <th>order_date</th>
            <th>status</th>
         </tr>

         <?php

         //create a sql query to get all food
         $sql = "SELECT * FROM tbl_order WHERE customer_username='$username'";


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
               $status =$row['status'];
               ?>

               <tr>
            <td><?php echo $sn++;?></td>
            <td><?php echo $title;?></td>
            <td><?php echo $price;?></td>
            

            <td><?php echo $quantity;?></td>
            <td><?php echo $total;?></td>
            <td><?php echo $order_date;?></td>
            <td><?php echo $status;?></td>

            
            </tr>

               <?php
            }
         }
         else{
            // data do not exist
            //writing html in php
            echo "<tr><td colspan='2' class='error'>item not bought yet</td></tr>";
         }
         
         
         
         
         ?>

         

         
    </table>
</div>
   
</div>




<?php

include('partials-front/front-footer.php');


?>