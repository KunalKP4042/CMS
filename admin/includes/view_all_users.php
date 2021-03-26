<table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Admin</th>
                                    <th>Subscriber</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php
                            $qry="SELECT * FROM users";
                            $result=mysqli_query($connection,$qry);
                            while($row=mysqli_fetch_assoc($result)){
                                $user_id=$row['user_id'];
                                $username=$row['username'];
                                $user_password=$row['user_password'];
                                $user_firstname=$row['user_firstname'];
                                $user_lastname=$row['user_lastname'];
                                $user_email=$row['user_email'];
                                $user_image=$row['user_image'];
                                $user_role=$row['user_role'];
                                echo "<tr>";
                                echo "<td>$user_id</td>";
                                echo "<td>$username</td>";
                                echo "<td>$user_firstname</td>";
                                echo "<td>$user_lastname</td>";
                                echo "<td>$user_email</td>";
                                echo "<td>$user_role</td>";
                            
            
                                echo "<td><a href='users.php?admin=$user_id'>Admin</a></td>";
                                echo "<td><a href='users.php?sub=$user_id'>Subscriber</a></td>";
                                echo "<td><a href='users.php?source=edit_users&edit_user=$user_id'>Edit</a></td>";
                                echo "<td><a href='users.php?delete=$user_id'>Delete</a></td>";
                                echo "</tr>";
                            }
                                ?>
                            </tbody>
                        </table>
                        
<?php
    if(isset($_GET['delete'])){
        $delete_user_id=$_GET['delete'];
        $qry="DELETE FROM users WHERE user_id = $delete_user_id";
        $result=mysqli_query($connection,$qry);
        if(!$result)
            die("Query Failed".mysqli_error($connection));
        header('Location:users.php');
    }


    if(isset($_GET['admin'])){
        $admin_user_id=$_GET['admin'];
        $qry="UPDATE users SET user_role = 'Admin' WHERE user_id=$admin_user_id";
        $result=mysqli_query($connection,$qry);
        if(!$result)
            die("Query Failed".mysqli_error($connection));
        header('Location:users.php');
    }


     if(isset($_GET['sub'])){
        $sub_user_id=$_GET['sub'];
        $qry="UPDATE users SET user_role = 'Subscriber' WHERE user_id=$sub_user_id";
        $result=mysqli_query($connection,$qry);
        if(!$result)
            die("Query Failed".mysqli_error($connection));
        header('Location:users.php');
    }


    
?>