<?php 
include "connect.php";
session_start();
if(isset($_SESSION['email'])) 
    header('location:upload.php');

    if(isset($_POST['sub'])) {
        $email=$_POST['email'];
        $pass=$_POST['pass'];
        $qry = "SELECT * FROM `tbl_user` WHERE  `email`='$email' AND `password`='$pass';";
        $sql = mysqli_query($conn,$qry) or die("Connection failed: " . mysqli_error());
        if(mysqli_num_rows($sql)>0) {
            $row=mysqli_fetch_assoc($sql);
            $_SESSION['user_id']=$row['user_id'];
            $_SESSION["user"] = $row['user_name'];
            $_SESSION["email"] = $row['user_email'];
            header('location:upload.php');
        } else {
            $warning = "Invalid login";
        }
    
    }
?>
<!DOCTYPE html>
<html>
    <head>
            <title>property</title>
            <link rel="stylesheet" href="index.css">
    </head>   
    <body>
        
        <div class="content">
            
                <h2>Login</h2>
                <h3> <?php if(isset($warning)) echo $warning; ?></h3>
                <form class="form" method="post" action="">
                Email<input type="text" name="email"><br>
                Password<input type="password" name="pass"><br>
                <input type="submit" name="sub" value="Submit">
            </form>
           
           
        </div>
    </body>  
</html>
