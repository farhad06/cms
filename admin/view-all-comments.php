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
                                    <th>Email</th>
                                    <th>Comments</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Approve</th>
                                    <th>Unapprove</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $sql="SELECT * FROM comments";
                                $result=mysqli_query($connection,$sql);
                                while($row = mysqli_fetch_assoc($result)){
                                    if($row>0){
                                        $comment_id=$row['comment_id'];
                                        $comment_author=$row['comment_author'];
                                        $comment_email=$row['comment_email'];
                                        $comment=$row['comment_content'];
                                        $comment_status=$row['comment_status'];
                                        $comment_date=$row['comment_date'];
                                        echo "<tr>
                                                <td>{$comment_id}</td>
                                                <td>{$comment_author}</td>
                                                <td>{$comment_email}</td>
                                                <td>{$comment}</td>";

                                        /* $sql="SELECT * FROM catagories WHERE cat_id = {$post_catagory}";
                                        $result=mysqli_query($connection,$sql);
                                            while($row = mysqli_fetch_assoc($result)){
                                            $the_id=$row['cat_id'];
                                            $cat_title=$row['cat_title'];
                                           echo "<td>{$cat_title}</td>";    


                                        }*/



                                        echo "<td>{$comment_status}</td>
                                                <td>{$comment_date}</td>
                                                <td><a href='modify-comments.php?approve={$comment_id}'><button class='btn btn-success'>Approve</button></a></td>
                                                <td><a href='modify-comments.php?unapprove={$comment_id}'><button class='btn btn-danger'>Unpprove</button></a></td>
                                                <td><a href='modify-comments.php?delete={$comment_id}'><i class='fa fa-trash fa-3x' style='color:red;'></i></a></td>
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

        </div>
        <!-- /#page-wrapper -->
    </div>
    <?php include"includes/footer.php";?>

