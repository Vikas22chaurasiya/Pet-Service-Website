<?php
include('partials-front/front-menu.php');

?>

<?php

if(isset($_SESSION['order']))
{

  echo $_SESSION['order'];     //displaying session message
  unset($_SESSION['order']); // removing session message

} 

if(isset($_SESSION['plan-order']))
{

  echo $_SESSION['plan-order'];     //displaying session message
  unset($_SESSION['plan-order']); // removing session message

} 

if(isset($_SESSION['add']))
{

  echo $_SESSION['add'];     //displaying session message
  unset($_SESSION['add']); // removing session message

} 

if(isset($_SESSION['login']))
{

  echo $_SESSION['login'];     //displaying session message
  unset($_SESSION['login']); // removing session message

} 




?>


  <div id="main-content" class="container-fluid">
    <div class="jumbotron">
      <div class="bgimg"><img src="image/dog_puppy.webp" alt="home picture" class="img-responsive">
        <div class="bottomwave"><img src="image/bottom_wave.png" alt="home picture"></div>
        <div class="homedes">
        <h1> <span>Hi!!</span> welcome to our pet service site </h1>
        <a href="<?php echo SITEURL;?>front-end/foodcategory.php" class="button">shop now</a>
       </div>
        </div></div>
         
        <div class="row">
        <div class="company col-lg-6 col-sm-12">
        <img src="image/about_img.png" alt="home picture" class="img-responsive">
        </div>
        <div class="companydes col-sm-12 text-left"><h3>premium <span>pet food</span> manufacturer</h3>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Voluptatum sint, dolore perspiciatis iure consequuntur eligendi quaerat vitae shaikh anas. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia perspiciatis, dolore odio exercitationem natus doloribus, in corporis quis nemo vel ab ea ducimus fuga rem cupiditate animi deleniti eum dolorem similique.</p>
        <a href="#" class="button">read more</a></div>

        </div>
      

      <div class="petfood row">
        <div class="petdes"><h3>Air Dried <span> Cat Food</span></h3><p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Incidunt laudantium dolorem qui voluptas provident,</p> 
        <div class="amount">Rs 100.00 - Rs 1000.00</div>
        <a href="<?php echo SITEURL;?>front-end/food-on-cat.php?category_id=31"> <img src="image/shop_now_cat.png" alt=""> </a>
      </div>
        <div class="petimage"><img src="image/cat_food_300px.png" alt="Certified" class="img-responsive"></div>  
      </div>

      <div class="petfood row">
        <div class="petimage" ><img src="image/dog_food_300.png" alt="Certified" class="img-responsive"></div>
        <div class="petdes"><h3>Air Dried <span> Dog Food</span></h3><p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Incidunt laudantium dolorem qui voluptas provident,</p>
        <div class="amount">Rs 100.00 - Rs1000.00</div>
        <a href="<?php echo SITEURL;?>front-end/food-on-cat.php?category_id=29"> <img src="image/shop_now_dog.png" alt=""> </a>
      </div>
        
      </div>

    <div id="home-tiles" class="">
      <div class="col-md-4 col-sm-6 col-xs-12">
        <a href="<?php echo SITEURL;?>front-end/food-section.php"><div id="menu-tile"> <span>foods</span></div></a>
      </div>

      <div class="col-md-4 col-sm-6 col-xs-12">
        <a href="accessories.php"><div id="specials-tile"><span>accessories</span></div></a>
      </div>
      <div class="col-md-4 col-sm-6 col-xs-12"  id="tile3">
      <a href="tips.php"><div id="tips-tile"><span>tips</span> </div></a>
      </div>
  
    </div>
    </div>


