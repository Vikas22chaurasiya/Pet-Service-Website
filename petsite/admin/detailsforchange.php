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
        <h1 class="text-center"> Enter your credentials to verify</h1>
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

          Email:<br>
          <input type="email" name="email" placeholder="enter email"><br><br>

          contact:<br>
          <input type="tel" name="contact" placeholder="enter phone number"><br><br>

          security word:<br>
          <input type="text" name="word" placeholder="Enter your security word"><br><br>

         
          <input type="submit" name="submit" value="verify" class=" button btn-primary">

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
    $username = $_POST['username'];
   $email = $_POST['email'];
   $contact = $_POST['contact'];
   $word = $_POST['word'];

    //2.sql to check whether usernameand password exist or not
    $sql = "SELECT * FROM admin WHERE username='$username'";

    //3.execute the query
    $res = mysqli_query($conn,$sql);

    //4.count rows to check whether the user exist or not
    $count = mysqli_num_rows($res);
    $rows = mysqli_fetch_assoc($res);
    

    

    if($count==1 && $rows['email']==$email && $rows['contact_no']==$contact && $rows['sec_word']==$word)
    {


         header("location:".SITEURL.'admin/password_reset.php');

    }
    else{
        $_SESSION['login']="<div class='error text-center'>Entered details are not correct</div>";
      header("location:".SITEURL.'admin/login.php');
    }
    }
?>