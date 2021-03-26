<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>
    
    <!-- Page Content -->
    <div class="container">

        <div class="row">
        

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <?php
                $qry = "SELECT * FROM posts WHERE post_status='published'";
                $result = mysqli_query($connection,$qry) or
                die (mysqli_error($connection));
                $cnt = 0;
                while($row=mysqli_fetch_assoc($result))
                {
                  $cnt++;
                  $post_id=$row['post_id'];
                  $post_title=$row['post_title'];
                  $post_author=$row['post_author'];
                  $post_date=$row['post_date'];
                  $post_image=$row['post_image'];
                  $post_content=$row['post_content'];
                  $post_status=$row['post_status'];
                 ?>
                <!--<h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>-->

                <!-- First Blog Post -->
                <h2>
                    <b><?php echo $post_title; ?></b>
                </h2>
                <p class="lead">
                    by <b><?php echo $post_author; ?></b>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive"
                src="images/<?php echo $post_image; ?>" 
                alt="">
                <hr>
                <p><i><?php echo $post_content; ?></i></p>
                <a class="btn btn-primary" href="post.php?post_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                <hr>
              <?php 
                }
                   if($cnt==0) 
                     echo "<h1>NO POSTS SORRY</h1>";
                ?>
                
               <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

            <!-- Blog Sidebar Widgets Column -->
     <?php include "includes/sidebar.php"; ?>

        </div>
        <!-- /.row -->

        <hr>
<?php include "includes/footer.php"; ?>