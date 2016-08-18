<?php include "includes/admin_header.php"; 

    if(isset($_SESSION['username'])){
        $username = $_SESSION['username'];
        
        $query = "SELECT * FROM users WHERE username='{$username}'";
        $selectUserPro = mysqli_query($connection,$query);
        while($row = mysqli_fetch_array($selectUserPro)){
            $user_id = $row['user_id'];
            $username = $row['username'];
            $password = $row['password'];
            $user_role = $row['user_role'];
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
          $user_email = $row['user_email']; 
            $user_image = $row['user_image'];
        }
    }

    if(isset($_POST['edit_pro'])){
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

                /*
                move_uploaded_file($post_image_temp,"../images/$post_image");
                if(empty($post_image)){
                    $query = "SELECT * FROM posts WHERE post_id = $post_id";
                    $querySelectImage = mysqli_query($connection,$query);
                    while($row = mysqli_fetch_array($querySelectImage)){
                        $post_image = $row['post_image'];
                    }
                }
                */

                $query="UPDATE users SET ";
                $query .= "first_name = '{$user_firstname}', ";
                $query .= "last_name = '{$user_lastname}', ";
                //$query .= "post_date = now(), ";   
                $query .= "user_role = '{$user_role}', ";
                $query .= "username = '{$username}', ";
                $query .= "password = '{$user_password}', ";
                $query .= "user_email = '{$user_email}' ";

                $query .= "WHERE username = '{$username}'";

               $update_Query = mysqli_query($connection,$query);

                confirm($update_Query);
                header("Location: ./profile.php");
    }
    ?>

<div id="wrapper">
        <!-- Navigation -->
<?php include "includes/admin_navigation.php"; ?>
       
       
   <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                         <h1 class="page-header">Profile</h1>
                <form action="" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                       <label for="user_firstname">First Name</label>
                        <input type="text" class="form-control" name="user_firstname" value="<?php echo $first_name; ?>">
                    </div>
                    <div class="form-group">
                       <label for="user_lastname">Last Name</label>
                        <input type="text" class="form-control" name="user_lastname" value="<?php echo $last_name; ?>">
                    </div>

                    <div class="form-group">
                      <label for="user_role">Role</label>
                        <br/>
                         <select name="user_role" id="" class="form-control" >
                            <option value="Admin"><?php echo $user_role; ?></option>
                            <?php
                             if($user_role == 'Admin'){
                                 echo "<option value='Subscriber'>Subscriber</option>";
                             }else{
                                 echo "<option value='Admin'>Admin</option>";
                             }

                             ?>

                       </select>
                    </div>


                     <div class="form-group">
                       <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
                    </div>
                     <div class="form-group">
                       <label for="user_email">E-Mail</label>
                        <input type="email" class="form-control" name="user_email" value="<?php echo $user_email; ?>">
                    </div>

                     <div class="form-group">
                       <label for="user_password">Password</label>
                        <input type="password" class="form-control" name="user_password" value="<?php echo $password; ?>">
                    </div>

                    <br/>
                     <div class="form-group">

                        <input type="submit" class="btn btn-primary" name="edit_pro" value="Update Profile">
                    </div>





                </form>               
    <?php include "includes/admin_footer.php"; ?>