<?php
    if(isset($_GET['post_id'])){
        $post_id=$_GET['post_id'];
        $qry="SELECT * FROM posts WHERE post_id = $post_id";
        $result=mysqli_query($connection,$qry);
        while($row=mysqli_fetch_assoc($result)){
            $post_category_id=$row['post_category_id'];
            $post_title=$row['post_title'];
            $post_author=$row['post_author'];
            $post_date=$row['post_date'];
            $post_image=$row['post_image'];
            $post_content=$row['post_content'];
            $post_tags=$row['post_tags'];
            $post_comment_count=$row['post_comment_count'];
            $post_status=$row['post_status'];
        }
        if(isset($_POST['update_post'])){
            $post_category_id=$_POST['post_category'];
            $post_title=$_POST['title'];
            $post_author=$_POST['post_author'];
            $post_date = date('d-m-y');
            $post_image=$_FILES['image']['name'];
            $post_image_temp=$_FILES['image']['tmp_name'];
            $post_content=$_POST['post_content'];
            $post_tags=$_POST['post_tags'];
            $post_status=$_POST['post_status'];
            move_uploaded_file($post_image_temp,"../images/$post_image");
            
            if(empty($post_image)){
                $qry="SELECT * FROM posts WHERE post_id=$post_id";
                $result=mysqli_query($connection,$qry);
                while($row=mysqli_fetch_assoc($result)){
                    $post_image=$row['post_image'];
                }
            }
            
            $qry="UPDATE posts set post_title = '$post_title',post_category_id = $post_category_id, post_date = '$post_date',post_author='$post_author',post_status='$post_status',post_tags = '$post_tags',post_content='$post_content',post_image='$post_image' WHERE post_id = $post_id";
            
            $result=mysqli_query($connection,$qry);
            confirmQuery($result);
            echo "<h3>POST UPDATED SUCCESSFULLY</h3>";
        }
    }
?>
   <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" value="<?php echo $post_title; ?>" name="title">
    </div>
    <div class="form-group">
        <label for="title">Post Category</label>
        <select name="post_category" id="post_category">
            <?php
            $qry="SELECT * FROM categories";
            $result=mysqli_query($connection,$qry);
            confirmQuery($result);
            while($row=mysqli_fetch_assoc($result)){
                $cat_id=$row['cat_id'];
                $cat_title=$row['cat_title'];
                echo"<option value='$cat_id'>$cat_title</option>";
            }
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="title">Post Author</label>
        <input type="text" class="form-control" value="<?php echo $post_author; ?>" name="post_author">
    </div>
    <div class="form-group">
        <label for="title">Post Status</label>
        <input type="text" class="form-control" value="<?php echo $post_status; ?>" name="post_status">
    </div>
    <div class="form-group">
        <img width="100" src="../images/<?php echo $post_image; ?>">
    </div>
    <div class="form-group">
        <label for="title">Post Image</label>
        <input type="file" name="image">
    </div>
    <div class="form-group">
        <label for="title">Post Tags</label>
        <input type="text" class="form-control" value="<?php echo $post_tags; ?>" name="post_tags">
    </div>
    <div class="form-group">
        <label for="title">Post Content</label>
        <textarea class="form-control" name="post_content" id="" rows="10" cols="30"><?php echo $post_content; ?></textarea>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="update_post" value="Update Post">
    </div>
</form>