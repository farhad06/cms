<?php include "includes/admin-header.php";?>

<body>
    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">CMS Admin</a>
            </div>
            <?php include "includes/topmenu.php";?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php include "includes/sidebar.php";?>
            <!-- /.navbar-collapse -->
        </nav>
        <?php //include"posts.php";?>
        <div id="page-wrapper">
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header" align="center">
                            Welcome to Admin
                            <small>Author</small>
                        </h2>
                        <form action="" method="post" enctype="multipart/form-data">
                            <?php 
                            if(isset($_GET['p_id'])){
                                //echo $_GET['p_id'];
                                $posts_id=$_GET['p_id'];
                                $sql="SELECT * FROM posts WHERE post_id = {$posts_id} ";
                                $result=mysqli_query($connection,$sql);
                                while($row = mysqli_fetch_assoc($result)){
                                    $post_author=$row['post_author'];
                                    $post_title=$row['post_title'];
                                    $post_catagory=$row['post_catagory_id'];
                                    $post_status=$row['post_status'];
                                    $post_image=$row['post_image'];
                                    $post_tags=$row['post_tags'];
                                    $post_comment=$row['post_content'];
                                    $post_date=$row['post_date'];
                                }}?>
                            <div class="form-group">
                                <label for="post_catagory_id">Post Catagory  Id:</label>
                                <input  value="<?php if(isset($post_catagory)){ echo $post_catagory;} ?>" type="number" class="form-control"  id="post_catagory_id" name="post_catagory_id">
                            </div>

                            <div class="form-group">
                                <label for="post_title">Post Title:</label>
                                <input  value="<?php if(isset($post_title)){ echo $post_title;} ?>" type="text" class="form-control"  id="post_title" name="post_title">
                            </div>
                            <div class="form-group">
                                <label for="post_author">Post Author:</label>
                                <input type="text"   value="<?php if(isset($post_author)){ echo $post_author;} ?>" class="form-control"  id="post_author" name="post_author">
                            </div>
                            <div class="form-group">
                                <label for="post_tag">Post Tags:</label>
                                <input type="text"  value="<?php if(isset($post_tags)){ echo $post_tags;} ?>" class="form-control"  id="post_tag" name="post_tag">
                            </div>
                            <div class="form-group">
                                <label for="post_status">Post Status:</label>
                                <input type="text"  value="<?php if(isset($post_status)){ echo $post_status;} ?>" class="form-control"  id="post_status" name="post_status">
                            </div>
                            <div class="form-group">
                                <label for="post_date">Post Date:</label>
                                <input type="date"   value="<?php if(isset($post_date)){ echo $post_date;} ?>" class="form-control"  id="post_date" name="post_date">
                            </div>

                            <div class="form-group">
                                <label for="post_image">Post Image:</label>
                                <img src='../images/<?php echo $post_image ?>' width='100px'>
                                <input type="file" class="form-control"  id="post_image" name="post_image">
                            </div>
                            <div class="form-group">
                                <label for="post_comment"> Post Comment:</label>
                                <textarea class="form-control"   rows="5" name="post_comment" id="post_comment">
                                    <?php if(isset($post_comment)){ echo $post_comment;} ?>
                                </textarea>
                            </div>


                            <button type="submit" class="btn btn-success" name="edit-post">Edit</button>
                        </form>
                        <?php //Update Sql
                        if(isset($_POST['edit-post'])){
                            $post_catagory_id = $_POST['post_catagory_id'];
                            $post_title= $_POST['post_title'];
                            $post_author= $_POST['post_author'];
                            $post_tag= $_POST['post_tag'];
                            $post_status= $_POST['post_status'];
                            $post_comment=$_POST['post_comment'];
                            $post_comment_count=4;
                            $post_date=$_POST['post_date'];
                            $post_image=$_FILES['post_image']['name'];
                            $post_image_temp=$_FILES['post_image']['tmp_name'];
                            move_uploaded_file($post_image_temp,"../images/$post_image");

                            $sql = " UPDATE posts SET post_catagory_id={$post_catagory_id},post_title='{$post_title}',post_author='{$post_author}',post_date='{$post_date}',post_tags='{$post_tags}',post_status = '{$post_status}' ,post_image='{$post_image}',post_content='{$post_comment}' WHERE post_id = {$posts_id} " ;
                            $result=mysqli_query($connection,$sql);
                            if(!$result){
                                die("Update Failed".mysqli_error($connection));
                            }else{
                                header("location:posts.php");
                            }
                        }

                        ?> </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <?php include"includes/footer.php";?>
