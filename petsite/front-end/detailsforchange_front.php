<?php 
include('partials-front/front-menu.php');
?>

     
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
          <input type="text" name="word" placeholder="enter your security word"><br><br>

         
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
    $sql = "SELECT * FROM customer WHERE username='$username'";

    //3.execute the query
    $res = mysqli_query($conn,$sql);

    //4.count rows to check whether the user exist or not
    $count = mysqli_num_rows($res);
    $rows = mysqli_fetch_assoc($res);
    $otp = 123;

    

    if($count==1 && $rows['email']==$email && $rows['contact_no']==$contact && $rows['sec_word']==$word)
    {


  // $to_email = $email;
  // $subject = "Simple Email Test via PHP";
  // $body = "
  // click the given link to reset password
  
  // --->    http://localhost/petsite/front-end/password_reset_front.php?username=$username        <----";
   
  // if (mail($to_email, $subject, $body, $headers)) {
  //     echo "Email successfully sent to $to_email...";
  // } else {
  //     echo "Email sending failed...";
  // }


         header("location:".SITEURL.'front-end/password_reset_front.php?username='.$username);

    }
    else{
        $_SESSION['login']="<div class='error text-center'>username or password did not match</div>";
      header("location:".SITEURL.'front-end/detailsforchange_front.php');
    }
    }
?>