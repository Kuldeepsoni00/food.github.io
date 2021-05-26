<?php include('partial/menu.php'); ?>
<?php 
$id=$_GET['id'];
$query="delete from tbl_admin where id=$id";
$exe=mysqli_query($conn,$query);
if($exe){

    $_SESSION['dele']="<div class='success'> Data Deleted Sucessfully</div>";
    header("location:".SITEURL."adminpanel/manage-admin.php");

}
else{
    $_SESSION['dele']=" <div class='error'> Data Not Deleted</div>";
    header("location:".SITEURL."adminpanel/manage-admin.php");

}

?>