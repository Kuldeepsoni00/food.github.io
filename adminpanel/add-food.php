<?php include('partial/menu.php'); ?>
<div class="container">
    <div class="wrapper">
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl_30">
   <tr>
       <td>Title</td>
       <td><input type="text" name="title"></td>
   </tr>
   <tr><td>Description</td>
       <td><textarea name="decrip" cols="30 " rows="5"></textarea></td></tr>
   <tr>
   <td>Price</td>
       <td><input type="text" name="price"></td>
   </tr>
   <tr>
   <td>Image</td>
       <td><input type="file" name="image"></td>
   </tr>
   <tr>
   <td>Category</td>
       <td>
    <select name="category">
        <?php
        
        $query="select * from tbl_category where active='yes'";
        $res=mysqli_query($conn,$query);
        if($res){
            $count=mysqli_num_rows($res);
            if($count>0){
            while($data=mysqli_fetch_assoc($res)){
            $id=$data['id'];
            $title=$data['title'];
            ?>
            <option value="<?php echo $id ?>"><?php echo $title?></option>
            <?php
            }
        }
            else{
                echo "No Data Found";
            }
        }
        else{
            echo "Not Found Data";
        }
        
        
        ?>
</select>
</td>
   </tr>
   <tr>
   <td>Featured</td>
       <td>
       <input type="radio" name="fea" value="yes">yes
       <input type="radio" name="fea" value="no">no
    </td>
   </tr>
   <tr>
   <td>Active</td>
       <td><input type="radio" name="act" value="yes">yes
       <input type="radio" name="act" value="no">no</td>
   </tr>
   <tr>
       <td colspan="2">
       <input type="submit" name="submit" value="Add Food" class="btn-secondary">
       </td>
   </tr>
        </table>
       
</form>
</div>
</div>
<?php include('partial/footer.php'); ?>
<?php

if(isset($_POST['submit'])){

$title=$_POST['title'];
$descrip=$_POST['decrip'];
$price=$_POST['price'];
$catego=$_POST['category'];
$fea=$_POST['fea'];
$act=$_POST['act'];
//niche vala if not good not required
if(isset($_FILES['image']['name'])){
$imagename=$_FILES['image']['name'];
if($imagename!=""){
$ext=end(explode('.',$imagename));
$imagepath=$_FILES['image']['tmp_name'];
$imagename="FOOD-FOLDER_".rand(000,999).'.'.$ext;
$destination="../images/food/".$imagename;
$path=move_uploaded_file($imagepath,$destination);
if(!$path){
    $_SESSION['foodim']="<div class='error'>Image Not Upload</div>";
    header("location:".SITEURL."adminpanel/manage-food.php");
}
}
else{
    $imagename="";
}

}
else{
    $_SESSION['foodim']="<div class='error'>Image Not Upload</div>";
    header("location:".SITEURL."adminpanel/manage-food.php");
}
$query2="insert into tbl_food(title,description,price,image_name,category_id,featured,active)values('$title','$descrip','$price','$imagename','$catego','$fea','$act')";
$res2=mysqli_query($conn,$query2);
if($res2){
    $_SESSION['foodins']="<div class='success'>Data Added successfully</div>";
    header("location:".SITEURL."adminpanel/manage-food.php");
}
else{
    $_SESSION['foodins']="<div class='error'>Data Not Add</div>";
    header("location:".SITEURL."adminpanel/manage-food.php");
}
}




?>