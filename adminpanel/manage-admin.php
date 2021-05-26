<?php include('partial/menu.php'); ?>
    <!--main content Section Starts-->
    <div class="main_content" >
        <div class="wrapper">
            <h1>Manage Admin</h1>
            <br/><br/>
            <?php
            
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']) ;

            }
            if(isset($_SESSION['dele'])){
                echo $_SESSION['dele'];
                unset($_SESSION['dele']) ;

            } 
           
           
            ?>
            <br/><br/>
            <a href="add-admin.php" class="btn-primary">Add Admin</a>
            <br/><br/><br/>
            <table class="tbl-class">
            <tr>
        <th>S.N</th>
        <th>Full Name</th>
        <th>Username</th>
        <th>Actions</th>
    </tr>
                <?php
                
                $quer="select * from tbl_admin ";
                $getdata=mysqli_query($conn,$quer);
                $idnum=1;
                if($getdata){
                    $count=mysqli_num_rows($getdata);
                    if($count>0){
                        while($repe=mysqli_fetch_assoc($getdata)){
                            $id=$repe['id'];
                            $username=$repe['username'];
                            $fullname=$repe['fullname'];
                            ?>
                             <tr><td><?php echo $idnum++ ?></td>
             <td><?php echo  $username ?></td>
             <td><?php echo  $fullname ?></td>
        <td>
          <a href="<?php echo SITEURL; ?>adminpanel/updatepass.php?id=<?php echo $id ?>" class="btn-secondary"> Change Password</a>
        <a href="<?php echo SITEURL; ?>adminpanel/update.php?id=<?php echo $id ?>" class="btn-secondary"> Update Admin</a>
        <a href="<?php echo SITEURL; ?>adminpanel/delete.php?id=<?php echo $id ?>" class="btn-danger">Delete Admin</a>    
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