<?php include('partial/menu.php'); ?>
<div class="main_content">
    <div class="wrapper">
        <h1>Add Admin</h1>
           <?php
           
           if(isset($_GET['id'])){
            
            $id=$_GET['id'];
           
            $query="select * from tbl_order where id=$id";
           
            $res=mysqli_query($conn,$query);
            if($res){
              
                $count=mysqli_num_rows($res);
                if($count>0){
                    $data=mysqli_fetch_assoc($res);
                    $title=$data['food'];
                    $price=$data['price'];
                    $status=$data['statu_s'];
                    $qua=$data['quantity'];
                    $total=$data['total'];
                    $ordedate=$data['order_data'];
                    $name=$data['customer_name'];
                    $contact=$data['customer_contact'];
                    $email=$data['customer_email'];
                    $add=$data['customer_address'];
                }
                else{
                    $_SESSION['datano']="<div class='error'>Data Not Found</div>";
                header("location:".SITEURL."adminpanel/order.php");
            
                }
            }
            else{
                $_SESSION['datano']="<div class='error'>Data Not Found</div>";
                header("location:".SITEURL."adminpanel/order.php");
            }
           }
           else{
               header("location:".SITEURL."adminpanel/order.php");
           }
           
           
           ?>

      
                <form action="" method="POST">
        <table class="tbl_30">
            <tr>
                <td>Food Name:</td>
               <td> <input type="text" name="full_name" placeholder="Enter Food Name"  value="<?php echo $title; ?>"></td>
            </tr>
            <tr>
                <td>Qty:</td>
                <td><input type="text" name="qty" placeholder="Enter Quantity"  value="<?php echo $qua; ?>"></td>
            </tr>
            <tr>
                <td>Status:</td>
                <td>
           <select name="status">
               <option value="ordered" <?php if($status=="ordered"){echo "selected";}?>>Ordered</option>
               <option value="on delivery" <?php if($status=="on_delivery"){echo "selected";}?>>On Delivery</option>
               <option value="delivered" <?php if($status=="delivered"){echo "selected";}?>>Delivered</option>
               <option value="cancel" <?php if($status=="cancel"){echo "selected";}?>>Cancelled</option>
           </select>
           </td>
            </tr>
            <tr>
                <td>Price:</td>
                <td><input type="text" name="price" placeholder="Enter price" value="<?php echo $price; ?>" ></td>
            </tr>
            <tr>
                <td>Total:</td>
                <td><input type="text" name="total" placeholder="Enter total" value="<?php echo $total; ?>" ></td>
            </tr>
            <tr>
                <td>Customer Name:</td>
                <td><input type="text" name="cusname" placeholder="Enter Customer Name" value="<?php echo $name; ?>" ></td>
            </tr>
            <tr>
                <td>Order-Date:</td>
                <td><input type="datetime" name="orderdate" placeholder="Enter Date"  value="<?php echo $ordedate; ?>"></td>
            </tr>
            <tr>
                <td>Customer Contact:</td>
                <td><input type="contact" name="usercon" placeholder="Enter contact number" value="<?php echo $contact; ?>" ></td>
            </tr>
            <tr>
                <td>Customer Email: :</td>
                <td><input type="email" name="cusemail" placeholder="Enter Email"  value="<?php echo $email;?>"></td>
            </tr>
            <tr>
                <td>Customer Address </td>
                <td><textarea name="address" cols="30" rows="10"><?php echo $add;?></textarea></td>
            </tr>
            <tr>
                <td colspan="2">
             <input type="submit" name="submit" value="Update Admin" class="btn-secondary"></td>
            </tr>
            
        </table>
    </form>
    </div>
   
   
</div>
<?php include('partial/footer.php'); ?>
<?php
if(isset($_POST['submit'])){
    $title=$_POST['full_name'];
    $price=$_POST['price'];
  $status=$_POST['status'];
    $name=$_POST['cusname'];
     $contact=$_POST['usercon'];
     $email=$_POST['cusemail'];
     $add=$_POST['address'];
     $date=$_POST['orderdate'];
     $quan=$_POST['qty'];
     $total=$price*$quan;
     $query2="update tbl_order set
     food='$title',
     price='$price',
     quantity='$quan',
     total='$total',
     order_data='$date',
     statu_s='$status',
     customer_name='$name',
     customer_contact='$contact',
     customer_email='$email',
     customer_address='$add'    
     where id=$id";
     
     
     $res2=mysqli_query($conn,$query2);
     
     if($res2){
        $_SESSION['datanoa']="<div class='error'>Data Updated Successfully</div>";
        header("location:".SITEURL."adminpanel/order.php");
     }
     else{
        $_SESSION['datanoa']="<div class='error'>Data Not Updated</div>";
        header("location:".SITEURL."adminpanel/order.php");
     }
}
?>