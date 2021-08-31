<?php //include "includes/db.php";?>


<div class="col-md-4">

    <!-- Blog Search Well -->
    <div class="well">
        <h4><strong>Blog Search</strong></h4>
        <form action="search.php" method="post">

        <div class="input-group">
        <input type="text" name="search" class="form-control">
            <span class="input-group-btn">
                <button name="submit" class="btn btn-default" type="submit">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </span>
            
        </div>
        
        </form>
    </div>
        <div class="well">
        <h4><strong>Login</strong></h4>
        <form action="includes/user-login.php" method="post">

        <div class="form-group">
        <lable for="username">User Name:</lable>
         <input type="text" name="username" class="form-control" placeholder="Enter valid user name">
         </div>
         <div class="form-group">
        <lable for="userpassword">Password:</lable>
         <input type="password" name="userpassword" class="form-control" placeholder="Enter valid password">
         </div>
         <div>
             <button type="submit" name="login" class="btn btn-primary">Login</button>
         </div>
        </form>
        <!-- /.input-group -->
    </div>

    <!-- Blog Categories Well -->
    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
            <ul class="list-unstyled">     
            <?php 
                $sql="SELECT * FROM catagories";
                $result=mysqli_query($connection,$sql);
                while($row=mysqli_fetch_assoc($result)){
                    if($row>0){
                        $cat_title= $row['cat_title'];
                            echo "<li><a href='#'>{$cat_title}</a></li>";
                        }
                    }
                    
                    ?>
                </ul>
            </div>
        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <div class="well">
        <h4>Side Widget Well</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
    </div>

</div>
