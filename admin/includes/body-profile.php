<?php //session_start();?>


<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Welcome to Admin 
                    <small><?php echo $_SESSION['user_name']?></small>
                </h1>
                <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                       <tr> 
                        <th>ID</th>
                        <th>User Name</th>
                        <th>Password</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Image</th>
                        <th>Role</th>
                        <th>Edit</th>
                        </tr>

                    </thead>
                    <tbody>
                    <?php 
                        if(isset($_SESSION['user_name'])){
                        $username=$_SESSION['user_name'];
                        $sql="SELECT * FROM users WHERE user_name='{$username}'";
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
                                        <td>{$user_pass}</td>
                                        <td>{$user_fname}</td>
                                        <td>{$user_lname}</td>
                                        <td>{$user_email}</td>
                                        <td><img src='../images/{$user_image}' width='100px'></td>
                                        <td>{$user_role}</td>
                                        <td><a href='edit-user.php?edit={$user_id}'><i class='fa fa-pencil-square-o fa-3x' style='color:green;'></i></a></td>
                                        </tr>";
                                    }
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
