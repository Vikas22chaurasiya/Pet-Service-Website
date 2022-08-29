<?php
include('../config/constants.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login pet service website</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>

     
    <div class="login-page">
      <div class="form">
        <div class="login">
        <div class="login-header">
        <h1 class="text-center"> Admin login</h1>
        </div>
        </div>
        <br>
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
        ?>
        <br>

        <!-- form starts here -->
         
        <form action="" method="POST" class=" login-form text-center">
        user name:<br>
          <input type="text" name="username" placeholder="enter username"><br><br>

          password:<br>
          <input type="password" name="password" placeholder="enter password"><br><br>

         
          <input type="submit" name="submit" value="Login" class=" button btn-primary">

        </form>

        <div class="forgot-pass">
  <a href="<?php echo SITEURL;?>admin/detailsforchange.php">forgot password?</a>
</div>

      </div>
    
    </div>
     
         <!-- form ends here -->
        
    







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
    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";

    //3.execute the query
    $res = mysqli_query($conn,$sql);

    //4.count rows to check whether the user exist or not
    $count = mysqli_num_rows($res);

    if($count==1)
    {
        //user availble
        //login success
        $_SESSION['login']="<div class='success'>Login successful</div>";
        $_SESSION['user']= $username;   //to check whether user logged in or not. logout will unset it.



        header("location:".SITEURL.'admin/');

    }
    else{
        $_SESSION['login']="<div class='error text-center'>username or password did not match</div>";
        header("location:".SITEURL.'admin/login.php');
    }
}
?>