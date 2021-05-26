<?php include('partial/menu.php'); ?>
    <!--main content Section Starts-->
    <div class="main_content" >
        <div class="wrapper">
            <?php 
             if(isset( $_SESSION['datano'])){
                 echo  $_SESSION['datano'];
                 unset( $_SESSION['datano']);
             }
             if(isset( $_SESSION['datanoa'])){
                echo  $_SESSION['datanoa'];
                unset( $_SESSION['datanoa']);
            }
            ?>
           
            <table class="tbl-full">
    <tr>
        <th>S.N</th>
        <th>Food</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Total</th>
        <th>Order Date</th>
        <th>Status</th>
        <th>Customer name</th>
        <th>Contact</th>
        <th>Email</th>
        <th>Address</th>
        <th>Action</th>
    </tr>
    <?php 
    $query="select * from tbl_order order by id desc";
    $res=mysqli_query($conn,$query);
    $i=1;
    if($res){
        $count=mysqli_num_rows($res);
        if($count>0){
            while($data=mysqli_fetch_assoc($res)){
                $id=$data['id'];
                $food=$data['food'];
                $price=$data['price'];
                $quan=$data['quantity'];
                $total=$data['total'];
                $date=$data['order_data'];
                $status=$data['statu_s'];
                $name=$data['customer_name'];
                $contact=$data['customer_contact'];
                $email=$data['customer_email'];
                $address=$data['customer_address'];
                   ?>
      <tr><td><?php echo $i++;?></td>
        <td><?php echo $food;?></td>
        <td><?php echo $price;?></td>
        <td><?php echo $quan;?></td>
        <td><?php echo $total;?></td>
        <td><?php echo $date;?></td>
        <td>
       <?php
       
         if($status=="ordered"){

            echo "<label>$status</label>";
         }
         else if($status=="on delivery")
         {
            echo "<label style='color:orange;'>$status</label>";
         }
         else if($status=="delivered")
         {
            echo "<label style='color:green;'>$status</label>";
         }
                 
         else if($status=="cancel")
         {
            echo "<label style='color:red;'>$status</label>";
         }
                 
       ?>
     

        </td>
        <td><?php echo $name;?></td>
        <td><?php echo $contact;?></td>
        <td><?php echo $email;?></td>
        <td><?php echo $address;?></td>
        <td>
        <a href="<?php echo SITEURL;?>adminpanel/update-order.php?id=<?php echo $id;?>" class="btn-secondary"> Update Admin</a>
       </td>
    </tr>
    <?php
            }

        }
        else{
            echo "<div colspan='12' class='error'>Data Not Found</div>";
        }
    }
    else{
        echo "<div colspan='12' class='error'>Data Not Found</div>";
    }
    
    
    ?>
   
    
    
</table>

        </div>
     </div>
    <!--main content Section ends-->
   <?php include('partial/footer.php'); ?>