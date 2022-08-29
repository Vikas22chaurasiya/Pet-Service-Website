<?php 
include('partials-front/front-menu.php');
?>


<?php

if(isset($_GET['username']))
{
    $username = $_GET['username'];
}

?>

     
    <div class="login-page">
      <div class="form">
        <div class="login">
        <div class="login-header">
        <h1 class="text-center"> Reset password</h1>
        </div>
        </div>
        <br>
        <?php
        if(isset($_SESSION['login']))//checked whether session is set or not.
        {

          echo $_SESSION['login'];     //displaying session message
          unset($_SESSION['login']); // removing session message
      
        }

        
        ?>
       
        <br>

        <!-- form starts here -->
         
        <form action="" method="POST" class=" login-form text-center">
        new password:<br>
          <input type="password" name="new_password" placeholder="enter password"><br><br>

          confirm password:<br>
          <input type="password" name="confirm_password" placeholder="confirm password password"><br><br>

         
          <input type="submit" name="submit" value="Reset password" class=" button btn-primary">

        </form>

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
    $new_password = md5($_POST['new_password']);
    $confirm_password =md5($_POST['confirm_password']);

    //2.sql to check whether usernameand password exist or not

    if($new_password==$confirm_password)
    {
    $sql = "UPDATE customer SET
            password = '$new_password' 
            WHERE username='$username'";

    //3.execute the query
    $res = mysqli_query($conn,$sql);

    


    if($res==1)
    {
        $_SESSION['user']= $username;
        $_SESSION['login']="<div class='success'>password successfully changed for $username</div>";
          //to check whether user logged in or not. logout will unset it.



        header("location:".SITEURL.'admin/customer_login.php');

    }
    else{
        $_SESSION['login']="<div class='error text-center'>password change failed</div>";
        header("location:".SITEURL.'admin/customer_login.php');
    }
}
else{
    $_SESSION['login']="<div class='error text-center'>confirm and new password does not match</div>";
    header("location:".SITEURL.'admin/customer_login.php');

}
}
?>