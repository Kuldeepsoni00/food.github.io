<?php include("partial-front/menu.php");?>
<section class="food-search text-center">
    <div class="container">
        <?php
         $id=$_GET['id'];
         $query="select * from tbl_category where id='$id'";
         $res=mysqli_query($conn,$query);
         if($res){
             $count=mysqli_num_rows($res);
             if($count>0){
                 $data=mysqli_fetch_assoc($res);
                 $title=$data['title'];
                 ?>
                 <h2>Food On Your Search<a href="#" class="text-white">"<?php echo $title;?>"</a></h2>
                 <?php
             }  
             else{
              
                header("location:".SITEURL."index.php");
             }
         }
         else{
           
             header("location:".SITEURL."index.php");
         }
        ?>
     
    </div>
</section>
<section class="food-menu">
    <div class="container">
        <h2 class="text-center ">Explore Foods</h2>
        <?php
        $query2="select * from tbl_food where category_id='$id'";
        $res2=mysqli_query($conn,$query2);
        if($res2){
            $count2=mysqli_num_rows($res2);
            if($count2>0){
                while($data2=mysqli_fetch_assoc($res2)){
                $food_id=$data2['id'];
                $title=$data2['title'];
                $price=$data2['price'];
                $des=$data2['description'];
                $image=$data2['image_name'];
                

                ?>
                 <div class="food-menu-box">
           <div class="food-menu-img">
                <?php
                
                if($image==""){
                    echo "<div class='error'>Image Not Found</div>";
                }
                else{
                    ?>
                    <img src="<?php echo SITEURL;?>images/food/<?php echo $image;?>" alt="<?php $title;?>" class="img-responsive img-curve" >
                    <?php

                }
                ?>

          </div>
           <div class="food-menu-des">
               <h4><?php echo $title;?></h4>
               <p class="food-price"><?php echo $price;?></p>
               <p class="food-details"><?php echo $des;?></p>
               <br>
               <a href="<?php echo SITEURL;?>orders.php?food_id=<?php echo $food_id; ?>" class="btn btn-primary">order now</a>
           </div>
        </div>
<?php
                }


            }
            else{
               
                header("location:".SITEURL."index.php");
            }
       }
        else{
           
            header("location:".SITEURL."index.php");
        }
        ?>
       
       
        
        <div class="clearfix"></div>
    </div>
</section>
<?php include("partial-front/footer.php");?>