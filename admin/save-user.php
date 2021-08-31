<?php include "../includes/db.php"; ?>
<?php
//Insert user sql.
if(isset($_POST['add-user'])){
    $userName= $_POST['user_name'];
    $password= $_POST['user_password'];
    $firstName= $_POST['fname'];
    $lastName= $_POST['lname'];
    $email= $_POST['email'];
    $role= $_POST['role'];
    $user_image=$_FILES['user_image']['name'];
    $user_image_temp=$_FILES['user_image']['tmp_name'];
    move_uploaded_file($user_image_temp,"../images/$user_image");
    $sql="INSERT INTO users( user_name, user_password, user_firstname, user_lastname, user_email, user_image, user_roal, user_randSalt) VALUES ('$userName','$password','$firstName','$lastName','$email','$user_image','$role','')";
    $result=mysqli_query($connection,$sql);
    if(!$result){
        die("Data not inserted".mysqli_error($connection));
    }else{
        header("location:view-all-user.php");
    }

}
?>


<?php 
//delete user sql.
if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $sql="DELETE FROM users WHERE user_id = {$id}";
    $delete_user_result=mysqli_query($connection,$sql);
    if(!$delete_user_result){
        die("Can't Deleted".mysqli_error($connection));
    }else{
        header("location:view-all-user.php");
    }


}



?>