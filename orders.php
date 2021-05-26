<?php include("partial-front/menu.php");?>
<?php
if(isset($_GET['food_id'])){
    $id=$_GET['food_id'];
    $query="select * from tbl_food where id=$id";
    $res=mysqli_query($conn,$query);
    if($res){
        $count=mysqli_num_rows($res);
        if($count>0){

            $data=mysqli_fetch_assoc($res);
            $title=$data['title'];
            $price=$data['price'];
            $des=$data['description'];
            $image=$data['image_name'];
        }
        else{
            header("location:".SITEURL."index.php");
        }
    }
    else{
        header("location:".SITEURL."index.php");
    }
}


?>
<section class="food-search ">
    <div class="container">
        <h2 class="text-center text-white">Fill The Form To Confirm Your Order.</h2>
        <form action="" class="order" method="POST">
            <fieldset>
                <legend>Select Food</legend>
                <div class="food-menu-img">
                    <img src="<?php echo SITEURL;?>images/food/<?php echo $image;?>" alt="Chicken" class="img-responsive img-curve" >
                   </div>
                   <div class="food-menu-des">
                    <h3><?php echo $title;?></h3>
                    <p class="food-price"><?php echo $price;?></p>
                  <div class="order-label">Quantity</div>
                  <input type="number" name="qty" class="input-responsive" value="1" required>
               </div>
            </fieldset>
            <fieldset>
                <legend>Delivery Details</legend> 
                <div class="order-label">Full Name</div>
                <input type="text" name="full_name" placeholder="kuldeep" class="input-responsive" required>
                <div class="order-label">Contact</div>
                <input type="tel" name="contact" placeholder="9636883015" class="input-responsive" required>
                <div class="order-label">Email</div>
                <input type="email" name="email" placeholder="kuldeep" class="input-responsive" required>
                <div class="order-label">Address</div>
               <textarea name="address" rows="10" placeholder="E.g Street,City,Country" class="input-responsive" required></textarea>
               <input type="submit" name="submit" value="confirm-order" class="btn btn-primary">
            </fieldset>
        </form>
    </div>
</section>
<?php include("partial-front/footer.php");?>
<?php
if(isset($_POST['submit'])){

   $qty=$_POST['qty'];
   $total=$price*$qty;
   $order_date=date("Y-m-d h:i:sa");
   $status="ordered";
   $customer_name=$_POST['full_name'];
   $customer_contact=$_POST['contact'];
   $customer_email=$_POST['email'];
   $customer_add=$_POST['address'];
   $query2="insert into tbl_order set
           food='$title',
           price=$price,
           quantity=$qty,
           total=$total,
           order_data='$order_date',
           statu_s='$status',
           customer_name='$customer_name',
           customer_contact='$customer_contact',
           customer_email='$customer_email',
           customer_address='$customer_add'
   ";
   $res2=mysqli_query($conn,$query2);
   if($res2){
    $_SESSION['order']="<div class='success text-center'>Food Orderd Successfully</div>";
    header("location:".SITEURL."index.php");

   }
   else{
       
       $_SESSION['order']="<div class='error text-center'>Failed To Orderd Food</div>";
       header("location:".SITEURL."index.php");

      
   }

}



?>