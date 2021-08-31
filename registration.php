<?php session_start();?>
<?php include "includes/db.php";?>
<?php include "includes/header.php";?>
<?php include "includes/navigation.php"; ?>
<!-- Page Content -->
<?php
global $succ_message,$err_message;
if(isset($_POST['submit'])){
   $username=$_POST['username'];
   $email=$_POST['email'];
   $password=$_POST['password'];

    $username=mysqli_real_escape_string($connection,$username);
    $email=mysqli_real_escape_string($connection,$email);
    $password=mysqli_real_escape_string($connection,$password);
    $sql="SELECT user_randSalt FROM users";
    $select_randSalt=mysqli_query($connection,$sql);
    if(!$select_randSalt){
      die('SQL Failed'.mysqli_error($connection));  
    }
    $row=mysqli_fetch_array($select_randSalt);
    $randSalt=$row['user_randSalt'];
    $password=crypt($password,$randSalt);
    
    if(!empty($username) && !empty($email) && !empty($password)){
    $sql="INSERT INTO users (user_name,user_password,user_email,user_roal)";
    $sql.="VALUES ('{$username}','{$password}','{$email}','subscriber')";
    $reg_result=mysqli_query($connection,$sql);
    if(!$reg_result){
        die('Insertion Failed'.mysqli_error($connection));
    }else{
        //echo '<script> alert("Saved"); </script>';
        $succ_message="Successfully Registered";
        //header("location:registration.php");
    }
    }else{
        $err_message="All fields are requeried";
    }

}

?>
<div class="container">
 <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="form-wrap">
                        <h1>Register</h1>
                        <form role="form" action="" method="post" id="login-form" autocomplete="off">
                           <h5 style="color:green;" class="text-center"><?php echo $succ_message; ?></h5>
                           <h5 style="color:red;" class="text-center"><?php echo $err_message; ?></h5>
                            <div class="form-group">
                                <label for="username" class="sr-only">username</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                            </div>
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                            </div>
                            <div class="form-group">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                            </div>

                            <input type="submit" name="submit" id="btn-login" class="btn btn-success btn-lg btn-block" value="Register">
                        </form>

                    </div>
                </div>
            </div> 
        </div> 
    </section>
    <hr>
    <?php include "includes/footer.php";?>
