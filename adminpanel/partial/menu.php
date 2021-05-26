<?php include('../config/constants.php');

if(!isset($_SESSION['admin'])){
 $_SESSION['wrong']="<div class='error'>Please Login First</div>";
 header("location:".SITEURL."adminpanel/login.php");

}


?>

<html>
<head>
    <title>Food Order Website-Home Page</title>
    <link rel="stylesheet" href="../css/admin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>    
</head>

<body>
    <!--Menu Section Starts-->
    <div class="menu">
        <div class="wrapper textcenter">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="manage-admin.php">Admin</a></li>
                <li><a href="manage-category.php">Category</a></li>
                <li><a href="manage-food.php">Food</a></li>
                <li><a href="order.php">Order</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
        </div>
    </div>
     <!--Menu Section Ends-->