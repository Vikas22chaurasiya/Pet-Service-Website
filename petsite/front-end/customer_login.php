<?php 
ob_start();
include('partials-front/front-menu.php');
?>



<div class="login-page">
      <div class="form">
        <div class="login">
        <div class="login-header">
        <h1 class="text-center"> login</h1>
        </div>
        </div>
        
        <?php
        if(isset($_SESSION['login']))//checked whether session is set or not.
        {

          echo $_SESSION['login'];     //displaying session message
          unset($_SESSION['login']); // removing session message
      
        }

        if(isset($_SESSION['no-login-message']))//checked whether session is set or not.
        {

          echo $_SESSION['no-login-message'];     //displaying session message
          unset($_SESSION['no-login-message']); // removing session message
      
        }

        if(isset($_SESSION['unauthorized']))//checked whether session is set or not.
        {

          echo $_SESSION['unauthorized'];     //displaying session message
          unset($_SESSION['unauthorized']); // removing session message
      
        }
        ?>
        <br>

        <!-- form starts here -->
         
        <form action="" method="POST" class="login-form text-center">
        <span>user name:</span><br>
          <input type="text" name="username" placeholder="enter username"><br><br>

          <span>Password :</span><br>
          <input type="password" name="password" placeholder="enter password"><br><br>

         
          <input type="submit" name="submit" value="Login" class=" button btn-primary">

        </form>
         <!-- form ends here -->
        
         <div class="forgot-pass">
  <a href="<?php echo SITEURL;?>front-end/detailsforchange_front.php">forgot password?</a>
</div>
</div>

</div>
    
</body>
</html>

<?php 


if(isset($_POST['submit']))
{

    //process for login
    //1.get data fronm login form
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    //2.sql to check whether usernameand password exist or not
    $sql = "SELECT * FROM customer WHERE username='$username' AND password='$password'";

    //3.execute the query
    $res = mysqli_query($conn,$sql);

    //4.count rows to check whether the user exist or not
    $count = mysqli_num_rows($res);

    if($count==1)
    {
        //user availble
        //login success
        $_SESSION['login']="<div class='success text-center'>Login successful</div>";
        $_SESSION['c-user']= $username;   //to check whether user logged in or not. logout will unset it.
 
        if(isset($_GET['page_link']))
        {
          $link= $_GET['page_link'];
    
        header("location:".SITEURL.'front-end/'.$link);


        }
       else{

         header("location:".SITEURL.'front-end/homepage.php');
        }

    }
    else{
        $_SESSION['login']="<div class='error text-center'>username or password did not match</div>";
        header("location:".SITEURL.'front-end/customer_login.php');
    }
}
?>