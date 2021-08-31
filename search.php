<?php include "includes/db.php";?>
<?php include "includes/header.php";?>

<!-- Navigation -->
<?php include "includes/navigation.php"; ?>
<!-- Page Content -->
<div class="container">
    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">
           <?php 
            if(isset($_POST['submit'])){
                $search = $_POST['search'];
                $sql="SELECT * FROM posts WHERE post_author LIKE '%$search%' ";
                $search_result=mysqli_query($connection,$sql);
                $count=mysqli_num_rows($search_result);
                if($count==0){
                    echo "<h1 style='color:red;'>NO RESULT FOUND</h1>";
                }else {
                    //echo "Some thing";
                    
                 while($row=mysqli_fetch_assoc($search_result)){
                    $post_catagory_id= $row['post_catagory_id'];
                    $post_title= $row['post_title'];
                    $post_author= $row['post_author'];
                    $post_date= $row['post_date'];
                    $post_image= $row['post_image'];
                    $post_content= $row['post_content'];
                    $post_tags= $row['post_tags'];
                    $post_comment_count= $row['post_comment_count'];
                    $post_status= $row['post_status'];
                    ?>
            <h1 class="page-header">
                <?php //echo "{$post_title}";?>
                <!--<small>Secondary Text</small>-->
            </h1>

            <!-- First Blog Post -->
            <h2>
                <a href="#"><?php echo $post_title ;?></a>
            </h2>
            <p class="lead">
                by <a href="index.php"><?php echo $post_author;?></a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> Posted on<?php echo $post_date;?></p>
            <hr>
            <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
            <hr>
            <p><?php echo $post_content;?></p>
            <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a><hr>
            
           <?php 
                
            }
                }
            }
            ?>
            
        <hr>
        </div>
        <!-- Blog Sidebar Widgets Column -->
        <?php include "includes/sidebar.php";?>
    </div>
    <!-- /.row --><hr>
    <?php include "includes/footer.php";?>
