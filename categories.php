<?php include("partial-front/menu.php");?>
<?php

?>
<section class="categories">
    <div class="container">
        <h2 class="text-center">Explore Foods</h2>
        <?php 
        $query="select * from tbl_category where active='yes'";
        $res=mysqli_query($conn,$query);
        if($res){
             $count=mysqli_num_rows($res);
             if($count>0){   
                 while($data=mysqli_fetch_assoc($res)){
                  $id=$data['id'];
                  $title=$data['title'];
                  $imagename=$data['image_name'];
                  if($imagename==""){
                      echo "<div class='error'>Image Not Found</div>";
                    
                  }
                  else{
                  ?>
                    <a href="<?php echo SITEURL;?>categories-food.php?id=<?php echo $id?>">
                  <div class="box-3 float-container">
                     <img src="<?php echo SITEURL?>images/category/<?php echo $imagename?>" alt="pizza" class="img-responsive img-curve" >
                              <h3 class="floa-text text-white"><?php echo $title?></h3>
                  </div>
                 </a>                    
<?php
                  }      
                 }

             }
             else{
                echo "<div class='error'>Data Not Found</div>";     
             }
        }
        else{
            echo "<div class='error'>Data Not Found</div>";
        }

        ?>
        
        
<div class="clearfix"></div>
    </div>
</section>


<?php include("partial-front/footer.php");?>