<!--  
    <div id="myCarousel" class="carousel slide" data-ride="carousel">

  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
    <li data-target="#myCarousel" data-slide-to="4"></li>
  </ol> -->

  <!-- Wrapper for slides -->
  <!-- <div class="carousel-inner">
    <div class="item active">
      <img src="image/a.jpg" alt="dog and cat">
    </div>

    <div class="item">
      <img src="image/b.jpeg" alt="dog">
    </div>

    <div class="item">
      <img src="image/c.jpeg" alt="cat">
    </div>

    <div class="item">
      <img src="image/d.jpeg" alt="cat">
    </div>

    <div class="item">
      <img src="image/e.jpeg" alt="cat">
    </div>


  </div>

  
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>  -->





    <div class="services" id="services">
    <h1 class="heading text-center"> our <span>services</span> </h1>
    <div class="box-container">

        <div class="box col-md-5 col-lg-3 col-sm-5 col-xs-11">
            <i class="fas fa-dog"></i>
            <h3>dog boarding</h3>
            <a href="#" class="button">read more</a>
        </div>

        <div class="box col-md-5 col-lg-3 col-sm-5 col-xs-11">
            <i class="fas fa-cat"></i>
            <h3>cat boarding</h3>
            <a href="#" class="button">read more</a>
        </div>

        <div class="box col-md-5 col-lg-3 col-sm-5 col-xs-11">
            <i class="fas fa-bath"></i>
            <h3>spa & grooming</h3>
            <a href="#" class="button">read more</a>
        </div>

        <div class="box col-md-5 col-lg-3 col-sm-5 col-xs-11">
            <i class="fas fa-drumstick-bite"></i>
            <h3>healthy meal</h3>
            <a href="#" class="button">read more</a>
        </div>

        <div class="box col-md-5 col-lg-3 col-sm-5 col-xs-11">
            <i class="fas fa-baseball-ball"></i>
            <h3>activity exercise</h3>
            <a href="#" class="button">read more</a>
        </div>

        <div class="box col-md-5 col-lg-3 col-sm-5 col-xs-11">
            <i class="fas fa-heartbeat"></i>
            <h3>health care</h3>
            <a href="#" class="button">read more</a>
        </div>

    </div>
</div>

    
<div class="plans" id="plans">

<h1 class="heading text-center"> choose a <span>plan</span> </h1>

<div class="box-container">

<div class="box-plans col-lg-3 col-sm-5 col-xs-11">
    <h2 class="title">pet care</h2>
    <h2 class="day"> 1 day </h2>
    <i class="fa-solid fa-paw"></i>
    <div class="list">
        <p> pet room <span class="glyphicon glyphicon-ok"></span> </p>
        <p> pet grooming <span class="glyphicon glyphicon-ok"></span> </p>
        <p> pet exercise <span class="glyphicon glyphicon-ok"></span> </p>
        <p> pet meals <span class="glyphicon glyphicon-ok"></span> </p>
    </div>
    <div class="amount"><span>Rs.</span>1000</div>
    <a href="<?php echo SITEURL;?>front-end/chooseplan.php?plan=<?php echo 'pet care 1 day'?> & price=<?php echo '1000'?>" class="button"> choose plan </a>
</div>

<div class="box-plans col-lg-3 col-sm-5 col-xs-11">
    <h2 class="title">pet care</h2>
    <h2 class="day"> 10 days </h2>
    <i class="fa-solid fa-paw"></i>
    <div class="list">
        <p> pet room <span class="glyphicon glyphicon-ok"></span> </p>
        <p> pet grooming <span class="glyphicon glyphicon-ok"></span> </p>
        <p> pet exercise <span class="glyphicon glyphicon-ok"></span> </p>
        <p> pet meals <span class="glyphicon glyphicon-ok"></span> </p>
    </div>
    <div class="amount"><span>Rs.</span>7000</div>
    <a href="<?php echo SITEURL;?>front-end/chooseplan.php?plan=<?php echo 'pet care 10 day'?> & price=<?php echo '7000'?>" class="button"> choose plan </a>
</div>

<div class="box-plans col-lg-3 col-sm-5 col-xs-11">
    <h2 class="title">pet care</h2>
    <h2 class="day"> 30 days </h2>
    <i class="fa-solid fa-paw"></i>
    <div class="list">
        <p> pet room <span class="glyphicon glyphicon-ok"></span> </p>
        <p> pet grooming <span class="glyphicon glyphicon-ok"></span> </p>
        <p> pet exercise <span class="glyphicon glyphicon-ok"></span> </p>
        <p> pet meals <span class="glyphicon glyphicon-ok"></span> </p>
    </div>
    <div class="amount"><span>Rs.</span>17000</div>
    <a href="<?php echo SITEURL;?>front-end/chooseplan.php?plan=<?php echo 'pet care 30 day'?> & price=<?php echo '17000'?>" class="button"> choose plan </a>
</div>
</div>

</div>

<!-- plan section ends -->


<!-- 
<div class="feedback row">
    
   <div class="feedbackimg">
   <img src="image/transparentfeed.png">
</div>



</div> -->

<?php

include('partials-front/front-footer.php');


?>

