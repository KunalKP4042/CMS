<?php
    if(isset($_GET['edit_user'])){
        $user_id = $_GET['edit_user'];
        
        $qry="SELECT * FROM users WHERE user_id = $user_id";
            $result=mysqli_query($connection,$qry);
            while($row=mysqli_fetch_assoc($result)){
                $username=$row['username'];
                $user_password=$row['user_password'];
                $user_firstname=$row['user_firstname'];
                $user_lastname=$row['user_lastname'];
                $user_email=$row['user_email'];
                $user_role=$row['user_role'];
            }
    }
    if(isset($_POST['edit_user_btn'])){
        $user_id = $_GET['edit_user'];
        $username = $_POST['username'];
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        $user_role = $_POST['user_role'];
        $qry = "UPDATE users SET user_firstname = '$user_firstname',user_lastname = '$user_lastname',username = '$username',user_password = '$user_password',user_role = '$user_role',user_email = '$user_email' WHERE user_id = $user_id";
        $result = mysqli_query($connection,$qry);
            if(!$result)
                die("Query Failed".mysqli_error($connection));
        echo "<h3>USER UPDATED SUCCESSFULLY</h3>";
    }
?>
   <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Username</label>
        <input type="text" class="form-control" value="<?php echo $username; ?>" name="username">
    </div>
    <div class="form-group">
        <label for="title">First Name</label>
        <input type="text" class="form-control" value="<?php echo $user_firstname; ?>" name="user_firstname">
    </div>
    <div class="form-group">
        <label for="title">Last Name</label>
        <input type="text" class="form-control" value="<?php echo $user_lastname; ?>" name="user_lastname">
    </div>
    <div class="form-group">
        <label for="title">Email</label>
        <input type="email" class="form-control" value="<?php echo $user_email; ?>" name="user_email">
    </div>
    <div class="form-group">
        <label for="title">Password</label>
        <input type="password" class="form-control" value="<?php echo $user_password; ?>" name="user_password">
    </div>
    <div class="form-group">
       <select name="user_role">
           <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
           <?php
                if($user_role == 'Admin')
                    echo "<option value='subscriber'>Subscriber</option>";
                else
                    echo "<option value='admin'>Admin</option>";
           ?>
       </select> 
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="edit_user_btn" value="Update User">
    </div>
</form>