<?php
function confirmQuery($result){
    global $connection;
    if(!$result)
        die("Query Failed".mysqli_error($connection));
}

function insert_categories(){
    //Insert Into Categories
    global $connection;
                    if(isset($_POST['submit'])){
                $cat_title=$_POST['cat_title'];
                                if(empty($cat_title))
                                    echo "This field should not be empty";
                                else{
                                   $qry="INSERT INTO CATEGORIES(cat_title) VALUES('{$cat_title}')";
                                    $result=mysqli_query($connection,$qry);
                                    if(!$result)
                                        die("QUERy FAILED".myqli_error($connection));
                                }
                            }
}

function findAllCategories(){
    global $connection;
            //Find All Categories
                                    $qry="SELECT * FROM categories";
                                    $result=mysqli_query($connection,$qry);
                                    while($row = mysqli_fetch_assoc($result))
                                    {
                                        $cat_id=$row['cat_id'];
                                        $cat_title=$row['cat_title'];
                                echo "<tr>";
                                echo "<td>$cat_id</td>";
                                echo "<td>$cat_title</td>";
                                echo "<td><a href='categories.php?update={$cat_id}'>EDIT</a></td>";        
                                echo "<td><a href='categories.php?delete={$cat_id}'>DELETE</a></td>";
                                echo "</tr>";
                                    }
}

function deleteCategories(){
    global $connection;
    //DELETE Category
                            if(isset($_GET['delete'])){
                                $delete_id=$_GET['delete'];
                                $qry="DELETE FROM categories WHERE cat_id = $delete_id";
                                $result=mysqli_query($connection,$qry);
                                header("Location:categories.php");
                            }
}
?>