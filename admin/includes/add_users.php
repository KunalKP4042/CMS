<?php
    if(isset($_POST['create_user'])){
        $username = $_POST['username'];
        $user_firstname = $_POST['user_firstname'];
        $user_lastname = $_POST['user_lastname'];
        $user_email = $_POST['user_email'];
        $user_password = $_POST['user_password'];
        $user_role = $_POST['user_role'];
        $qry = "INSERT INTO users(username,user_firstname,user_lastname,user_email,user_password,user_role,user_image,randsalt) VALUES('$username','$user_firstname','$user_lastname','$user_email','$user_password','$user_role','','')";
        $result = mysqli_query($connection,$qry);
            if(!$result)
                die("Query Failed".mysqli_error($connection));
        echo "<h3>USER ADDED SUCCESSFULLY</h3>";
    }
?>
   <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Username</label>
        <input type="text" class="form-control" name="username">
    </div>
    <div class="form-group">
        <label for="title">First Name</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>
    <div class="form-group">
        <label for="title">Last Name</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>
    <div class="form-group">
        <label for="title">Email</label>
        <input type="email" class="form-control" name="user_email">
    </div>
    <div class="form-group">
        <label for="title">Password</label>
        <input type="password" class="form-control" name="user_password">
    </div>
    <div class="form-group">
       <select name="user_role">
           <option value="subscriber">Select Options</option>
           <option value="admin">Admin</option>
           <option value="subscriber">Subscriber</option>
       </select> 
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="create_user" value="Add User">
    </div>
</form>