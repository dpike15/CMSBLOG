<?php include "includes/admin_header.php"; ?>

<div id="wrapper">
        <!-- Navigation -->
<?php include "includes/admin_navigation.php"; ?>
       
       
   <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin Area
                            
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1
                                 
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
                                      $query = "SELECT * FROM posts";
                                      $returnedQuery = mysqli_query($connection,$query);
                                      $post = mysqli_num_rows($returnedQuery);
                                    ?>
                                  <div class='huge'><?php echo $post; ?></div>
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
                                      $query = "SELECT * FROM comments";
                                      $returnedQuery = mysqli_query($connection,$query);
                                      $comments  = mysqli_num_rows($returnedQuery);
                                    ?>
                                     <div class='huge'><?php echo $comments ?></div>
                                      <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="comments.php">
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
                                      $query = "SELECT * FROM users";
                                      $returnedQuery = mysqli_query($connection,$query);
                                      $users  = mysqli_num_rows($returnedQuery);
                                    ?>
                                    <div class='huge'><?php echo $users; ?></div>
                                        <div> Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="users.php">
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
                                      $query = "SELECT * FROM categories";
                                      $returnedQuery = mysqli_query($connection,$query);
                                      $categories  = mysqli_num_rows($returnedQuery);
                                    ?>
                                        <div class='huge'><?php echo $categories; ?></div>
                                         <div>Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href="categories.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                 <?php
                    $query = "SELECT * FROM posts WHERE post_status='draft'";
                    $select_all_draft_posts = mysqli_query($connection,$query);
                    $drafts = mysqli_num_rows($select_all_draft_posts);     
                            
                    $query = "SELECT * FROM comments WHERE comment_status='unapproved'";
                    $select_all_unapproved = mysqli_query($connection,$query);
                    $unapproved = mysqli_num_rows($select_all_unapproved);  
                            
                    $query = "SELECT * FROM users WHERE user_role='Subscriber'";
                    $select_all_Subscriber = mysqli_query($connection,$query);
                    $subs = mysqli_num_rows($select_all_Subscriber);

                ?>

                               
                                <!-- /.row -->  
                                <div class="row">
                                    
                                    <script type="text/javascript">
                                      google.charts.load('current', {'packages':['bar']});
                                      google.charts.setOnLoadCallback(drawStuff);

                                      function drawStuff() {
                                        var data = new google.visualization.arrayToDataTable([
                                          ['Data', 'Count'],
                                          <?php
                                            $element_text = ['Active Post','Draft Posts','Comments','Unapproved','Users','Subscribers','Categories'];
                                            $element_counts = [$post,$drafts,$comments,$unapproved,$users,$subs,$categories];    
                                            
                                            for($i = 0; $i < 7;$i++){
                                                echo "['$element_text[$i]'".","."$element_counts[$i]],";
                                            }
                                           
                                            ?>

                                        ]);

                                        var options = {
                                          title: '',
                                          width: 'auto',
                                          legend: { position: 'none' },
                                          chart: { subtitle: '' },
                                          axes: {
                                            x: {
                                              0: { side: 'top', label: ''} // Top x-axis.
                                            }
                                          },
                                          bar: { groupWidth: "90%" }
                                        };

                                        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
                                        // Convert the Classic options to Material options.
                                        chart.draw(data, google.charts.Bar.convertOptions(options));
                                      };
                                    </script>
                                    <div id="top_x_div" style="width:'auto'; height: 500px;"></div>
                                </div>
                        
    <?php include "includes/admin_footer.php"; ?>