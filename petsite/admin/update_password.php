<?php include('partials/menu.php') ?>


<div class="main-content">
    <div class="wrapper">
 <h1>change password</h1>
    <br><br>

    <?php
    
    if(isset($_GET['id']))
    {
        $id =$_GET['id'];
    }
    
    
    
    ?>

    <form action="" method="POST">       <!-- post so that info is hidden action is blank as we are wrting php code in same page -->           
    
    <table class="table-30">
     <tr>
         <td>current password : </td>
         <td><input type="password" name="current_password" placeholder="old password"></td>
      </tr>

      <tr>
         <td>New password : </td>
         <td><input type="password" name="new_password" placeholder="new password"></td>
     </tr>
   
     <tr>
         <td>confirm password : </td>
         <td><input type="password" name="confirm_password" placeholder="confirm password"></td>
     </tr>

     <tr>
         <td colspan="2">
             <input type="hidden" name="id" value="<?php echo $id;?>">
             <input type="submit" name="submit" value="change password" class="btn-secondary">
         </td>
    </tr>

 </table>

</form>
    </div>
</div>

<?php

//check whether submit button is clicked or not
if(isset($_POST['submit']))
{
    //1.get data from form
    $id =$_POST['id'];
    $current_password =md5($_POST['current_password']);
    $new_password = md5($_POST['new_password']);
    $confirm_password = md5($_POST['confirm_password']);

    //2.check whether user withn current id and password exists or not;
    $sql ="SELECT * FROM admin WHERE id=$id AND password = '$current_password'"; //id is integer so does not need single quotes.

    //execute query
    $res = mysqli_query($conn,$sql);

    if($res == true)
    {
     // check whether data is available or not
     $count = mysqli_num_rows($res);

     if($count ==1)
       {
         //user exists
         //check whether the new password and confirm password match or not.
         if($new_password==$confirm_password)
         {
             //update password
             $sql2 = "UPDATE admin SET
              password='$new_password'
              WHERE id=$id";

              //exeexecute the query
              $res2 = mysqli_query($conn,$sql2);

              //check whether query executed or not.
              if($res2 == true)
              {
                $_SESSION['change-pwd'] = "<div class='success'> password changed successfully.</div>";
                header("location:".SITEURL.'admin/manage_admin.php');
              }
              else{

                $_SESSION['change-pwd'] = "<div class='error'> failed to change password.</div>";
                header("location:".SITEURL.'admin/manage_admin.php');
              }
            
         }
         else{

            //redirect to admin page
            $_SESSION['password-not-matched'] = "<div class='error'> password did not match.</div>";
            header("location:".SITEURL.'admin/manage_admin.php');
            }
       }   
     }
     else{
         //user does not exist
         $_SESSION['user-not-found'] = "<div class='error'> user not found.</div>";
         header("location:".SITEURL.'admin/manage_admin.php');
     }
    
    //3. check whether new and confirm password match or not.
}

?>

<?php include('partials/footer.php');?>