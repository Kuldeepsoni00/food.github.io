<?php include('partial/menu.php'); ?>
<?php
$id=$_GET['id'];
$query="select * from tbl_admin where id=$id";
$re=mysqli_query($conn,$query);
if($re){
    $data=mysqli_fetch_assoc($re);
// $_SESSION['updata']="true";
// header("location:".SITEURL."adminpanel/add-admin.php?id=$id");
$count=mysqli_num_rows($re);
//$count=mysqli_num_rows($data) nahi kar sakte
if($count>0){
$fullname=$data['fullname'];
$usnamew=$data['username'];
$password=$data['password'];
?>
 <form action="" method="POST">
<table class="tbl_30">
<tr>
 <td>Full Name:</td>
<td> <input type="text" name="full_name" placeholder="Enter Your Name" value="<?php echo $fullname ?>"></td>
</tr>
<tr>
 <td>UserName:</td>
 <td><input type="text" name="username" placeholder="Enter UserName" value="<?php echo $usnamew ?>"></td>
</tr>
<tr>
 <td>Password:</td>
 <td><input type="password" name="password" placeholder="Enter Password" value="<?php echo $password ?>"></td>
</tr>
<tr>
 <td colspan="2">
<input type="submit" name="submit" value="Update Admin" class="btn-primary"></td>
</tr>

</table>
</form>
<?php


}
else{
    header("location:".SITEURL."adminpanel/manage-admin.php");
}
}

else{
    $_SESSION['notdata']="Data Not Found";
    header("location:".SITEURL."adminpanel/manage-admin.php");

}
?>
   <?php include('partial/footer.php'); ?>
   <?php
if(isset($_POST['submit'])){
    

    $firstname=$_POST['full_name'];
     $username=$_POST['username'];
     $password=$_POST['password'];
     
     
        $query="update tbl_admin set fullname='$firstname',username=' $username',password='$password' where id=$id";
        $exeu=mysqli_query($conn,$query) or die(mysqli_error());
        if($exeu){
     
            $_SESSION['add']="<div class='success'> Updates Sucessfully</div>";
            header("location:".SITEURL."adminpanel/manage-admin.php");
          }
          else{
          $_SESSION['add']="<div class='error'> Not update</div>";
          header("location:".SITEURL."adminpanel/add-admin.php");
        }
    }
    ?>
       
    