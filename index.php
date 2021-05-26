<?php include("partial-front/menu.php");?>
    </section>
    <section class="food-search text-center">
        <div class="container">
            <form action="<?php echo SITEURL;?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search For Food">
                <input type="submit" value="submit" name="submit" class="btn btn-primary">
            </form>
        </div>
    </section>
 
    <?php
    
    if(isset($_SESSION['order'])){
        echo $_SESSION['order'];
        unset($_SESSION['oreder']);
    }
    
    ?>
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

           
                <?php
                
                $query="select * from tbl_category where active='yes' and featured='yes' limit 3 ";
                $res=mysqli_query($conn,$query);
                if($res){
                    $count=mysqli_num_rows($res);
                    if($count>0){
                        while($data=mysqli_fetch_assoc($res)){
                        $id=$data['id'];    
                        $title=$data['title'];
                        $imagename=$data['image_name'];
                        ?>
                         <a href="<?php echo SITEURL;?>categories-food.php?id=<?php echo $id?>">
            <div class="box-3 float-container">
                <?php
                        if($imagename==""){
                            echo "<div class='error'>Image Not Added</div>";
                        }
                        ?>
                <img src="<?php echo SITEURL;?>images/category/<?php echo $imagename;?>" alt="pizza" class="img-responsive img-curve" >  
                <h3 class="floa-text text-white"><?php echo $title;?></h3>
                </div>
        </a>
        <?php
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
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center ">Explore Foods</h2>
            <?php
            $query2="select * from tbl_food where active='yes' and featured='yes'  limit 6";
            $res2=mysqli_query($conn,$query2);
            if($res2){
                $count2=mysqli_num_rows($res2);
                if($count2>0){
                    while($data2=mysqli_fetch_assoc($res2)){
                        $id2=$data2['id'];
                        $title2=$data2['title'];
                        $price=$data2['price'];
                        $des=$data2['description'];
                        $imagename2=$data2['image_name'];
                        if($imagename2==""){
                            echo "<div class='error'>Image Not Added</div>";
                        }
                        else{
                            ?>
                            <div class="food-menu-box">
                            <div class="food-menu-img">
                             <img src="<?php echo SITEURL;?>images/food/<?php echo $imagename2;?>" alt="Chicken" class="img-responsive img-curve" >
                            </div>
                            <div class="food-menu-des">
                                <h4><?php echo $title2;?></h4>
                                <p class="food-price"><?php $price;?></p>
                                <p class="food-details"><?php echo $des?></p>
                                <br>
                                <a href="<?php echo SITEURL;?>orders.php?food_id=<?php echo $id2;?>" class="btn btn-primary">order now</a>
                            </div>
                           
                         </div>
                         <?php

                        }
                    }
                }
                else{
                    echo "<div class='error'>Data Not Added</div>";
                }

            }
            else{
                echo "<div class='error'>Data Not Added</div>";
            }
            
            
            ?>
           
            
            
            <div class="clearfix"></div>
        </div>
    </section>
    <?php include("partial-front/footer.php");?>
   