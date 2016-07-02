  <?php
            if(isset($_GET['p_id'])){
                
                $post_id = $_GET['p_id'];
                $query = "SELECT * FROM posts WHERE post_id={$post_id}";

                $posts = mysqli_query($connection,$query);

                while($row = mysqli_fetch_assoc($posts)){
                    $post_id = $row['post_id'];
                    $post_author = $row['post_author'];
                    $post_title = $row['post_title'];
                    $post_category_id = $row['post_category_id'];
                    $post_status = $row['post_status'];
                    $post_image = $row['post_image'];
                    $post_tags = $row['post_tags'];
                    $post_comment_count = $row['post_comment_count'];
                    $post_date = $row['post_date'];
                    $post_content = $row['post_content'];
                }
            }
?>
   
   
   <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
       <label for="title">Post Title</label>
        <input value="<?php echo $post_title; ?>" type="text" class="form-control" name="title">
    </div>
    
     <div class="form-group">
      <label for="categories">Post Category</label>
        <br/>
         <select name="categories" id="" class="form-control">
           <?php
                
            $query = "SELECT * FROM categories";
            $edit_Query = mysqli_query($connection,$query);
           
           confirm($edit_Query);
           
           while($row = mysqli_fetch_assoc($edit_Query)){
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title']; 
               
               echo "<option value=''>{$cat_title}</option>";
           }  
            

           
           ?>
       </select>
    </div>
     <div class="form-group">
       <label for="post_author">Post Author</label>
        <input value="<?php echo $post_author; ?>" type="text" class="form-control" name="post_author">
    </div>
     <div class="form-group">
       <img width=175 height=75 src="../images/<?php echo $post_image;?>" alt="">
    </div>
     <div class="form-group">
       <label for="post_content">Post Content</label>
         <textarea class="form-control" name="post_content" id="" cols="30" rows="10"><?php echo $post_content; ?>
         </textarea>
    </div>
     <div class="form-group">
       <label for="post_tags">Post Tags</label>
        <input value="<?php echo $post_tags; ?>" type="text" class="form-control" name="post_tags">
    </div>
     <div class="form-group">
       <label for="post_status">Post Status</label>
        <input value="<?php echo $post_status; ?>" type="text" class="form-control" name="post_status">
    </div>
    <br/>
     <div class="form-group">
      
        <input type="submit" class="btn btn-primary" name="create_post" value="Publish Post">
    </div>
    
    
    
    
    
</form>