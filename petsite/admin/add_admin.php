<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add admin</h1>

        <br><br>

        <?php
          
          if(isset($_SESSION['add']))//checked whether session is set or not.
        {

          echo $_SESSION['add'];     //displaying session message
          unset($_SESSION['add']); // removing session message
      
        }

        if(isset($_SESSION['username-n-al']))
        {
 
          echo $_SESSION['username-n-al'];     //displaying session message
          unset($_SESSION['username-n-al']); // removing session message
      
        } 

        ?>
        <form action="" method="POST">       <!-- post so that info is hidden -->           
    
        <table class="table-30">
         <tr>
             <td>full name:</td>
             <td><input type="text" name="full_name" placeholder="enter your name"></td>
          </tr>

          <tr>
             <td>user name: </td>
             <td><input type="text" name="username" placeholder="enter username"></td>
         </tr>

         <tr>
             <td>password: </td>
             <td><input type="text" name="password" placeholder="enter password"></td>
         </tr>

         <tr>
             <td>email: </td>
             <td><input type="email" name="email" placeholder="enter password"></td>
         </tr>

         <tr>
             <td>contact: </td>
             <td><input type="tel" name="contact" placeholder="enter password"></td>
         </tr>

         <tr>
             <td>security word: </td>
             <td><input type="text" name="word" placeholder="enter security word"></td>
         </tr>

         <tr>
             <td colspan="2">
                 <input type="submit" name="submit" value="Add Admin" class="btn-secondary"></input>
             </td>
        </tr>

     </table>

    </form>
    </div>
</div>

<?php include('partials/footer.php');
?>


<?php

if(isset($_POST['submit']))
{
   //1.get data from here
    $full_name =$_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);  //password encryption with md5
    $email = $_POST['email'];
    $contact =$_POST['contact'];
    $word = $_POST['word'];


    //check whther username is available or not
    $sqls = "SELECT * FROM admin";
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

    //2.sql query to save data
    $sql = "INSERT INTO admin SET
          full_name ='$full_name',
          username='$username',
          password='$password',
          email='$email',
          contact_no='$contact',
          sec_word='$word'
          ";

//3.execute query and save data in database
$res = mysqli_query($conn,$sql) or die(mysqli_error($conn));

//4. check whether the query is executed or not nad display appropriate message.

if($res==TRUE)
{
   // echo "Data insertes successfully";
   //create a session variable to display msg
   $_SESSION['add'] = "Admin added successfully";
   //redirect page to manage admin 
   header("location:".SITEURL.'admin/manage_admin.php'); // dot is used to concatenate

}
else
{
    //echo "Failed to insert data";
    //create a session variable to display msg
   $_SESSION['add'] = "failed to add admin";
   //redirect page to manage admin 
   header("location:".SITEURL.'admin/add_admin.php'); // dot is used to concatenate

}
   }

   else{
    $_SESSION['username-n-al'] = "username not available";
    //redirect page to manage admin 
    header("location:".SITEURL.'admin/add_admin.php');

   }
}




?>