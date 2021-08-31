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
                        <form action="" method="post" enctype="multipart/form-data">
                            <?php 
                            if(isset($_GET['edit'])){
                                $id=$_GET['edit'];

                                $sql="SELECT * FROM users WHERE user_id={$id}";
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
                                    }}}
                            ?>

                            <div class="form-group">
                                <label for="user_name">User Name:</label>
                                <input value="<?php echo $user_name?>"type="text" class="form-control" name="user_name">
                            </div>
                            <div class="form-group">
                                <label for="post_author">Password:</label>
                                <input type="password"value="<?php echo $user_pass?>"class="form-control" name="user_password">
                            </div>
                            <div class="form-group">
                                <label for="fname">First Name:</label>
                                <input type="text"value="<?php echo $user_fname?>" class="form-control"name="fname">
                            </div>                           
                            <div class="form-group">
                                <label for="lname">Last Name:</label>
                                <input type="text"value="<?php echo $user_lname?>" class="form-control" name="lname">
                            </div>  
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" value="<?php echo $user_email?>"class="form-control" name="email">
                            </div>
                            <div class="form-group">
                                <label for="user_role">Role:</label>
                                <select class="form-control"  name ="role">
                                    <option value="<?php echo $user_role?>"><?php echo $user_role?></option>
                                    <option value="admin">Admin</option>
                                    <option value="subscriber">Subscriber</option>
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="user_image">Image:</label>
                                <img src='../images/<?php echo $user_image?>' width='100px'>
                                <input type="file" class="form-control"name="user_image">
                            </div>
                            <button type="submit" class="btn btn-success" name="edit-user">Edit User</button>
                        </form>
    <?php
    //edit user sql.
    if(isset($_POST['edit-user'])){
        $userName= $_POST['user_name'];
        $password= $_POST['user_password'];
        $firstName= $_POST['fname'];
        $lastName= $_POST['lname'];
        $email= $_POST['email'];
        $role= $_POST['role'];
        $user_image=$_FILES['user_image']['name'];
        $user_image_temp=$_FILES['user_image']['tmp_name'];
        $sql="SELECT user_randSalt FROM users";
        $select_randSalt=mysqli_query($connection,$sql);
        if(!$select_randSalt){
          die('SQL Failed'.mysqli_error($connection));  
        }
        $row=mysqli_fetch_array($select_randSalt);
        $randSalt=$row['user_randSalt'];
        $password=crypt($password,$randSalt);
        move_uploaded_file($user_image_temp,"../images/$user_image");
        $sql="UPDATE users SET user_name='$userName',user_password='$password',user_firstname='$firstName',user_lastname='$lastName',user_email='$email',user_image='$user_image',user_roal='$role' WHERE user_id ={$id} " ;
        $result=mysqli_query($connection,$sql);
        if(!$result){
            die("Data not update".mysqli_error($connection));
        }else{
            header("location:view-all-user.php");
        }

    }
                        ?>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
    </div>

    <?php include"includes/footer.php";?>
