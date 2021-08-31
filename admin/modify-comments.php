<?php include"../includes/db.php";?>
<?php
//deleting comments
if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $sql="DELETE FROM comments WHERE comment_id = {$id}";
    $delete_post_result=mysqli_query($connection,$sql);
    if(!$delete_post_result){
        die("Can't Deleted".mysqli_error($connection));
    }else{
        header("location:view-all-comments.php");
    }
}
?>
<?php 
//for approving comments
if(isset($_GET['approve'])){
    $id=$_GET['approve'];
    $sql="UPDATE comments SET comment_status='approve' WHERE comment_id = $id ";
    $approve_result=mysqli_query($connection,$sql);
    if(!$approve_result){
        die("can't approve".mysqli_error($connection));
    }else{
      header("location:view-all-comments.php");
  
    }
}
?>
<?php 
//for unapproving comments
if(isset($_GET['unapprove'])){
    $id=$_GET['unapprove'];
    $sql="UPDATE comments SET comment_status='unapprove' WHERE comment_id = $id ";
    $unapprove_result=mysqli_query($connection,$sql);
    if(!$unapprove_result){
        die("can't unapprove".mysqli_error($connection));
    }else{
      header("location:view-all-comments.php");
  
    }
}
?>