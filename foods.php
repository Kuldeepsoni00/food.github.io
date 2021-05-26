<?php include("partial-front/menu.php");?>
<section class="food-search text-center">
        <div class="container">
            <form action="<?php SITEURL?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search For Food">
                <input type="submit" value="submit" name="submit" class="btn btn-primary">
            </form>
        </div>
    </section>
<section class="food-menu">
    <div class="container">
        <h2 class="text-center ">Foods Menu</h2>
        <?php
        $query="select * from tbl_food where active='yes'";
        $res=mysqli_query($conn,$query);
        if($res){
            $count=mysqli_num_rows($res);
            if($count>0){
              while($data=mysqli_fetch_assoc($res)){
                $id=$data['id'];
                $title=$data['title'];
                $price=$data['price'];
                $des=$data['description'];
                $imagename=$data['image_name'];
                if($imagename==""){
                    echo "<div class='error'>Image Not Added</div>";
                }
                else{

                    ?>
                    <div class="food-menu-box">
           <div class="food-menu-img">
            <img src="<?php echo SITEURL;?>images/food/<?php echo $imagename;?>" alt="Chicken" class="img-responsive img-curve" >
           </div>
           <div class="food-menu-des">
               <h4><?php echo $title;?></h4>
               <p class="food-price"><?php  echo $price;?></p>
               <p class="food-details"><?php  echo $des ;?></p>
               <br>
               <a href="<?php echo SITEURL;?>orders.php?food_id=<?php echo $id;?>" class="btn btn-primary">order now</a>
           </div>
          
        </div>
        <?php

        
                }


              }



            }
            else{
                echo "<div class='error'>Category Not Added</div>";
            }
        }
        else{
            echo "<div class='error'>Category Not Added</div>";
        }
        
        
        ?>
        
        
        <div class="clearfix"></div>
    </div>
</section>
<?php include("partial-front/footer.php");?>