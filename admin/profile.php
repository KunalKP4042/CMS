<?php include "includes/admin_header.php" ?>
  <?php
    if(isset($_SESSION['username'])){
        $username=$_SESSION['username'];
        $qry="SELECT * FROM users WHERE username = '$username'";
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
  ?>
   
    <div id="wrapper">

      <?php include "includes/admin_navigation.php" ?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin Profile
                            <small><?php echo $_SESSION['username']?></small>
                        </h1>
                        
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
        <input type="text" class="form-control" value="<?php echo $user_password; ?>" name="user_password">
    </div>
    <div class="form-group">
      <label for="title">Role</label>
      <input type="text" class="form-control" value="<?php echo $user_role; ?>" name="user_role"> 
    </div>
</form>
                     </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
    <?php include "includes/admin_footer.php" ?>