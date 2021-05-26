<?php include('partial/menu.php'); ?>
<?php 
if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query="select * from tbl_category where id=$id";
    $res=mysqli_query($conn,$query);
    if($res){
        $count=mysqli_num_rows($res);
        if($count==1){
            $data=mysqli_fetch_assoc($res);
            $title=$data['title'];
            $currentim_name=$data['image_name'];
            $featured=$data['featured'];
            $active=$data['active'];
             
        }
        else{
            $_SESSION['notcatfo']="<div class='error'>Category Not Found<div>";
            header("location:".SITEURL."adminpanel/manage-category.php");
        }

        
    }
    else{
        $_SESSION['notcatfo']="<div class='error'>Category Not Found<div>";
          
        header("location:".SITEURL."adminpanel/manage-category.php");
    }
}
else{
    $_SESSION['notcatfo']="<div class='error'>Category Not Found<div>";
            header("location:".SITEURL."adminpanel/manage-category.php");  
    header("location:".SITEURL."adminpanel/manage-category.php");
}
?>
<div class="container">
        <div  class="wrapper">
            <form action="" method="POST" enctype="multipart/form-data">
                <table class="tbl_30">
                    <tr>
                        <td>
                            Title
                        </td>
                        <td>
                            <input type="text" name="title" value="<?php echo $title?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Image
                        </td>
                        <td>
                           <?php
                           if($currentim_name!=""){
                               ?>
                               <img src="<?php echo SITEURL?>images/category/<?php echo $currentim_name?>" style="width:100%;"></img>
                               <?php
                           }
                           else{
                               echo "<div class='error'>Image Not Added<div>";
                           }
                           ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Image
                        </td>
                        <td>
                            <input type="file" name="fileup">
                        </td>
                    </tr>
                    <tr>
                        <td>Featured</td>
                        <td><input <?php if($featured=="yes"){echo "checked";}?> type="radio" name="fea" value="yes">Yes
                        <input <?php if($featured=="no"){echo "checked";}?> type="radio" name="fea" value="no">No</td>
                    </tr>
                    <tr>
                        <td>Active</td>
                        <td><input <?php if($active=="yes"){echo "checked";}?> type="radio" name="act" value="yes">Yes
                        <input <?php if($active=="no"){echo "checked";}?> type="radio" name="act" value="no">No</td>
                    </tr>
                    <tr>
                        <td><input type="hidden" name="curimage" value="<?php echo $currentim_name;?>"></td>
                       <td><input type="hidden" name="curid" value="<?php echo $id;?>"></td>
                        <td><input type="submit" class="btn-secondary" name="submit" value="submit"></td>
                    </tr>
                </table>
            </form>
        </div>  
    </div>

<?php include('partial/footer.php'); ?>
<?php
if(isset($_POST['submit'])){
$id=$_POST['curid'];
$title=$_POST['title'];
$currentim_name=$_POST['curimage'];
$feat=$_POST['fea'];
$acti=$_POST['act'];
if(isset($_FILES['fileup']['name'])){
    $imagename=$_FILES['fileup']['name'];
    if($imagename!=""){
        $ext=end(explode('.',$imagename));
        $filepath=$_FILES['fileup']['tmp_name'];
        $imagename="FOOD_CATEGORY_".rand(000,999).'.'.$ext;
        $destinationpath="../images/category/".$imagename;
        
        $path=move_uploaded_file($filepath,$destinationpath);
      if(!$path){
            $_SESSION['upload']="<div class='error'>File Not Upload</div>";
            header("location:".SITEURL."adminpanel/manage-category.php");
            die();
        }
        if($currentim_name!=""){
        $prepath="../images/category/".$currentim_name;
        $delima=unlink($prepath);
        if(!$delima){
            $_SESSION['imnot']="<div class='error'>Image Is Not Delete</div>";
            header("location:".SITEURL."adminpanel/manage-category.php");
        }
    }
    }
    else{
        $imagename=$currentim_name;
    }
}
else{
    $imagename=$currentim_name;
}
//qyery ke end me And mAT LAGANA
$query2="update tbl_category set title='$title',image_name='$imagename',featured='$feat',active='$acti' where id =$id";

$res=mysqli_query($conn,$query2);
if($res){
    $_SESSION['upcateg']="<div class='success'>Updated Successfully</div>";
    header("location:".SITEURL."adminpanel/manage-category.php");
}
else{
    $_SESSION['upcateg']="<div class='error'>Not Updated</div>";
    header("location:".SITEURL."adminpanel/manage-category.php");
}

}




?>