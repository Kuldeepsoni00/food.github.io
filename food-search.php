<?php include("partial-front/menu.php");?>
<section class="food-search text-center">
    <div class="container">
        <?php
           $search=$_POST['search'];
     
        ?>
       <h2>Food On Your Search<a href="#" class="text-white">"<?php echo $search;?>"</a></h2>
    </div>
</section>
<section class="food-menu">
    <div class="container">
    <h2 class="text-center ">Food Menu</h2>
        <?php
        
     
        $query="select * from tbl_food where title like '%$search%' or description like '%$search%'";
        $res=mysqli_query($conn,$query);
        if($res){
            $count=mysqli_num_rows($res);
            if($count>0){
                   while($data=mysqli_fetch_assoc($res)){

                     $id=$data['id'];
                     $title=$data['title'];
                     $price=$data['price'];
                     $description=$data['description'];
                     $image_name=$data['image_name'];
                    ?>
                     <div class="food-menu-box">
           <div class="food-menu-img">
               <?php
               if($image_name==""){
                echo "<div class='error'>Image Not Found</div>";
               }
               else{
                   ?>
                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name;?>" alt="Chicken" class="img-responsive img-curve" >
                <?php
               }
               
               
               
               ?>
          
           </div>
           <div class="food-menu-des">
               <h4><?php echo $title;?></h4>
               <p class="food-price"><?php echo $price;?></p>
               <p class="food-details"><?php echo $description;?></p>
               <br>
               <a href="<?php echo SITEURL;?>orders.php?food_id=<?php echo $id;?>" class="btn btn-primary">order now</a>
           </div>
          
        </div>
        <?php

                   }
            }
            else{
                echo "<div class='error'>Data Not Found2</div>";
            }
        }
        else{
            echo "<div class='error'>Data Not Found1</div>";
        }
        
        
        ?>
      
       <div class="clearfix"></div>
    </div>
</section>
<?php include("partial-front/footer.php");?>