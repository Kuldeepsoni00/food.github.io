<?php include('partial/menu.php'); ?>
    <!--main content Section Starts-->
    <div class="main_content" >
        <div class="wrapper">
            <h1>Manage Category</h1>
            <br/><br/>
            <?php
            if(isset($_SESSION['delcat'])){
                echo $_SESSION['delcat'];
                unset($_SESSION['delcat']);
            }
            if(isset($_SESSION['imnot'])){
                echo $_SESSION['imnot'];
                unset($_SESSION['imnot']);
            }
            if(isset($_SESSION['notcatfo'])){
                echo $_SESSION['notcatfo'];
                unset($_SESSION['notcatfo']);
            }
            if(isset($_SESSION['upcateg'])){
                echo $_SESSION['upcateg'];
                unset($_SESSION['upcateg']);
            }
            ?>
            <br/><br/>
            <a href="<?php echo SITEURL?>adminpanel/add-category.php" class="btn-primary">Add Category</a>
            <br/><br/><br/>
            <table class="tbl-class">
    <tr>
        <th>S.N</th>
        <th>Title</th>
        <th>Image</th>
        <th>Featured</th>
        <th>Active</th>
        <th>Action</th>
    </tr>
    <?php
   $query="select * from tbl_category";
   $res=mysqli_query($conn,$query);
   $count=mysqli_num_rows($res);
   $i=1;
   
   if($count>0){
       while($row=mysqli_fetch_assoc($res)){
       $id=$row['id'];
      $image=$row['image_name'];
       $feat=$row['featured'];
       $act=$row['active'];
       $title=$row['title'];
      
       ?>
       <tr><td><?php echo $i++ ?>.</td>
        <td><?php echo $title?></td>
        <td>
            <?php
            if($image!=""){
                ?>
                <img src="<?php echo SITEURL?>images/category/<?php echo $image;?>" width="100px">
                <?php
            }
            else{
                echo "<div class='error'>Image Not Found</div>";
            }
            
            
            
            ?>
        </td>
        <td><?php echo $feat?></td>
        <td><?php echo $act?></td>
        <td>
        <a href="<?php echo SITEURL; ?>adminpanel/update-cat.php?id=<?php echo $id ?>" class="btn-secondary"> Update Admin</a>
        <a href="<?php echo SITEURL; ?>adminpanel/delete-cat.php?id=<?php echo $id ?>&image_name=<?php echo $image; ?>" class="btn-danger">Delete Admin</a>    
       </td>
    </tr>
      <?php


       }
   
    }
   ?>
   
</table>
        </div>
     </div>
    <!--main content Section ends-->
   <?php include('partial/footer.php'); ?>
  