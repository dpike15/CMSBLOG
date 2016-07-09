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
                     $query = "SELECT * FROM comments";

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
                            <td>{$comment_date }</td>
                            <td>Some Post</td>
                            
                            <td><a href='comments.php?approve={$comment_id}'>Approve</a></td>
                            <td><a href='comments.php?unapprove={$comment_id}'>Unapprove</a></td>
                            <td><a href='comments.php?source=edit_post&p_id={$comment_id}'>EDIT</a></td>
                            <td><a href='comments.php?delete={$comment_id}'>DELETE</a></td>
                        </tr>";
                    }
                     ?>
                     
                     
                     <?php
                     
                     if(isset($_GET['delete'])){
                         $comments_id = $_GET['delete'];
                         
                         $query = "DELETE FROM comments WHERE comment_id={$comments_id}";
                         $delete_Query = mysqli_query($connection,$query);
                         
                         confirm($delete_Query);
                         header("Location: comments.php");
                     }
                     
                     ?>

                    
                 </tbody>
             </table>