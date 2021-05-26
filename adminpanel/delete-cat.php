<?php include('partial/menu.php'); ?>
<?php 
if(isset($_GET['id']) && isset($_GET['image_name'])){
if($_GET['image_name']!=""){
$id=$_GET['id'];
$image_name=$_GET['image_name'];
$query="delete from tbl_category where id=$id";
$res=mysqli_query($conn,$query);
$path="../images/category/$image_name";
print_r($path);
$imde=unlink($path);
if(!$imde){
    $_SESSION['imnot']="<div class='error'>Image Is Not Delete</div>";
   header("location:".SITEURL."adminpanel/manage-category.php");
}
if($res){
    $_SESSION['delcat']="<div class='success'>Deleted Successfully</div>";
    header("location:".SITEURL."adminpanel/manage-category.php");
}
else{
    $_SESSION['delcat']="<div class='error'>Not Deleted</div>";
    header("location:".SITEURL."adminpanel/manage-category.php");
}
}
else{
    $id=$_GET['id'];
    $query="delete from tbl_category where id=$id";
    $res=mysqli_query($conn,$query);
    if($res){
        $_SESSION['delcat']="<div class='success'>Deleted Successfully</div>";
        header("location:".SITEURL."adminpanel/manage-category.php");
    }
    else{
        $_SESSION['delcat']="<div class='error'>Not Deleted</div>";
        header("location:".SITEURL."adminpanel/manage-category.php");
    }
}
}
else{
    header("location:".SITEURL."adminpanel/login.php");
}

?>