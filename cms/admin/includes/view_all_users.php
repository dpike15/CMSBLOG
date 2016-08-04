 <table class="table table-bordered table-hover">
                 <thead>
                     <tr>
                         <th>Id</th>
                         <th>username</th>
                         <th>First Name</th>
                         <th>Last Name</th>
                         <th>E-mail</th>
                         <th>Role</th>
                         
                     </tr>
                 </thead>
                 <tbody>
                   <?php
                     $query = "SELECT * FROM users";

                    $select_users = mysqli_query($connection,$query);

                    while($row = mysqli_fetch_assoc($select_users)){
                        $user_id = $row['user_id'];
                        $username = $row['username'];
                        $password = $row['password'];
                        $user_role = $row['user_role'];
                        $first_name = $row['first_name'];
                        $last_name = $row['last_name'];
                        $user_email = $row['user_email'];
                        $user_image = $row['user_image'];
                     
                        echo " 
                        <tr>
                            <td>$user_id</td>
                            <td>$username</td>
                            <td>$first_name</td>";
                            
                        

                            echo "<td>$last_name</td>
                            <td>$user_email</td>
                            <td>$user_role</td>";
                            
                      
                        
                           
                            
                            echo "<td><a href='users.php?change_to_admin={$user_id}'>Admin</a></td>
                            <td><a href='users.php?change_to_sub={$user_id}'>Subscriber</a></td>
                            <td><a href='users.php?source=edit_user&p_id={$user_id}'>EDIT</a></td>
                            <td><a href='users.php?delete={$user_id}'>DELETE</a></td>
                        </tr>";
                    }
                     ?>
                     
                     
                     <?php
                     //Delete
                     if(isset($_GET['delete'])){
                         $user_id = $_GET['delete'];
                         
                         $query = "DELETE FROM users WHERE user_id={$user_id}";
                         $delete_Query = mysqli_query($connection,$query);
                         
                         confirm($delete_Query);
                       
                         header("Location: users.php");
                     }
                     
                     //Unapprove
                      if(isset($_GET['change_to_sub'])){
                         $comments_id = $_GET['change_to_sub'];
                         
                         $query = "UPDATE users SET user_role='Subscriber' WHERE user_id = $user_id";
                         $sub_Query = mysqli_query($connection,$query);
                         
                         confirm($sub_Query);
                         header("Location: users.php");
                     }
                     
                     //Approve
                       if(isset($_GET['change_to_admin'])){
                         $user_id = $_GET['change_to_admin'];
                         
                         $query = "UPDATE users SET user_role='Admin' WHERE user_id = $user_id";
                         $admin_Query = mysqli_query($connection,$query);
                         
                         confirm($admin_Query);
                         header("Location: users.php");
                     }
                     ?>

                    
                 </tbody>
             </table>