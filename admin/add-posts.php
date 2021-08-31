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
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header" align="center">
                            Welcome to Admin
                            <small>Author</small>
                        </h2>
                        <form action="post-save.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="post_catagory_id">Post Catagory Id:</label> 
                             <input type="number" class="form-control"  id="post_catagory_id" name="post_catagory_id">
                            </div>
                            <div class="form-group">
                                <label for="post_title">Post Title:</label>
                                <input type="text" class="form-control"  id="post_title" name="post_title">
                            </div>
                            <div class="form-group">
                                <label for="post_author">Post Author:</label>
                                <input type="text" class="form-control"  id="post_author" name="post_author">
                            </div>
                            <div class="form-group">
                                <label for="post_tag">Post Tags:</label>
                                <input type="text" class="form-control"  id="post_tag" name="post_tag">
                            </div>
                            <div class="form-group">
                                <label for="post_status">Post Status:</label>
                                <input type="text" class="form-control"  id="post_status" name="post_status">
                            </div>
                            <div class="form-group">
                                <label for="post_date">Post Date:</label>
                                <input type="date" class="form-control"  id="post_date" name="post_date">
                            </div>

                            <div class="form-group">
                                <label for="post_image">Post Image:</label>
                                <input type="file" class="form-control"  id="post_image" name="post_image">
                            </div>
                            <div class="form-group">
                                <label for="post_comment"> Post Comment:</label>
                                <textarea class="form-control" rows="5" name="post_comment" id="post_comment"></textarea>
                            </div>


                            <button type="submit" class="btn btn-primary" name="save-post">Submit</button>
                        </form>


                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>
    <?php include"includes/footer.php";?>
