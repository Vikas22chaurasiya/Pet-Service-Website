<?php 
include('partials-front/front-menu.php');
?>



<div class="login-page">
      <div class="form">
        <div class="login">
        <div class="login-header">
        <h1 class="text-center"> Customer signup</h1>
        </div>
        </div>
        <br><br>
     <?php
        if(isset($_SESSION['confirm-pass']))//checked whether session is set or not.
        {

          echo $_SESSION['confirm-pass'];     //displaying session message
          unset($_SESSION['confirm-pass']); // removing session message
      
        }

        if(isset($_SESSION['username-n-al']))//checked whether session is set or not.
        {

          echo $_SESSION['username-n-al'];     //displaying session message
          unset($_SESSION['username-n-al']); // removing session message
      
        }
        ?>

        <!-- form starts here -->
         
        <form action="" method="POST" class="login-form text-center">
        <span>Full name:</span><br>
          <input type="text" name="full_name" placeholder="enter Full_name"><br><br>

        <span> USername :</span><br>
          <input type="text" name="username" placeholder="enter username"><br><br>

          <span>Password :</span><br>
          <input type="password" name="password" placeholder="enter password"><br><br>

         <span> Confirm password:</span> <br>
          <input type="password" name="confirm_password" placeholder="confirm  password"><br><br>

          <span>Security word:</span> <br>
          <input type="text" name="word" placeholder="Enter your security word"><br><br>

         <span>Contact no:</span> <br>
          <input type="tel" name="contact" placeholder="enter contact no"><br><br>

          <span>Email :</span><br>
          <input type="email" name="email" placeholder="enter email id"><br><br>

          <span>address:</span><br>
          <input type="address" name="address" placeholder="enter address"><br><br>




         
          <input type="submit" name="submit" value="Sign up" class=" button btn-primary">

        </form>
         <!-- form ends here -->
        
    </div>
    </div>

    


<?php 


if(isset($_POST['submit']))
{

    //process for login
    //1.get data fronm login form
    $full_name =$_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $confirm_password=md5($_POST['confirm_password']);
    $contact  = $_POST['contact'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $word =$_POST['word'];


    $sqls = "SELECT * FROM customer";
    $ress = mysqli_query($conn,$sqls);
    $condition = true;
    
    if($ress==true)
    {
        $count = mysqli_num_rows($ress);
       if($count >0)
       {
      
            while($rows=mysqli_fetch_assoc($ress))
           {

               $user = $rows['username'];

               if($user==$username)
               {
                $condition=false;
               }
            }
          }
    }


   if ($condition)
   {
       if($password==$confirm_password)
       {
    //2.sql query to save data
    $sql = "INSERT INTO customer SET
          full_name ='$full_name',
          username='$username',
          password='$password',
          contact_no=$contact,
          address='$address',
          email ='$email',
          sec_word='$word'
          ";

//3.execute query and save data in database
$res = mysqli_query($conn,$sql) or die(mysqli_error($conn));
       }
       else{
        $_SESSION['confirm-pass'] = "<div class='error'> Confirm pass does not match</div>";
        header("location:".SITEURL.'front-end/customer_signup.php');

       }

//4. check whether the query is executed or not nad display appropriate message.

if($res==TRUE)
{
   // echo "Data insertes successfully";
   //create a session variable to display msg
   $_SESSION['add'] = "<div class='text-center'>Account successfully created</div>";
   //redirect page to manage admin 
   //header('location:'.SITEURL.'front-end/homepage.php'); // dot is used to concatenate
   ?>
      <script>
      window.location.href="<?php echo SITEURL.'front-end/homepage.php' ?>";
      </script>
      <?php

}
else
{
    //echo "Failed to insert data";
    //create a session variable to display msg
   $_SESSION['add'] = "failed to add admin";
   //redirect page to manage admin 
   header("location:".SITEURL.'front-end/customer_signup.php'); // dot is used to concatenate

}
   }

   else{
    $_SESSION['username-n-al'] = "username not available";
    //redirect page to manage admin 
    header("location:".SITEURL.'front-end/customer_signup.php');

   }
}




?>

    
