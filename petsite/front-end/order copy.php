<?php 
include('partials-front/front-menu.php');
?>

<?php

if(isset($_GET['food_id']))
{
   
     
     $food_id=$_GET['food_id'];

     $flag=0;
     $temp='food';

     $sql = "SELECT * FROM food WHERE id=$food_id";

     $res = mysqli_query($conn,$sql);

     $count = mysqli_num_rows($res);

     if($count==1)
     {
         $row = mysqli_fetch_assoc($res);
         $title = $row['title'];
         $price =$row['price'];
         $image_name=$row['image_name'];


     }
     else{
        header('location:'.SITEURL.'front-end/homepage.php');
     }
}

elseif(isset($_GET['acc_id']))
{
    
    $acc_id=$_GET['acc_id'];

    $flag=1;

    $temp ='item';

    $sql = "SELECT * FROM accessories WHERE id=$acc_id";

    $res = mysqli_query($conn,$sql);

    $count = mysqli_num_rows($res);

    if($count==1)
    {
        $row = mysqli_fetch_assoc($res);
        $title = $row['title'];
        $price =$row['price'];
        $image_name=$row['image_name'];


    }
    else{
       header('location:'.SITEURL.'front-end/homepage.php');
    }



}
else{
    header('location:'.SITEURL.'front-end/homepage.php');
}

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


            
                


    <section class="food-order">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Selected <?php echo $temp;?></legend>

                    <div class="food-menu-img">
                        <?php
                        if($image_name=="")
                        {
                                echo "<div class='error'>image not available</div>";
                        }
                        else{

                            if($flag==0)
                            {
                            ?>
                             <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name;?>" alt="" class="img-responsive img-round">

                            <?php
                            }
                            elseif($flag==1)
                            {
                                ?>
                             <img src="<?php echo SITEURL;?>images/accessories/<?php echo $image_name;?>" alt="" class="img-responsive img-round">

                            <?php

                            }


                        }
                        
                        ?>
                       
                    </div>
    
                    <div class="food-menu-desc">

                        <h3><?php echo $title;?></h3>
                        <input type="hidden" name="item" value="<?php echo $title;?>">

                        <p class="food-price"><?php echo $price;?></p>

                        <input type="hidden" name="price" value="<?php echo $price;?>">

                        <input type="hidden" name="username" value="<?php echo $username;?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>


               
               
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

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form> 
            
            

            <?php
            
            if(isset($_POST['submit']))
            {
                $item =$_POST['item'];
                $price=$_POST['price'];
                $customer_username=$_POST['username'];
                $qty = $_POST['qty'];
                $customer_username=['username'];
                $total=$price*$qty;

                $order_date = date("y-m-d h:i:sa");

                $status = "Ordered";

                $customer_name = $_POST['full-name'];
                $customer_contact = $_POST['contact'];
                $customer_email = $_POST['email'];
                $customer_address=$_POST['address'];

                $sql2 = "INSERT INTO tbl_order SET
                           item ='$item',
                           price=$price,
                           quantity=$qty,
                           total=$total,
                           order_date='$order_date',
                           status='$status',
                           customer_name='$customer_name',
                           customer_contact='$customer_contact',
                           customer_email = '$customer_email',
                           customer_address='$customer_address',
                           customer_username='$username'
                           ";

                $res2=mysqli_query($conn,$sql2);

                if($res2==true)
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

            }
            
            ?>

        </div>
    </section>
    

    


<?php

include('partials-front/front-footer.php');


?>