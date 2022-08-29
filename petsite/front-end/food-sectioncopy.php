
<?php 
include('partials-front/front-menu.php');


?>



<section class="food-menu">
    <div class="container">
        <br><br>
        <h3 class='text-center'>Foods</h3>
        <br>
  <?php
  $sql = "SELECT * FROM food WHERE active='yes'";

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
                    <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name; ?>" alt="" class="img-responsive img-rounded">
                    <?php

                }
                ?>

            
            </div>
            <div class="food-menu-desc">
                <h4><?php echo $title;?></h4>
                <p class="food-price"><?php echo $price;?></p>
                <p class="food-detail"><dfn data-info="<?php echo $description;?>"><i class="fa-solid fa-info"></dfn></i></p>

                <?php
                if(isset($_SESSION['c-user']))
                {
                    ?>
                    <a href="<?php echo SITEURL;?>front-end/order.php?food_id=<?php echo $id;?>&customer_username=<?php echo $_SESSION['c-user'];?>" class="btn btn-primary">order-now</a>
                   
                    <?php


                }
                else{
                    $_SESSION['unauthorized']="<div class='error'>Please Login to place order</div>";
                    ?>
                   
                    <a href="<?php echo SITEURL;?>front-end/customer_login.php?page_link=<?php echo 'food-section.php'?>" class="btn btn-primary">order-now</a>
                    <?php
                }
                
                ?>
                
               
            </div>
        </div>
        <?php

      }
  }
  else{
      echo "<div class='error'>food not avaialble</div>";
     
  }
  ?>
    </div>
</section>






<?php

include('partials-front/front-footer.php');


?>