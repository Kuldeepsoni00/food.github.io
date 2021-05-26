<?php include('partial/menu.php'); ?>
<div class="container" >
        <div class="wrapper">
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl_30">
                <?php
                if(isset($_GET['id'])){

                $id=$_GET['id'];
                $query="select * from tbl_food where id=$id";
                $res=mysqli_query($conn,$query);
                if($res){
                    $count=mysqli_num_rows($res);
                    if($count==1){
                        $data=mysqli_fetch_assoc($res);
                        $title=$data['title'];
                        $des=$data['description'];
                        $price=$data['price'];
                        $current_image=$data['image_name'];
                        $fea=$data['featured'];
                        $act=$data['active'];
                        $catego_id=$data['category_id'];
                    }
                    else{
                        $_SESSION['querr']="<div class='error'>Data Not Access<div>";
                    header("location:".SITEURL."adminpanel/manage-food.php");
                    die();
                    }
                }
                else{
                    $_SESSION['querr']="<div class='error'>Data Not Access<div>";
                    header("location:".SITEURL."adminpanel/manage-food.php");
                    die();
                }




                }
                else{
                    $_SESSION['unacc']="<div class='error'>Unauthorised Access<div>";
                    header("location:".SITEURL."adminpanel/manage-food.php");
                    die();
                }
                
                
                
                ?>
   <tr>
       <td>Title</td>
       <td><input type="text" name="title" value="<?php echo $title ?>"></td>
   </tr>
   <tr><td>Description</td>
       <td><textarea name="decrip" cols="30" rows="5"><?php echo $des ?></textarea></td></tr>
   <tr>
   <td>Price</td>
       <td><input type="text" name="price"  value="<?php echo $price ?>"></td>
   </tr>
   <tr>
   <td>Current Image</td>
       <td>
           <?php
           if($current_image!=""){
               ?>
               <img src="../images/food/<?php echo $current_image?>"  style="width:100%;" >
    <?php
           }
               else{
                   echo "<div class='error'>Image Not Found</div>";
               }
           
           ?>
       </td>
   </tr>
   <tr>
   <td>Select Image</td>
       <td><input type="file" name="image"></td>
   </tr>
   <tr>
   <td>Category</td>
   <td>
       <select name="catsel">
           <?php
           $query2="select * from tbl_category where active='yes'";
           $res2=mysqli_query($conn,$query2);
            if($res2){
               $count2=mysqli_num_rows($res2);
               if($count2>0){
               
                   while($data2=mysqli_fetch_assoc($res2)){
                   $id2=$data2['id'];
                   $title2=$data2['title'];
                   
                   ?>
                   <option value="<?php  echo $id2;?>"
                    <?php 
                   if($id2==$catego_id){ echo "selected";}
                   
                   ?> ><?php echo $title2; ?></option>
                   <?php
                   }
               }
               else{
               
                ?>
               <option ><div class='error'>Data Not Found</div></option>";
               <?php
               }
           }
           else{
            
               ?>
              <option ><div class='error'>Data Not Found</div></option>";
              <?php
           }
           
           
           ?>
       </select>
   </td>
</tr>
<tr>
    <td>Featured</td>
    <td>
<input type="radio" <?php if($fea=="yes"){ echo "checked";}?> name="fea" value="yes">yes
<input type="radio" <?php if($fea=="no"){ echo "checked";}?> name="fea" value="no">no
   </td>
</tr>
<tr>
    <td>Active</td>
    <td>
        <input type="radio" <?php if($act=="yes"){ echo "checked";}?> name="act" value="yes">yes
        <input type="radio" <?php if($act=="no"){ echo "checked";}?> name="act" value="no">no
    </td>
</tr>
<tr>
<td colspan="2">
    <input type="submit" name="submit" value="submit" class="btn-secondary">
</tr>
</table>
</form>
</div>
</div>            
<?php include('partial/footer.php'); ?>
<?php
if(isset($_POST['submit'])){

$title=$_POST['title'];
$price=$_POST['price'];
$des=$_POST['decrip'];
$fea=$_POST['fea'];
$act=$_POST['act'];
$cat=$_POST['catsel'];
if(isset($_FILES['image']['name'])){
    $imagename=$_FILES['image']['name'];
    if($imagename!=""){
        $ext=end(explode('.',$imagename));
        $imagename="FOOD-FOLDER_".rand(000,999).'.'.$ext;
        $virpath=$_FILES['image']['tmp_name'];
        $destipath="../images/food/".$imagename;
        $path=move_uploaded_file($virpath,$destipath);
        if(!$path){
            $_SESSION['imageulo']="<div class='error'>Image Not Uploded Successfully</div>";
            header("location:".SITEURL."adminpanel/manage-food.php");
            die();
        }
        if($current_image!=""){
        $preima=$current_image;
        $destipath2="../images/food/".$current_image;
        $upload=unlink($destipath2);
        if(!$upload){
            $_SESSION['imageulo']="<div class='error'>Image Not Uploded Successfully</div>";
            header("location:".SITEURL."adminpanel/manage-food.php");
            die();
        }
    }
    }
    else{
        $imagename=$current_image;
    }
}
else{
    $imagename=$current_image;
}

$query3="update tbl_food set title='$title',description='$des',price='$price',category_id='$cat',image_name='$imagename',featured='$fea',active='$act' where id=$id";
$res=mysqli_query($conn,$query3);
if($res){
    $_SESSION['foodins']="<div class='success'>Data Added successfully</div>";
    header("location:".SITEURL."adminpanel/manage-food.php");
}
else{
    $_SESSION['foodins']="<div class='error'>Data Not Add</div>";
    header("location:".SITEURL."adminpanel/manage-food.php");
}


}





?>