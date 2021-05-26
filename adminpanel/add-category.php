<?php include('partial/menu.php');?>
<div class="container">
<div class="wrapper">
<hi>Add Category</h1>
<!-- <form action="" method="POST" enctype="multipart/form-data" onsubmit="return(validate());"> ye bhi ker sakte hai validate name ka ek function 
bi bana sakte hai jquery mai-->
<form action="" method="POST" enctype="multipart/form-data">
    <table class="tbl_30">
        <tr>
            <td>Title</td>
            <td>
  <input type="text" name="title" placeholder="Enter Title">
</td>
        </tr>
        <tr>
            <td>Featured</td>
            <td>
  <input type="radio" name="featured" value="yes" >Yes
  <input type="radio" name="featured" value="no" >No
</td>
        </tr>
        <tr>
            <td>Active</td>
            <td>
                <input type="radio" name="active" value="yes" >Yes
                <input type="radio" name="active" value="no" >No
               </td>

        </tr>
        <tr>
            <td>Upload File</td>
            <td>
            <input id="file_category" type="file" name="image">
            </td>

        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" name="submit" id="cate_sub" value="submit" class="btn-secondary">
            </td>
        </tr>
    </table>
</form>
<script src="jscode/pass.js"></script>
</div>
</div>
<?php include('partial/footer.php');?>
<?php 
if(isset($_POST['submit'])){
    
$title=$_POST['title'];
$feat=$_POST['featured'];
$active=$_POST['active'];
if(isset($_FILES['image']['name'])){
   
    $imagename=$_FILES['image']['name'];
   if($imagename!=""){
   
    //if kuldeep.jpg than it will be kuldeep   jpg
    $ext=end(explode('.',$imagename));
    $imagename="FOOD_CATEGORY_".rand(000,999).'.'.$ext;
    $source_path=$_FILES['image']['tmp_name'];
    $destination_path="../images/category/".$imagename;
    $upload=move_uploaded_file($source_path,$destination_path);
    if($upload==false){
        $_SESSION['upload']="<div class='error'>File Not Upload</div>";
        header("location:".SITEURL."adminpanel/manage-category.php");
        die();
    }
}
else{
    $imagename="";
   
}

}
else{
    $imagename="";
   
}

$query="insert into tbl_category(title,featured,active,image_name)values('$title','$feat','$active','$imagename')";
$res=mysqli_query($conn,$query);

if($res){
    $_SESSION['add']="<div class='success'>Add Category Successfully</div>";
    header("location:".SITEURL."adminpanel/manage-category.php");
}
else{
    $_SESSION['add']="<div class='success'>Category Not Added</div>";
    header("location:".SITEURL."adminpanel/manage-category.php");

}




}




?>