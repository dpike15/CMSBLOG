   <form action="" method="post">
         <div class="form-group">
            <label for="cat_title">Edit Category</label>
             <?php
                if(isset($_GET['edit'])){
                 $cat_id = $_GET['edit'];

                     $query = "SELECT cat_title FROM categories WHERE cat_id = {$cat_id}";
                   $edit_Query = mysqli_query($connection,$query);


                     if(!$edit_Query){
                         die('Query Failed'.mysqli_error($connection));
                     }else{
                      $row = mysqli_fetch_assoc($edit_Query);
                                    $cat_title = $row['cat_title'];    
                                    ?>

                                   <input value="<?php if(isset($cat_title)){echo $cat_title;} ?>" class="form-control" type="text" name="cat_title">

                                   <?php
                                }
                            }
                        //UPDATE CATEGORY QUERY
                        if(isset($_POST['update'])){
                            $cat_title = $_POST['cat_title'];

                            $query = "UPDATE categories SET cat_title = '{$cat_title}' WHERE cat_id = {$cat_id}";
                            $update_Query = mysqli_query($connection,$query);

                            if($update_Query){
                                header("Location: categories.php");
                            }else{
                                die("QUERY FAILED" . mysqli_error($connection));
                            }
                        }    


                        ?>

                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="update" value="Update">
                    </div>
                </form>