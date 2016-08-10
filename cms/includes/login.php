<?php include "db.php"; ?>
<?php session_start(); ?>


<?php 
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $username = mysqli_real_escape_string($connection,$username);
    $password = mysqli_real_escape_string($connection,$password);
    
    $query = "Select * FROM users WHERE username='{$username}'";
    
    $result = mysqli_query($connection,$query);
    if(!$result){
        die("Query Failed". mysqli_error($connection));
    }
    
    while($row=mysqli_fetch_array($result)){
        $user_id = $row['user_id'];
        $returnedUsername = $row['username'];
        $user_firstname = $row['first_name'];
        $user_lastname = $row['last_name'];
        $user_role = $row['user_role'];
        $user_email = $row['user_email'];
        $returnedPass = $row['password'];
    }
    
    if($password != $returnedPass){
        header("Location: ../index.php");
    }else{
        $_SESSION['username'] = $returnedUsername;
        $_SESSION['first_name'] = $user_firstname;
        $_SESSION['last_name'] = $user_lastname;
        $_SESSION['email'] = $user_email;
        $_SESSION['role'] = $user_role;
        
        
        header("Location: ../admin/index.php");
    }
}

?>