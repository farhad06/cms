<?php include "includes/db.php";?>
<?php
//for insert comment sql 
if(isset($_POST['create-comment'])){
    $post_id=4;
    $author=$_POST['comment_author'];
    //echo $author;
    $email=$_POST['comment_email'];
    $comment=$_POST['comment'];
    $sql="INSERT INTO comments (comment_post_id, comment_author, comment_email, comment_content, comment_status, comment_date) VALUES ($post_id,'$author','$email','$comment','unapproved',now()) ";
    $create_comment=mysqli_query($connection,$sql);
    if(!$create_comment){
        die("Creating comments Failed".mysqli_error($connection));
    }else{
        //echo "<script> alert('Comment Saved')</script>";
        header("location:index.php");
    }
}

?>