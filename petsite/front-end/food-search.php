<?php 
include('partials-front/front-menu.php');



?>


<section class="food-menu">
    <div class="container">
       
        <?php
        
        
        $search = $_POST['search'];

        $sql = "SELECT * FROM food WHERE title LIKE '%$search%' OR description LIKE '%$search%'";

        $res = mysqli_query($conn,$sql);

        $count = mysqli_num_rows($res);

        $flag = 1;
        $file = 'food';

       if($count==0)
       {
        $sql1 = "SELECT * FROM accessories WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
        $res = mysqli_query($conn,$sql1);

        $count = mysqli_num_rows($res);
        $flag = 0;
        $file = 'accessories';

       }


        if($count > 0)
        {
            ?>


            <h2 class="text-center">search result for <?php echo $search; ?></h2>

            <?php

            while($row=mysqli_fetch_assoc($res))
            {
            $id = $row['id'];
            $title = $row['title'];
            $price = $row['price'];
            $description = $row['description'];
            $image_name = $row['image_name'];
            ?>
             
             <div class="food-menu-box col-lg-3">
            <div class="food-menu-img">
                <?php
                if($image_name=="")
                {
                    echo "<div class='error'>Image not availabel</div>";
                }
                else{
                    ?>
                    <img src="<?php echo SITEURL;?>images/<?php echo $file;?>/<?php echo $image_name; ?>" alt="img" class="img-responsive img-rounded">
                    <?php

                }
                ?>

            
            </div>
            <div class="food-menu-desc">
                <h4><?php echo $title;?></h4>
                <p class="food-price"><?php echo $price;?></p>
                 <p class="food-detail"><dfn data-info="<?php echo $description;?>"><i class="fa-solid fa-info"></dfn></i></p>
                <br>
                <?php
                if(isset($_SESSION['c-user']))
                {
                    ?>
                     <!-- <a href="<?php echo SITEURL;?>front-end/order.php?food_id=<?php echo $id;?>&customer_username=<?php echo $_SESSION['c-user'];?>" class="btn btn-primary">order-now</a> -->

                     <form class="search-form" action="" method="POST">
                        <tr>
                            <td><input type="submit" name="submit" value="Order " class="btn btn-primary"></td>
                            <td><input type="number" name="quantity" class="input-responsive" value="1" placeholder="Enter Quantity"></td>
                        </tr>
                        

                    </form>
                    <?php

                  

                }
                else{
                    $_SESSION['unauthorized']="<div class='error'>Please Login to place order</div>";
                    ?>
                   
                    <a href="<?php echo SITEURL;?>front-end/customer_login.php?page_link=<?php echo 'food-search.php'?>" class="btn btn-primary">order-now</a>
                    <?php
                }
                
                ?>
            </div>
        </div>
        <?php

      }

    }
        else{
            echo "<div class='error'>Fodd not available</div>";
        }
        
        
        ?>
    </div>
</section>







<?php

include('partials-front/front-footer.php');


?>

<?php

if(isset($_POST['submit']) && isset($_SESSION['c-user']))

{
    $username = $_SESSION['c-user'];
    // $qty = $_POST['Qty'];
    $quantity = 1;

    /*Getting info about item*/
    if($flag==1)
    {
    $sql = "SELECT * FROM food WHERE id=$id";
    }
    else{
        $sql = "SELECT * FROM accessories WHERE id=$id";

    }

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

      /**Customer info */

      $sql2 = "SELECT * FROM customer WHERE username ='$username'
      ";

        $res2 = mysqli_query($conn,$sql2);

         $count = mysqli_num_rows($res2);

         if($count==1)
         {
          $row2 = mysqli_fetch_assoc($res2);

             $fullname =$row2['full_name'];
             $phone=$row2['contact_no'];
             $email_id=$row2['email'];
             $addrs = $row2['address'];
        }


        /***inserting in cart table */
        $order_date = date("y-m-d h:i:sa");
        $total = $price*$quantity;
        $status ='ordered';

        $sql3 = "INSERT INTO cart SET
       item ='$title',
       price=$price,
       quantity=$quantity,
       total=$total,
       order_date='$order_date',
       status = '$status',
       customer_name='$fullname',
       customer_contact='$phone',
       customer_email = '$email_id',
       customer_address='$addrs',
       customer_username='$username',
       image_name='$image_name'
       ";

         $res3=mysqli_query($conn,$sql3);

}
?>