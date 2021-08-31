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
        <?php //include"includes/body.php";?>
        <div id="page-wrapper">
            <div class="container-fluid overflow-auto">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header" align="center">
                            Welcome to Admin
                            <small>Author</small>
                        </h2>
                        <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="table-info">
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Catagory</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Tags</th>
                                    <th>Comments</th>
                                    <th>Comment Count</th>
                                    <th>Date</th>                                    
                                    <th>Post View</th>                                    
                                    <th>Delete</th>
                                    <th>Update</th>
                                    <!--
                                    <th>Update</th>
                                    <th>Update</th>
                                    <th>Update</th>
                                    -->
                                </tr>
                            </thead>
                            <tbody style="height:10px !important; overflow:scroll; " >
                                <?php 
                                $sql="SELECT * FROM posts";
                                $result=mysqli_query($connection,$sql);
                                while($row = mysqli_fetch_assoc($result)){
                                    if($row>0){
                                        $post_id=$row['post_id'];
                                        $post_author=$row['post_author'];
                                        $post_title=$row['post_title'];
                                        $post_catagory=$row['post_catagory_id'];
                                        $post_status=$row['post_status'];
                                        $post_image=$row['post_image'];
                                        $post_tags=$row['post_tags'];
                                        $post_comment=$row['post_content'];
                                        $post_date=$row['post_date'];
                                        $comment_count=$row['post_comment_count'];
                                        $post_view=$row['post_view_count'];
                                            echo "<tr>
                                                <td>{$post_id}</td>
                                                <td>{$post_author}</td>
                                                <td>{$post_title}</td>
                                                <td>{$post_catagory}</td>";
                                             
                                       /* $sql="SELECT * FROM catagories WHERE cat_id = {$post_catagory}";
                                        $result=mysqli_query($connection,$sql);
                                            while($row = mysqli_fetch_assoc($result)){
                                            $the_id=$row['cat_id'];
                                            $cat_title=$row['cat_title'];
                                           echo "<td>{$cat_title}</td>";    
                                                
                                                
                                        }*/
                                            

                                               
                                               echo "<td>{$post_status}</td>
                                                <td><img src='../images/{$post_image}' width='100px'></td>
                                                <td>{$post_tags}</td>
                                                <td>{$post_comment}</td>
                                                <td>{$comment_count}</td>
                                                <td>{$post_date}</td>
                                                <td>{$post_view}</td>
                                                <td><a href='posts.php?delete={$post_id}'><i class='fa fa-trash fa-3x' style='color:red;' ></i></a></td>
                                                <td><a href='update-posts.php?p_id={$post_id}'><i class='fa fa-pencil-square-o fa-3x' style='color:green;'></i></a></td>
                                            </tr>";
                                        }
                                    }

                                ?>
                            </tbody>
                        </table> 
                        </div>                      
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <?php //delete the posts
                                    if(isset($_GET['delete'])){
                                        $id=$_GET['delete'];
                                        $sql="DELETE FROM posts WHERE post_id = {$id}";
                                        $delete_post_result=mysqli_query($connection,$sql);
                                        if(!$delete_post_result){
                                            die("Can't Deleted".mysqli_error($connection));
                                        }else{
                                            header("location:posts.php");
                                        }


                                    }
            ?>
        </div>
        <!-- /#page-wrapper -->
    </div>
    <script src="js/jQuery.js"></script>

    <?php include"includes/footer.php";?>

