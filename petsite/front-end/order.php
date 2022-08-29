<?php 
include('partials-front/front-menu.php');

?>






<?php
                if(isset($_GET['customer_username']))
                {

                $username =$_GET['customer_username'];
               
                
                $sql3 = "SELECT * FROM customer WHERE username ='$username'
                          ";

                $res3 = mysqli_query($conn,$sql3);

                $count = mysqli_num_rows($res3);
                
                if($count==1)
                {
                    $row = mysqli_fetch_assoc($res3);

                    $fullname =$row['full_name'];
                    $phone=$row['contact_no'];
                    $email_id=$row['email'];
                    $addrs = $row['address'];
                
            
                
                }
            }
            ?>

             <?php
             $sql4 = "SELECT SUM(total) AS total FROM cart WHERE customer_username='$username'";

             $res4 = mysqli_query($conn,$sql4);

             $row = mysqli_fetch_assoc($res4);
             
             $total_bill = $row['total'];
             
             
             
             
             ?>
            
                


    <section class="food-order">
        <div class="container">
            
            <h2 class="text-center text-white">confirm your order.</h2>

            <form action="" method="POST" class="order">
               
               
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name"  class="input-responsive" value="<?php echo $fullname;?>">

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" value="<?php echo $phone;?>" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. hi@vijaythapa.com" class="input-responsive" value="<?php echo $email_id;?>" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required><?php echo $addrs;?> </textarea>

                    <p>total= Rs.<?php echo $total_bill;?></p>

                    <input type="submit"  name="submit" value="Confirm Order" class="btn btn-primary">
                    <a class="btn btn-primary" target="_blank" href="<?php echo SITEURL; ?>front-end/bill.php?customer=<?php echo $username;?>">download bill </a> 

                    

                    
                </fieldset>

            </form> 
            
            

            <?php
            
            if(isset($_POST['submit']))
            {
                $status = "Ordered";

                $customer_name = $_POST['full-name'];
                $customer_contact = $_POST['contact'];
                $customer_email = $_POST['email'];
                $customer_address=$_POST['address'];

              

                $sql1 = "INSERT INTO tbl_order SELECT * FROM cart WHERE customer_username='$username'";
                $res1=mysqli_query($conn,$sql1);
                

               

                if($res1==true)
                {
                    $_SESSION['order']="<div class='success text-center'><?php $temp;?> ordered successfully</div>";
                    // header('location:'.SITEURL.'front-end/food-section.php');
                    ?>

                    <script>
                        window.location.href="<?php echo SITEURL.'front-end/homepage.php' ?>";
                    </script>

                    <?php

                }
                else{

                    $_SESSION['order']="<div class='error text-center'>Failed to order <?php $temp;?></div>";
                    header('location:'.SITEURL.'front-end/homepage.php'); 

            }

            $sql2 = "DELETE FROM cart WHERE customer_username='$username'";
            $res2=mysqli_query($conn,$sql2);

            }
            
            ?>

        </div>
    </section>
    

    


<?php

include('partials-front/front-footer.php');


?>