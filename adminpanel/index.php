<?php include('partial/menu.php'); 

  
?>

<div class="main_content" >
        <div class="wrapper">
            <h1>Dashboard</h1>
            <div class="col-4 textcenter">
                <?php
                $query1="select * from tbl_category";
                $res1=mysqli_query($conn,$query1);
                $count1=mysqli_num_rows($res1);
                ?>
                <h1><?php echo $count1;?></h1>
                <br/>
                categories
             </div>
            <div class="col-4 textcenter">
            <?php
                
                $query2="select * from tbl_food";
                $res2=mysqli_query($conn,$query2);
                $count2=mysqli_num_rows($res2);
                ?>
                <h1><?php echo $count2;?></h1>
                <br/>
                Food
           </div>
            <div class="col-4 textcenter">
            <?php
                
                $query3="select * from tbl_order";
                $res3=mysqli_query($conn,$query3);
                $count3=mysqli_num_rows($res3);
                ?>
                <h1><?php echo $count3;?></h1>
                <br/>
                Order
              </div>
            <div class="col-4 textcenter">
            <?php
                
                $query4="select sum(total) as total from tbl_order where statu_s='delivered'";
                $res4=mysqli_query($conn,$query4);
                $count4=mysqli_fetch_assoc($res4);
                $total=$count4['total'];
                ?>
                <h1><?php echo $total;?></h1>
                <br/>
                Total Revenue
           </div>
           <div class="clearfix"></div>
        </div>
        
    </div>
    
    <!--main content Section ends-->
    <!--footer Section Starts-->
   <?php include('partial/footer.php'); ?>