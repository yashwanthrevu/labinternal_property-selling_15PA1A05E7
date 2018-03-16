<?php 
include "connect.php";
session_start();

if(isset($_POST['sub'])) {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $pass=$_POST['pass'];
        $qry = "INSERT INTO `tbl_user` ( `user_name`, `email`, `password`) VALUES ('$name', '$email', '$pass')";
        mysqli_query($conn,$qry) or die("Connection failed: " . mysqli_error());
        header('location:login.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
            <title>sellproperty</title>
            <link rel="stylesheet" href="index.css">
    </head>   
    <body>
        
        <div class="content">
            <div class="disp">
                <h2>Register</h2>
                <form class="form" method="post" action="">
                Name<input type="text" name="name"><br>
                Email<input type="text" name="email"><br>
                Password<input type="password" name="pass"><br>
                Retype Password <input type="text" name="repass"><br>
                <input type="submit" name="sub" value="Submit">
            </form>
            </div> 
         
        </div>
    </body>  
</html>
