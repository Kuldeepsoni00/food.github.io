<?php include('partial/menu.php'); ?>
<div class="main_content">
    <div class="wrapper">
        <h1>Add Admin</h1>
      
                <form action="" method="POST">
        <table class="tbl_30">
            <tr>
                <td>Full Name:</td>
               <td> <input type="text" name="full_name" placeholder="Enter Your Name" ></td>
            </tr>
            <tr>
                <td>Add UserName:</td>
                <td><input type="text" name="usernameadd" placeholder="Enter UserName" ></td>
            </tr>
            <tr>
                <td>Add Password:</td>
                <td><input type="password" name="passwordadd" placeholder="Enter Password"></td>
            </tr>
            <tr>
                <td colspan="2">
             <input type="submit" name="submit" value="Add Admin" class="btn-primary"></td>
            </tr>
            
        </table>
    </form>
    </div>
   
   
</div>
<?php include('partial/footer.php'); ?>
<?php
if(isset($_POST['submit'])){
    

    $firstname=$_POST['full_name'];
     $username=$_POST['usernameadd'];
     $password=$_POST['passwordadd'];
    $quy="INSERT into tbl_admin(fullname,username,password)values('$firstname','$username','$password')";
   $exe=mysqli_query($conn,$quy) or die(mysqli_error());
  if($exe){
     
    $_SESSION['add']="<div class='success'> Data Added Sucessfully</div>";
    header("location:".SITEURL."adminpanel/manage-admin.php");
  }
  else{
  $_SESSION['add']="<div class='error'> Data Not Added Sucessfully</div>";
  header("location:".SITEURL."adminpanel/add-admin.php");
}
}



?>
