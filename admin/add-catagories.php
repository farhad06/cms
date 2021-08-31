<?php  include "../includes/db.php"; ?>

<!-- Add Catagories -->
<?php 
if(isset($_POST['submit'])){
    $cat_title=$_POST['cat_title'];
    if($cat_title==""|| empty($cat_title)){
        echo "<h2 style='color:red'>This Field Is required</h2>";
    }else{
        $sql="INSERT INTO catagories (cat_title) VALUES ('{$cat_title}')";
        $add_catagory=mysqli_query($connection,$sql);
        if(!$add_catagory){
            die('<h2>Insertion Failed</h2>'.mysqli_error($connection));
        }else{
           // echo "<h2 style='color:green;'> Inserted Successfully</h2>";
            header("location:catagories.php");
        }
    }
}
?>