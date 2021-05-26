<?php include('partial/menu.php'); ?>
    <!--main content Section Starts-->
    <div class="main_content" >
        <div class="wrapper">
            <h1>Manage Food</h1>
            <br/><br/>
            <?php
            if(isset($_SESSION['defod'])){
                echo $_SESSION['defod'];
                unset($_SESSION['defod']);
            }
            if(isset($_SESSION['unacc'])){
                echo $_SESSION['unacc'];
                unset($_SESSION['unacc']);
            }
            if(isset($_SESSION['querr'])){
                echo $_SESSION['querr'];
                unset($_SESSION['querr']);
            }
            if(isset($_SESSION['imageulo'])){
                echo $_SESSION['imageulo'];
                unset($_SESSION['imageulo']);
            }
            if(isset($_SESSION['foodins'])){
                echo $_SESSION['foodins'];
                unset($_SESSION['foodins']);
            }
            ?>
            <br/><br/>
            <a href="<?php echo SITEURL?>/adminpanel/add-food.php" class="btn-primary">Add Food</a>
            <br/><br/><br/>
            <table class="tbl-class">
    <tr>
        <th>S.N</th>
        <th>Title</th>
        <th>Image</th>
        <th>Price</th>
        <th>Featured</th>
        <th>Active</th>
        <th>Action</th>

    </tr>
    <?php 
    $query="select * from tbl_food";
    $res=mysqli_query($conn,$query);
    $i=1;
    if($res){
          $count=mysqli_num_rows($res);
          if($count>0){
              while($data=mysqli_fetch_assoc($res)){
                  $id=$data['id'];
              $title=$data['title'];
              $price=$data['price'];
              $imagename=$data['image_name'];
              $fea=$data['featured'];
              $act=$data['active'];
              ?>
              <tr>
                  <td><?php echo $i++?></td>
                  <td><?php echo $title?></td>
                  <td><?php 
                  if($imagename!=""){
                      ?>
                       <img src="<?php echo SITEURL?>images/food/<?php echo $imagename; ?>" style="width:100px;"><img>
<?php

                  }
                  else{
                      echo "<div class='error'>Image Not Upload</div>";
                  }
                  
                  
                  ?>
                  </td>
                  <td><?php echo $price ?></td>
                  <td><?php echo $fea ?></td>
                  <td><?php echo $act ?></td>
                  <td colspan="2">

                  <a href="<?php echo SITEURL?>adminpanel/update-food.php?id=<?php echo $id?>" class="btn-secondary">Update Food</a>
                  <a href="<?php echo SITEURL?>adminpanel/delete-food.php?id=<?php echo $id?>&imagename=<?php echo $imagename?>" class="btn-danger">Delete Food</a>
                  </td>
              </tr>

<?php

              }
          } 
    }
    
      ?>
    
</table>
        </div>
     </div>
    <!--main content Section ends-->
   <?php include('partial/footer.php'); ?>