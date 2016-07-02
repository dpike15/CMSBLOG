<?php
    
    function confirm($result){
        global $connection;
        if(!$result){
            die(mysqli_error($connection));
        } 
    }
    


    function insert_categories(){
        
        global $connection;
        if(isset($_POST['submit'])){
            $cat_title = $_POST['cat_title'];
            if($cat_title == "" || empty($cat_title)){
              echo "This field should not be empty!";
            }else{
               $query = "INSERT INTO categories(cat_title) VALUES('{$cat_title}')";
               $create_Query = mysqli_query($connection,$query);
                if(!$create_Query){
                    die('Query Failed'.mysqli_error($connection));
                }else{
                    header("Location: categories.php");
                }
            }
        }

    }

    function findAllCategories(){
        global $connection;  
        
         $query = "SELECT * FROM categories";

            $categories = mysqli_query($connection,$query);

            while($row = mysqli_fetch_assoc($categories)){
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
                echo " 
                <tr>
                    <td>{$cat_id}</td>
                    <td>{$cat_title}</td>
                    <td><a href='categories.php?delete={$cat_id}'>Delete</a>
                    <a href='categories.php?edit={$cat_id}'>Edit</a></td>
                </tr>";
            }
                                      
    }

    function deleteCategory(){
        global $connection;
        
         if(isset($_GET['delete'])){
            $cat_id = $_GET['delete'];

            $query = "DELETE FROM categories WHERE cat_id = {$cat_id}";
            $delete_Query = mysqli_query($connection,$query);

            if($delete_Query){
                header("Location: categories.php");
            }
        }  

    }
?>