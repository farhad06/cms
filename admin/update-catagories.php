<?php include "../includes/db.php"; ?>
   <form action="" method="post">
    <lable for="cat-title">Update Catagory</lable>
    <?php 
       if(isset($_GET['update'])){
           //echo $_GET['update'];
           $cata_id=$_GET['update'];
           $sql="SELECT * FROM catagories WHERE cat_id = {$cata_id}";
           $result=mysqli_query($connection,$sql);
           while($row = mysqli_fetch_assoc($result)){
               $the_id=$row['cat_id'];
               $cat_title=$row['cat_title'];
               ?>
                <input value="<?php if(isset($cat_title)){echo $cat_title;}?>" type="text" class="form-control" name="cat_title">
          <?php 
           }
       }
       ?>
       <?php //update sql
       if(isset($_POST['update'])){
           $cat_title=$_POST['cat_title'];
           $update_sql="UPDATE catagories SET cat_title = '{$cat_title}' WHERE cat_id = {$cata_id}";
           $update_result=mysqli_query($connection,$update_sql);
           if(!$update_result){
               die("Update failed".mysqli_error($connection));
           }else{
               header("location:catagories.php");
           }
       }
       
       
       ?>
    <div class="form-group">
       
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-success" name="update" value="Update Cartagories">
    </div>
</form>