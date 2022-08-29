<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/styles.css"> 
     <link rel="stylesheet" href="css/style2.css"> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script src="scriptpdf.js"></script>
</head>
<body>
    
<?php
                if($_GET['customer'])
                {

                $username =$_GET['customer'];
                }

                include('../config/constants.php');
            ?>
<div class="main" id="bill">
    <div class="wrapper"> 
      
    <div class="text-center"><h1>PET SERVICE</h1></div>

    <div>Date :<?php echo date('Y/m/d')?></div>
          
       
    <br><br>


    <div> customer name : <?php echo $username;?></div>

    <table class="table-full">
        <tr>
            <th>S.N</th>
            <th>Title</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>total</th>
         
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
               
               
               // $status =$row['status'];
               ?>

               <tr>
            <td><?php echo $sn++;?></td>
            
            
            <td><?php echo $title;?></td>

            <td><?php echo $price;?></td>
            

            <td><?php echo $quantity;?></td>
            <td><?php echo $total;?></td>
            
           
            

            
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

   </div>
   <?php
   
   $sql4 = "SELECT SUM(total) AS total FROM cart WHERE customer_username='$username'";

   $res4 = mysqli_query($conn,$sql4);

   $row = mysqli_fetch_assoc($res4);
   
   $total_bill = $row['total'];
   ?>

<div id="totalincartbill">
   Total : <?php echo $total_bill;?>
</div>

   
</div>
    <button onclick="generatePDF()" class="btn btn-primary billbtn">Download bill</button>
    
</body>
</html>