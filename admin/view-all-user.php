<?php include "includes/admin-header.php";?>
<!--
<style>
    cell{
        word-wrap: break-word;
        max-width: 1px;
    }

</style>
-->

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
                                    <th class="col-md-1">Id</th>
                                    <th>User Name</th>
                                    <th>Password</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Image</th>
                                    <th>Role</th>
                                    <th>RandSalt</th>
                                    <th>Delete</th>
                                    <th>Update</th>
                                </tr>
                            </thead>
                            <tbody style="height:10px !important; overflow:scroll; " >
                                <?php 
                                $sql="SELECT * FROM users";
                                $result=mysqli_query($connection,$sql);
                                while($row = mysqli_fetch_assoc($result)){
                                    if($row>0){
                                        $user_id=$row['user_id'];
                                        $user_name=$row['user_name'];
                                        $user_pass=$row['user_password'];
                                        $user_fname=$row['user_firstname'];
                                        $user_lname=$row['user_lastname'];
                                        $user_email=$row['user_email'];
                                        $user_image=$row['user_image'];
                                        $user_role=$row['user_roal'];
                                        $user_rand=$row['user_randSalt'];
                                            echo "<tr>
                                                <td>{$user_id}</td>
                                                <td>{$user_name}</td>
                                                <td class='cell'>{$user_pass}</td>
                                                <td>{$user_fname}</td>";
                                             
                                       /* $sql="SELECT * FROM catagories WHERE cat_id = {$post_catagory}";
                                        $result=mysqli_query($connection,$sql);
                                            while($row = mysqli_fetch_assoc($result)){
                                            $the_id=$row['cat_id'];
                                            $cat_title=$row['cat_title'];
                                           echo "<td>{$cat_title}</td>";    
                                                
                                                
                                        }*/
                                            

                                               
                                               echo "<td>{$user_lname}</td>
                                                    <td>{$user_email}</td>
                                                <td><img src='../images/{$user_image}' width='100px'></td>
                                                <td>{$user_role}</td>
                                                <td class='cell'>{$user_rand}</td>             
                                                <td><a href='save-user.php?delete={$user_id}'><i class='fa fa-trash fa-3x' style='color:red;' ></i></a></td>
                                                <td><a href='edit-user.php?edit={$user_id}'><i class='fa fa-pencil-square-o fa-3x' style='color:green;'></i></a></td>

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

