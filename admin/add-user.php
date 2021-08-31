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
                        <form action="save-user.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="user_name">User Name:</label>
                                <input type="text" class="form-control" name="user_name">
                            </div>
                            <div class="form-group">
                                <label for="post_author">Password:</label>
                                <input type="password" class="form-control" name="user_password">
                            </div>
                            <div class="form-group">
                                <label for="fname">First Name:</label>
                                <input type="text" class="form-control"name="fname">
                            </div>                           
                            <div class="form-group">
                                <label for="lname">Last Name:</label>
                                <input type="text" class="form-control" name="lname">
                            </div>  
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            <div class="form-group">
                                <label for="user_role">Role:</label>
                                <select class="form-control"  name ="role">
                                    <option value="0">Select Options</option>
                                    <option value="admin">Admin</option>
                                    <option value="subscriber">Subscriber</option>
                                </select>
                            </div>
                                <div class="form-group">
                                <label for="user_image">Image:</label>
                                <input type="file" class="form-control"name="user_image">
                            </div>
                            <button type="submit" class="btn btn-primary" name="add-user">Add User</button>
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
