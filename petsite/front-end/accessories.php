<?php
include('partials-front/front-menu.php');

?>



<section class="accessory-menu">
    <div class="container">
        <br><br>
        <h3 class='text-center'>Accessories</h3>
        <br>
  <?php
  $sql = "SELECT * FROM accessories WHERE active='yes'";

  $res = mysqli_query($conn,$sql);

  $count = mysqli_num_rows($res);

  if($count > 0)
  {
      while($row=mysqli_fetch_assoc($res))
      {
        $id = $row['id'];
        $title = $row['title'];
        $image_name = $row['image_name'];
        $price = $row['price'];
        $description = $row['description'];
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
                    <img src="<?php echo SITEURL;?>images/accessories/<?php echo $image_name; ?>" alt="" class="img-responsive img-rounded">
                    <?php

                }
                ?>

            
            </div>
            <div class="food-menu-desc">
                <h4><?php echo $title;?></h4>
                <p class="food-price"><?php echo $price;?></p>
                <p class="food-detail"><?php echo $description;?></p>
                <br>

                <?php
                if(isset($_SESSION['c-user']))
                {
                    ?>
                    <!-- <a href="<?php echo SITEURL;?>front-end/order.php?acc_id=<?php echo $id;?>&customer_username=<?php echo $_SESSION['c-user'];?>" class="btn btn-primary">order-now</a> -->
                    <form action="" method="POST">
                        <tr>
                            <td><input type="submit" name="submit" value="Order " class="btn btn-primary"></td>
                            <td><input type="number" name='Qty' class="input-responsive" placeholder="Enter Quantity"></td>
                        </tr>
                        

                    </form>
                    <?php

                    if(isset($_POST['submit']))

                    {
                        header('location:'.SITEURL.'front-end/food-section.php');
                        $username =$_SESSION['c-user'];
                        $qty = $_POST['Qty'];

                        /*Getting info about item*/
                        $sql = "SELECT * FROM accessories WHERE id=$id";

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
                            $total = $price*$qty;
                            $status ='ordered';

                            $sql3 = "INSERT INTO cart SET
                           item ='$title',
                           price=$price,
                           quantity=$qty,
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

                }
                else{
                    $_SESSION['unauthorized']="<div class='error'>Please Login to place order</div>";
                    ?>
                   
                    <a href="<?php echo SITEURL;?>front-end/customer_login.php?page_link=<?php echo 'accessories.php'?>" class="btn btn-primary">order-now</a>
                    <?php
                }
                
                ?>



                
            </div>
        </div>
        <?php

      }
  }
  else{
      echo "<div class='error'>accessory not avaialble</div>";
     
  }
  ?>
    </div>
</section>










<?php

include('partials-front/front-footer.php');


?>