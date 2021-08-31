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
                        <h1 class="page-header">
                            Welcome to Admin
                            <small>Author</small>
                        </h1>

                        <div class="col-xs-6">
                            <!--Form for add catagories-->
                            <form action="add-catagories.php" method="post">
                                <lable for="cat-title">Add Catagory</lable>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" name="submit" value="Add Cartagories">
                                </div>
                            </form>
                         <?php
                        if(isset($_GET['update'])){
                            include "update-catagories.php";
    
                            }?>

                        </div>
                        <!-- end Form for add catagories-->


                        <!-- Show Catagories table Data -->
                        <div class="col-xs-6">
                            <table class="table table-borderd table-hover table-redponsive-md">
                                <?php
                                //FINDING ALL DOCUMENTS
                                $sql = "SELECT * FROM catagories";
                                $catagoty_show_result=mysqli_query($connection,$sql);
                                while($row=mysqli_fetch_assoc($catagoty_show_result)){
                                    $cat_id=$row['cat_id'];
                                    $cat_title=$row['cat_title'];
                                    echo "<tr>
                                        <td>{$cat_id}</td>
                                        <td>{$cat_title}</td>
                                        <td><a href='catagories.php?delete={$cat_id}'><button class='btn btn-danger'>Delete</button></a></td>
                                        <td><a href='catagories.php?update={$cat_id}'><button class='btn btn-success'>Update</button></a></td>
                                        </tr>";
                                }
                                ?>
                                <?php
                                //DELETE CATAGORIES
                                if(isset($_GET['delete'])){
                                    $cata_id=$_GET['delete'];
                                    $sql="DELETE FROM catagories WHERE cat_id = {$cata_id} ";
                                    $catagory_delete_result=mysqli_query($connection,$sql);
                                    if(!$catagory_delete_result){
                                        die("Delete Failed".mysqli_error($connection));
                                    }else{
                                        header("location:catagories.php");
                                    }

                                }                       
                                ?>

                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Catagory Title</th>
                                        <th>Delete</th>
                                        <th>Update</th>
                                    </tr>
                                </thead>
                                <tbody>

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
    <?php //include "includes/sidebar.php";?>
    <?php include"includes/footer.php";?>
