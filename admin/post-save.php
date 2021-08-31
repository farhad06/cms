<?php include "../includes/db.php"; ?>
<?php 
  if(isset($_POST['save-post'])){
      $post_catagory_id = $_POST['post_catagory_id'];
      $post_title= $_POST['post_title'];
      $post_author= $_POST['post_author'];
      $post_tag= $_POST['post_tag'];
      $post_status= $_POST['post_status'];
      $post_comment=$_POST['post_comment'];
      $post_comment_count=4;
      $post_date=$_POST['post_date'];
      $post_image=$_FILES['post_image']['name'];
      $post_image_temp=$_FILES['post_image']['tmp_name'];
      move_uploaded_file($post_image_temp,"../images/$post_image");
      $sql = "INSERT INTO posts (post_catagory_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status) VALUES ( $post_catagory_id,'$post_title','$post_author', '$post_date','$post_image',
      '$post_comment','$post_tag',$post_comment_count,'$post_status') ";
      $result=mysqli_query($connection,$sql);
      if(!$result){
          die("Data not inserted".mysqli_error($connection));
      }else{
          header("location:posts.php");
      }
      
  }













?>