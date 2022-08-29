<?php include('partials/menu.php') ?>

      <!-- content section starts -->
      <div class="main-content">
          <div class="wrapper">
          <h1>DASHBOARD</h1>
          <br><br>
        <?php
           if(isset($_SESSION['login']))//checked whether session is set or not.
           {

              echo $_SESSION['login'];     //displaying session message
              unset($_SESSION['login']); // removing session message
      
            }
        ?>
        <br><br>

          <div class="col-4 text-center">
          <?php
              $sql = "SELECT * FROM category";

              $res = mysqli_query($conn,$sql);

              $count = mysqli_num_rows($res);
              
              ?>
              <h1><?php echo $count;?></h1>
              <br>
              categories
          </div>

          <div class="col-4 text-center">
          <?php
              $sql2 = "SELECT * FROM food";

              $res2 = mysqli_query($conn,$sql2);

              $count2 = mysqli_num_rows($res2);
              
              ?>
             
              <h1><?php echo $count2;?></h1>
              <br>
              foods
          </div>

          <div class="col-4 text-center">
          <?php
              $sql3 = "SELECT * FROM tbl_order";

              $res3 = mysqli_query($conn,$sql3);

              $count3 = mysqli_num_rows($res3);
              
              ?>
         
              <h1><?php echo $count3;?></h1>
              <br>
              orders
          </div>

          

          <div class="col-4 text-center">

          <?php
              $sql4 = "SELECT SUM(total) AS total FROM tbl_order WHERE status='Delivered'";

              $res4 = mysqli_query($conn,$sql4);

              $row = mysqli_fetch_assoc($res4);
              
              $total_revenue = $row['total'];

              ?>
              <h1><?php echo $total_revenue;?></h1>
              <br>
              revenue generated
          </div>

          <div class="col-4 text-center">
              <h1>5</h1>
              <br>
              accessories
          </div>
          <div class="clearfix"></div>
          </div>
         
      </div>
    <!-- content section ends -->

<?php include('partials/footer.php')?>