<?php include('partials/menu.php');?>

<div class="main-content">
    <div class="wrapper"><h1>Update admin</h1>

    <br><br>

    <?php 
    //1.get id of selected admin.
    $id=$_GET['id'];
    //2.create sql query to get the detail.
    $sql="SELECT * FROM admin WHERE id=$id";

    //execute the query
    $res = mysqli_query($conn,$sql);

    //check whetherb query is executed or not
    if($res==true)
    {

        //check whether data is available or not.
        $count = mysqli_num_rows($res);
        //check whether we have admin data or not
        if($count==1) // this to prevent hacking of system
        {
               //get details
               //echo "admin available";
               $row=mysqli_fetch_assoc($res);
               $full_name = $row['full_name'];
               $username =$row['username'];
               $email =$row['email'];
               $contact =$row['contact_no'];
        }
        else{
            //redirect to manage admin page.
            header("location:".SITEURL.'admin/manage_admin.php');
        }
    }
   
    
    ?>
    <form action="" method="POST">       <!-- post so that info is hidden -->           
    
    <table class="table-30">
     <tr>
         <td>Full name:</td>
         <td><input type="text" name="full_name" value="<?php echo $full_name; ?>"></td>
      </tr>

      <tr>
         <td>username: </td>
         <td><input type="text" name="username" value="<?php echo $username;?>"></td>
     </tr>

     <tr>
         <td>email: </td>
         <td><input type="email" name="email" value="<?php echo $email;?>"></td>
     </tr>

     <tr>
         <td>contact: </td>
         <td><input type="tel" name="contact" value="<?php echo $contact;?>"></td>
     </tr>


     <tr>
         <td colspan="2">
             <input type="hidden" name="id" value="<?php echo $id;?>">
             <input type="submit" name="submit" value="update Admin" class="btn-secondary">
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
  //get all values from to update;
  $id = $_POST['id'];
  $full_name = $_POST['full_name'];
  $username = $_POST['username'];
  $email =$_POST['email'];
  $contact=$_POST['contact'];

  //create sql query to update admin
  $sql = "UPDATE admin SET
          full_name ='$full_name',
          username = '$username',
          email = '$email',
          contact_no = $contact
          WHERE id='$id'
          ";

    // execute the query
   $res = mysqli_query($conn,$sql);

   //check if query is executed successfully or not
   if($res==true)
   {
       $_SESSION['update']="<div class='success'>Admin updated successfully.</div>";

       //redirect to manage admin page.
       header("location:".SITEURL.'admin/manage_admin.php');
   }
   else{
    $_SESSION['update']="<div class='error'>Failed to update admin.</div>";

    //redirect to manage admin page.
    header("location:".SITEURL.'admin/update_admin.php');
   }
}




?>

<?php include('partials/footer.php');?>