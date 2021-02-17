<form action="" method="post">
        <div class="form-group">
           <label for="cat-title">Edit Category</label>
           
        <?php
            //Get Category
            if(isset($_GET['update'])){
                $cat_id = $_GET['update'];
                $qry = "SELECT * FROM categories WHERE cat_id=$cat_id";
            $result=mysqli_query($connection,$qry);
            while($row=mysqli_fetch_assoc($result)){
                $cat_title=$row['cat_title'];
         ?>   
        <input type="text" class="form-control" value = '<?php echo $cat_title; ?>' name="cat_title">
        <?php   
            }
          }
        ?>
        </div>
        <div class="form-group">
           <input type="submit" class="btn btn-primary" name="update_category" value="Update Category">
             </div>
        </form>
        <?php
        //Update Category
        if(isset($_POST['update_category'])){
           $cat_id=$_GET['update'];
           $cat_title=$_POST['cat_title'];
            $qry="UPDATE categories SET cat_title = '{$cat_title}' WHERE cat_id = {$cat_id}";
            $result=mysqli_query($connection,$qry);
            if(!$result)
                die("QUERY FAILED".mysqli_error($connection));
        }
        ?>