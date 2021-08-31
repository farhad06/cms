<?php session_start();?>
<?php include "includes/db.php";?>
<?php include "includes/header.php";?>

<!-- Navigation -->
<?php include "includes/navigation.php"; ?>
<!-- Page Content -->
<div class="container">
    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <h1 class="page-header">
                <?php //echo "{$post_title}";?>
                <!--<small>Secondary Text</small>-->
            </h1>
            <?php 
            if(isset($_GET['p_name'])){
                $author=$_GET['p_name'];
                $sql="SELECT * FROM posts WHERE post_author='{$author}'";
                $result=mysqli_query($connection,$sql);
                while($row=mysqli_fetch_assoc($result)){
                    if($row>0){
                        $post_catagory_id= $row['post_catagory_id'];
                        $post_title= $row['post_title'];
                        $post_author= $row['post_author'];
                        $post_date= $row['post_date'];
                        $post_image= $row['post_image'];
                        $post_content= $row['post_content'];
                        $post_tags= $row['post_tags'];
                        $post_comment_count= $row['post_comment_count'];
                        $post_status= $row['post_status'];
                    }
            ?>

            <!-- First Blog Post -->
            <h2>
                <a href="#"><?php echo $post_title ;?></a>
            </h2>
            <p class="lead">
                by <a href="#"><?php echo $post_author;?></a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> Posted on<?php echo $post_date;?></p>
            <hr>
            <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
            <hr>
            <p><?php echo $post_content;?></p>
            <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
            <?php }}?>
            <?php 
            if(isset($_GET['p_id'])){
                $id=$_GET['p_id'];
                $view_post_sql="UPDATE posts SET post_view_count = post_view_count + 1 WHERE post_id=$id";
                $post_view_result=(mysqli_query($connection,$view_post_sql));
                if(!$post_view_result){
                    die("Sql Failed".mysqli_error($connection));
                }
                $sql="SELECT * FROM posts WHERE post_id=$id";
                $result=mysqli_query($connection,$sql);
                while($row=mysqli_fetch_assoc($result)){
                    if($row>0){
                        $post_catagory_id= $row['post_catagory_id'];
                        $post_title= $row['post_title'];
                        $post_author= $row['post_author'];
                        $post_date= $row['post_date'];
                        $post_image= $row['post_image'];
                        $post_content= $row['post_content'];
                        $post_tags= $row['post_tags'];
                        $post_comment_count= $row['post_comment_count'];
                        $post_status= $row['post_status'];
                    }
            ?>

            <!-- First Blog Post -->
            <h2>
                <a href=""><?php echo $post_title ;?></a>
            </h2>
            <p class="lead">
                by <a href="#"><?php echo $post_author;?></a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> Posted on<?php echo $post_date;?></p>
            <hr>
            <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
            <hr>
            <p><?php echo $post_content;?></p>
            <div class="row">
                <p class="pull-right">
                    <a id="like" href="#"><i class="fa fa-thumbs-o-up"></i>
                        Like</a></p>
            </div>
            <div class="row">
                <p class="pull-right">
                    <a id="dislike" href="#"><i class="fa fa-thumbs-o-down"></i>
                        Dislike</a></p>
            </div>
            <div class="clearfix"></div>
            <?php }}?>
            <hr>

            <!-- Blog Comments -->

            <!-- Comments Form -->
            <div class="well">
                <h4>Leave a Comment:</h4>
                <form role="form" action="create-comment.php" method="post">
                    <div class="form-group">
                        <lable for="comment_author">Author:</lable>
                        <input type="text" name="comment_author" class="form-control">
                    </div>
                    <div class="form-group">
                        <lable for="comment_author">Email:</lable>
                        <input type="email" name="comment_email" class="form-control">
                    </div>
                    <div class="form-group">
                        <lable for="comment">Write Your Comment:</lable>
                        <textarea class="form-control" rows="3" name="comment"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" name="create-comment">Submit</button>
                </form>
            </div>
            <hr>
            <!-- Comment -->
            <div class="media">
                <div class="media-body">
                    <?php
                    //show the approved comments
                    /*$sql="SELECT * FROM comments WHERE  comment_status ='approve' ";
                    $show_comments=mysqli_query($connection,$sql);
                    while($row=mysqli_fetch_assoc($show_comments)){
                        if($row>0){
                            $author=$row['comment_author'];
                            $date=$row['comment_date'];
                            $posted_comments=$row['comment_content'];
                            echo"<hr style='height:2px;color:indigo;'>";
                           echo " <h4 class='media-heading'>$author
                                <small>$date</small>
                                    </h4>";
                            echo $posted_comments;
                        }
                    }*/

                    ?>            
                    <!-- End Nested Comment -->
                </div>
            </div>

        </div>
        <!-- Blog Sidebar Widgets Column -->
        <?php include "includes/sidebar.php";?>
    </div>
    <!-- /.row --><hr>
    <script src="js/jQuery.js"></script>
    <script>
        /*$(document).ready(function(){
            var $post_id= <?php //echo $id?>; 
            var $user_name= <?php //echo $author?>; 
            $('#like').click(function(){
                //console.log("hi"); 
                $.ajax({
                    url:"post-view.php?p_id=<?php //echo $id; ?>",
                    type:"post",
                    data:{'like':1,'post_id':post_id,'user_name':user_name},
                    success:function(data){

                    }

                });
            });

        });*/
    </script>

    <?php include "includes/footer.php";?>
