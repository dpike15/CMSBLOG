 <table class="table table-bordered table-hover">
                 <thead>
                     <tr>
                         <th>Id</th>
                         <th>Author</th>
                         <th>Comment</th>
                         <th>Email</th>
                         <th>Status</th>
                         <th>Date</th>
                         <th>In Response To</th>
                         <th>Approve</th>
                         <th>Unapprove</th>
                        
                     </tr>
                 </thead>
                 <tbody>
                   <?php
                     $query = "SELECT * FROM comments ORDER BY comment_date DESC";

                    $posts = mysqli_query($connection,$query);

                    while($row = mysqli_fetch_assoc($posts)){
                        $comment_id = $row['comment_id'];
                        $comment_post_id = $row['comment_post_id'];
                        $comment_author = $row['comment_author'];
                        $comment_email = $row['comment_email'];
                        $comment_content = $row['comment_content'];
                        $comment_status = $row['comment_status'];
                        $comment_date = $row['comment_date'];
                     
                        echo " 
                        <tr>
                            <td>$comment_id</td>
                            <td>$comment_author</td>
                            <td>$comment_content</td>";
                            
                            /*$query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
                            $edit_Query = mysqli_query($connection,$query);
                                                    
                            while($row = mysqli_fetch_assoc($edit_Query)){
                                $cat_id=$row['cat_id'];
                                $cat_title = $row['cat_title'];
                                    */


                            echo "<td>{$comment_email}</td>
                            <td>{$comment_status}</td>
                            <td>{$comment_date }</td>";
                            
                            $query ="SELECT * FROM posts WHERE post_id=$comment_post_id";
                            $result = mysqli_query($connection,$query);
                        
                            while($row = mysqli_fetch_assoc($result)){
                                $post_id = $row['post_id'];
                                $post_title = $row['post_title'];
                                
                                echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
                            }
                        
                           
                            
                            echo "<td><a href='comments.php?approve={$comment_id}'>Approve</a></td>
                            <td><a href='comments.php?unapprove={$comment_id}'>Unapprove</a></td>
                            <td><a href='comments.php?source=edit_post&p_id={$comment_id}'>EDIT</a></td>
                            <td><a href='comments.php?delete={$comment_id}'>DELETE</a></td>
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