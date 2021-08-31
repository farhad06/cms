<?php include"db.php"; ?>
<?php session_start();?>
<?php 
if(isset($_POST['login'])){
    $username=$_POST['username'];
    $userpassword=$_POST['userpassword'];
    
    $username=mysqli_real_escape_string($connection,$username);
    $userpassword=mysqli_real_escape_string($connection,$userpassword);
    
    $sql="SELECT * FROM users WHERE user_name='{$username}'";
    $result=mysqli_query($connection,$sql);
    if(!$result){
        die("Login failed".mysqli_error($connection));
    }
    while($row=mysqli_fetch_assoc($result)){
        $db_user_id=$row['user_id'];
        $db_user_name=$row['user_name'];
        $db_user_fname=$row['user_firstname'];
        $db_user_lname=$row['user_lastname'];
        $db_user_password=$row['user_password'];
        $db_user_role=$row['user_roal'];
        //echo $db_user_role;
        
    }
    if( $username !== $db_user_name && $userpassword !== $db_user_password ){
        header("location:../index.php");
    }else{
        $_SESSION['user_name']=$db_user_name;
        $_SESSION['user_firstname']=$db_user_fname;
        $_SESSION['user_lastname']=$db_user_lname;
        $_SESSION['user_roal']=$db_user_role;
        header("location:../admin");
    }
}




?>