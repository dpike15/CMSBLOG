<?php


if(isset($_POST['create_user'])){
  
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_role = $_POST['user_role'];
    $username = $_POST['username'];
    
    /*
    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];
    */
    
    $user_password = $_POST['user_password'];
    $user_email = $_POST['user_email'];
    //$post_comment_count = 4;
   // $post_date = date('d-m-y');
    
    //move_uploaded_file($post_image_temp,"../images/$post_image");
    
    $query = "INSERT INTO users(username,password,first_name,last_name,user_email,user_role) 
    VALUES('{$username}','{$user_password}','{$user_firstname}','{$user_lastname}','{$user_email}','{$user_role}')";

 
    $create_Query = mysqli_query($connection, $query);
    
    confirm($create_Query);
    header("Location: users.php");
}

?>
   

   
   <form action="" method="post" enctype="multipart/form-data">
   
    <div class="form-group">
       <label for="user_firstname">First Name</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>
    <div class="form-group">
       <label for="user_lastname">Last Name</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>
    
    <div class="form-group">
      <label for="user_role">Role</label>
        <br/>
         <select name="user_role" id="" class="form-control">
            <option value="subscriber">Select Role</option>
           <option value="Admin">Admin</option>
           <option value="Subscriber">Subscriber</option>
       </select>
    </div>
    
    
   <!--  <div class="form-group">
       <label for="image">Image</label>
        <input type="file"  name="image">
    </div> -->
    
  
     <div class="form-group">
       <label for="username">Username</label>
        <input type="text" class="form-control" name="username">
    </div>
     <div class="form-group">
       <label for="user_email">E-Mail</label>
        <input type="email" class="form-control" name="user_email">
    </div>
    
     <div class="form-group">
       <label for="user_password">Password</label>
        <input type="password" class="form-control" name="user_password">
    </div>
    
    <br/>
     <div class="form-group">
      
        <input type="submit" class="btn btn-primary" name="create_user" value="Add User">
    </div>
    
    
    
    
    
</form>