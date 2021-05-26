<?php include('partial/menu.php'); ?>
<div class="main_content" >
        <div class="wrapper">
            <h1>Change Password</h1>
            <?php 
            
            $id=$_GET['id'];
            $query="select * from tbl_admin where id=$id";
            $res=mysqli_query($conn,$query);
            $count=mysqli_num_rows($res);
            if($count==1){
                $data=mysqli_fetch_assoc($res);
                $password=$data['password'];
            }

            
            ?>
            <form action="" method="POST">
        <table class="tbl_30">
            <tr>
                <td>Old Password:</td>
                <td><input type="text" value="<?php echo $password ?>" >  </td>
            </tr>
            <tr>
                <td>New Password</td>
                <td><input id="new" type="text" name="newpass"></td>
            </tr>
            <tr>
                <td>Confirm Password</td>
                <td><input id="confirm" type="text" name="newpass"></td>
            </tr>
            <tr colspan="2">
                <td>
            <input type="submit" id="button1" value="Change Password" name="click">
</tr>
            </tr>
        </table>
    </form>
            </div>
          </div>  
         <script src="jscode/pass.js"></script>
<?php include('partial/footer.php'); ?>
<?php
if(isset($_POST['click'])){
    $newpass=$_POST['newpass'];
    $que="update tbl_admin set password=$newpass where id=$id";
    $resnew=mysqli_query($conn,$que);
    if($resnew){
        $_SESSION['add']="<div class='success'> Password Updates Sucessfully</div>";
        header("location:".SITEURL."adminpanel/manage-admin.php");
        
    }
    else{
        $_SESSION['add']="<div class='error'> Password Not Update</div>";
        header("location:".SITEURL."adminpanel/manage-admin.php");
        
    }
}
?>
