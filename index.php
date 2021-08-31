<?php session_start();?>
<?php include "includes/db.php";?>
<?php include "includes/header.php";?>

<!-- Navigation -->
<?php include "includes/navigation.php"; ?>
<?php 
$session=session_id();
$time=time();
$time_out_in_second=60;
$time_out=$time - $time_out_in_second;
$sql="SELECT * FROM user_online WHERE session = '$session' ";
$send_sql=mysqli_query($connection,$sql);
$count=mysqli_num_rows($send_sql);
if($count == NULL){
    mysqli_query($connection,"INSERT INTO user_online (session,time) VALUES ('$session',$time)");
}else{
    mysqli_query($connection,"UPDATE user_online time=$time " );
}
    //$user_count_sql=mysqli_query($connection,"SELECT * FROM user_online WHERE time >'$time_out' " );
    //$user_count=mysqli_num_rows($user_count_sql);

?>
<!-- Page Content -->
<div class="container">
    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <?php 

            $sql="SELECT * FROM posts";
            $result=mysqli_query($connection,$sql);
            while($row=mysqli_fetch_assoc($result)){
                if($row>0){
                    $post_id=$row['post_id'];
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
                <a href="post-view.php?p_id=<?php echo $post_id;?>"><?php echo $post_title ;?></a>
            </h2>
            <p class="lead">
                by <a href="post-view.php?p_name=<?php echo $post_author;?>"><?php echo $post_author;?></a>
            </p>
            <p><span class="glyphicon glyphicon-time"></span> Posted on<?php echo $post_date;?></p>
            <hr>
            <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
            <hr>
            <p><?php //echo $post_content;?></p>
            <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a><hr>

            <?php     
                }
            }
           ?>
            <hr>
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

            <!-- Posted Comments -->

            <!--
Comment 
<div class="media">
<a class="pull-left" href="#">
<img class="media-object" src="http://placehold.it/64x64" alt="">
</a>
<div class="media-body">
<h4 class="media-heading">Start Bootstrap
<small>August 25, 2014 at 9:30 PM</small>
</h4>
Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
</div>
</div>
-->

            <!-- Comment -->
            <div class="media">
                <div class="media-body">
<!--
                    <h4 class="media-heading">Start Bootstrap
                        <small>August 25, 2014 at 9:30 PM</small>
                    </h4>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
-->
                    <?php
                    //show the approved comments
                    $sql="SELECT * FROM comments WHERE  comment_status ='approve' ";
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
                    }



                    ?>
                    <!--
Nested Comment 
<div class="media">
<a class="pull-left" href="#">
<img class="media-object" src="http://placehold.it/64x64" alt="">
</a>
<div class="media-body">
<h4 class="media-heading">Nested Start Bootstrap
<small>August 25, 2014 at 9:30 PM</small>
</h4>
Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
</div>
</div>
-->
                    <!-- End Nested Comment -->
                </div>
            </div>

        </div>
        <!-- Blog Sidebar Widgets Column -->
        <?php include "includes/sidebar.php";?>
    </div>
    <!-- /.row --><hr>
    <?php include "includes/footer.php";?>
