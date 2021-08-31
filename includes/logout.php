<?php session_start();?>
<?php
        $_SESSION['user_name']=null;
        $_SESSION['user_firstname']=null;
        $_SESSION['user_lastname']=null;
        $_SESSION['user_roal']=null;
        header("location:../index.php");
?>