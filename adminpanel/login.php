<?php include('../config/constants.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
<div class="container-lo">
<form action="" method="post">
  <div class="container-lo">
    <label for="uname"><b>Username</b></label>
    <input type="text" id="username" placeholder="Enter Username" name="uname">

    <label for="psw"><b>Password</b></label>
    <input type="password" id="pass" placeholder="Enter Password" name="psw">

    <button id="on_click" class="ss" type="submit" name="submit">Login</button>
   </div>
   <?php 
   
   if(isset($_SESSION['not-found'])){
       echo $_SESSION['not-found'];
       unset($_SESSION['not-found']);
   }
   if(isset($_SESSION['wrong'])){
    echo $_SESSION['wrong'];
    unset($_SESSION['wrong']);
}
   
    ?>
</form>
</div>
<script src="jscode/pass.js"></script>
</body>
</html>
<?php
if(isset($_POST['submit'])){
    $username=$_POST['uname'];
    $password=$_POST['psw'];
    $query="select * from tbl_admin where username='$username' and password='$password'";
    $res=mysqli_query($conn,$query);
    $count=mysqli_num_rows($res);
    if($count){
        $_SESSION['admin']=$username;
        header("location:".SITEURL."adminpanel/");
    }
    else{
       $_SESSION['not-found']="<div class='error'>Invalid Username Or Password</div>";
       header("location:".SITEURL."adminpanel/login.php");

    }
}
?>