<table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Tags</th>
                                    <th>Comments</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php
                            $qry="SELECT * FROM posts";
                            $result=mysqli_query($connection,$qry);
                            while($row=mysqli_fetch_assoc($result)){
                                $post_id=$row['post_id'];
                                $post_author=$row['post_author'];
                                $post_title=$row['post_title'];
                                $post_category_id=$row['post_category_id'];
                                $post_status=$row['post_status'];
                                $post_image=$row['post_image'];
                                $post_tags=$row['post_tags'];
                                $post_comment_count=$row['post_comment_count'];
                                $post_date=$row['post_date'];
                                echo "<tr>";
                                echo "<td>$post_id</td>";
                                echo "<td>$post_author</td>";
                                echo "<td>$post_title</td>";
                                echo "<td>$post_category_id</td>";
                                echo "<td>$post_status</td>";
                                echo "<td><img src='../images/$post_image' width='150' alt='image'></td>";
                                echo "<td>$post_tags</td>";
                                echo "<td>$post_comment_count</td>";
                                echo "<td>$post_date</td>";
                                echo "<td><a href='posts.php?source=edit_post&post_id=$post_id'>EDIT</a></td>";
                                echo "<td><a href='posts.php?delete=$post_id'>DELETE</a></td>";
                                echo "</tr>";
                            }
                                ?>
                            </tbody>
                        </table>
                        
<?php
    if(isset($_GET['delete'])){
        $delete_post_id=$_GET['delete'];
        $qry="DELETE FROM posts WHERE post_id = $delete_post_id";
        $result=mysqli_query($connection,$qry);
        if(!$result)
            die("Query Failed".mysqli_error($connection));
        header('Location:posts.php');
    }
?>