
<?php 
include('partials-front/front-menu.php');


?>



<section class="categories">
            <div class="container">
        <br><br>
        <h3 class='text-center'>Categories</h3>
        <br>

  <?php
  $sql = "SELECT * FROM category WHERE active='yes' AND featured='yes'";

  $res = mysqli_query($conn,$sql);

  $count = mysqli_num_rows($res);

  if($count > 0)
  {
      while($row=mysqli_fetch_assoc($res))
      {
        $id = $row['id'];
        $title = $row['title'];
        $image_name = $row['image_name'];
        ?>
  
        <a href="<?php echo SITEURL;?>front-end/food-on-cat.php?category_id=<?php echo $id;?>">
            <div class="col-lg-3 images-tiles">
                <?php

                if($image_name=="")
                {
                    echo "<div class='error'>image not available</div>";
                }
                else{
                    ?>
                    <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name;?>" alt="" class="img-responsive img-rounded">
                    <h3 class="text-center"> <?php echo $title;?></h3>
                    
                    <?php
                }
                ?>
            </div>
                
        </a>
  
  
  
        <?php

      }
  }
  else{
      echo "<div class='error'>Category not added</div>";
     
  }
  ?>
    </div>
</section>






<?php

include('partials-front/front-footer.php');


?>