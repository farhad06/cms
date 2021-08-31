<?php //include "includes/db.php";?>
           <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <?php  
                $session=session_id();
                $time=time();
                $time_out_in_second=60;
                $time_out=$time - $time_out_in_second;
                // $sql="SELECT * FROM user_online WHERE session = '$session' ";
                // $send_sql=mysqli_query($connection,$sql);
                // $count=mysqli_num_rows($send_sql);
                // if($count == NULL){
                //     mysqli_query($connection,"INSERT INTO user_online (session,time) VALUES ('$session',$time)");
                // }else{
                //     mysqli_query($connection,"UPDATE user_online time=$time " );
                // }
                    $user_count_sql=mysqli_query($connection,"SELECT * FROM user_online WHERE time > $time_out " );
                    $user_count=mysqli_num_rows($user_count_sql);

                ?>
                <a class="navbar-brand" href="index.php">Home</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    
                       <?php 
                    
                    $sql="SELECT * FROM catagories";
                    $result=mysqli_query($connection,$sql);
                    while($row=mysqli_fetch_assoc($result)){
                        if($row>0){
                            $cat_title= $row['cat_title'];
                            //echo "<li><a href='#'>{$cat_title}</a></li>";
                        }
                    }
                    
                    ?>
                       
                       
                       <li>
                        <a href="admin">Admin</a>
                        </li>
                        <li>
                            <a href="registration.php">Registration</a>
                        </li>
                      <!--   <li>
                            <a href="">User Online <?php  $user_count; ?></a>
                        </li> -->
                    <!--<li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>-->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>