<?php include('../config/constants.php');?>
<?php
if(isset($_GET['id']) && isset($_GET['imagename'])){
$id=$_GET['id'];
$imgnam=$_GET['imagename'];
$query="select * from tbl_food where id=$id";
$res=mysqli_query($conn,$query);
if($res){
$count=mysqli_num_rows($res);
if($count==1){
$query2="delete from tbl_food where id=$id";
$res2=mysqli_query($conn,$query2);
if($res){

    $path="../images/food/".$imgnam;
    $delim=unlink($path);
    if(!$delim){
        $_SESSION['defod']="<div class='error'>Image Not Deleted</div>";
        header("location:".SITEURL."adminpanel/manage-food.php");
    }
    $_SESSION['defod']="<div class='success'>Data Deleted Successfully</div>";
    header("location:".SITEURL."adminpanel/manage-food.php");
    }
}
else{
    $_SESSION['defod']="<div class='error'>Data Not Deleted</div>";
    header("location:".SITEURL."adminpanel/manage-food.php");
}

}
else{
    $_SESSION['defod']="<div class='error'>Data Not Deleted</div>";
    header("location:".SITEURL."adminpanel/manage-food.php");

}
}
else{
    $_SESSION['defod']="<div class='error'>Data Not Deleted</div>";
    header("location:".SITEURL."adminpanel/manage-food.php");
}





?>