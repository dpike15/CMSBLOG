 <table class="table table-bordered table-hover">
                 <thead>
                     <tr>
                         <th>Id</th>
                         <th>username</th>
                         <th>First Name</th>
                         <th>Last Name</th>
                         <th>E-mail</th>
                         <th>Role</th>
                         <th>Date</th>
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
                            
                      
                        
                           
                            
                            echo "<td><a href='comments.php?approve='>Approve</a></td>
                            <td><a href='comments.php?unapprove='>Unapprove</a></td>
                            <td><a href='comments.php?source=edit_post&p_id='>EDIT</a></td>
                            <td><a href='comments.php?delete='>DELETE</a></td>
                        </tr>";
                    }
                     ?>
                     
                     
                     <?php
                     //Delete
                     if(isset($_GET['delete'])){
                         $comments_id = $_GET['delete'];
                         
                         $query = "DELETE FROM comments WHERE comment_id={$comments_id}";
                         $delete_Query = mysqli_query($connection,$query);
                         
                         confirm($delete_Query);
                         
                        $query = "UPDATE posts SET post_comment_count=post_comment_count - 1 WHERE post_id=$comment_post_id";
                        $comment_count_Query = mysqli_query($connection,$query);
                        
                         header("Location: comments.php");
                     }
                     
                     //Unapprove
                      if(isset($_GET['unapprove'])){
                         $comments_id = $_GET['unapprove'];
                         
                         $query = "UPDATE comments SET comment_status='unapproved' WHERE comment_id = $comments_id";
                         $unapprove_Query = mysqli_query($connection,$query);
                         
                         confirm($unapprove_Query);
                         header("Location: comments.php");
                     }
                     
                     //Approve
                       if(isset($_GET['approve'])){
                         $comments_id = $_GET['approve'];
                         
                         $query = "UPDATE comments SET comment_status='approved' WHERE comment_id = $comments_id";
                         $approve_Query = mysqli_query($connection,$query);
                         
                         confirm($approve_Query);
                         header("Location: comments.php");
                     }
                     ?>

                    
                 </tbody>
             </table>