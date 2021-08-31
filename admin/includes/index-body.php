<?php //session_start();?>


<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Welcome to Admin 
                    <small><?php echo $_SESSION['user_name']?></small>
                </h1>
            </div>
        </div>
        <!-- /.row -->

        <!-- /.row -->

        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-file-text fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                               <?php 
                                $sql = "SELECT * FROM posts";
                                $show_post=mysqli_query($connection,$sql);
                                $post_count=mysqli_num_rows($show_post);
                                ?>
                                <div class='huge'><?php echo $post_count; ?></div>
                                <div>Posts</div>
                            </div>
                        </div>
                    </div>
                    <a href="posts.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-comments fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                               <?php 
                                $sql = "SELECT * FROM comments";
                                $show_comments=mysqli_query($connection,$sql);
                                $comment_count=mysqli_num_rows($show_comments);
                                ?>
                                <div class='huge'><?php echo $comment_count; ?></div>
                                <div>Comments</div>
                            </div>
                        </div>
                    </div>
                    <a href="view-all-comments.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-user fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                               <?php 
                                $sql = "SELECT * FROM users";
                                $show_users=mysqli_query($connection,$sql);
                                $user_count=mysqli_num_rows($show_users);
                                ?>
                                <div class='huge'><?php echo $user_count; ?></div>
                                <div> Users</div>
                            </div>
                        </div>
                    </div>
                    <a href="view-all-user.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-list fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                               <?php 
                                $sql = "SELECT * FROM catagories";
                                $show_catagoriy=mysqli_query($connection,$sql);
                                $catagoty_count=mysqli_num_rows($show_catagoriy);
                                ?>
                                <div class='huge'><?php echo $catagoty_count; ?></div>
                                <div>Categories</div>
                            </div>
                        </div>
                    </div>
                    <a href="catagories.php">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
             <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],
            <?php 
            
            $element_text=['Posts','Comments','Users','Catagories'];
            $element_count=[$post_count,$comment_count,$user_count,$catagoty_count];
            for($i=0;$i<4;$i++){
                echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
            }
            
            
            
            
            ?>
          //['Posts', 1000]
//          ['2015', 1170, 460, 250],
//          ['2016', 660, 1120, 300],
//          ['2017', 1030, 540, 350]
        ]);

        var options = {
          chart: {
            title: 'CMS Data',
            subtitle: 'Posts ,Comments, Users ,Catagories: From 2019 - 2020',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
        </div>
        <div id="columnchart_material" style="width:'auto'; height: 500px;"></div>

    </div>
    <!-- /.container-fluid -->


</div>
<!-- /#page-wrapper -->

</div>
