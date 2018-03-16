<?php
   require "connect.php";
   session_start();
    if(isset($_POST['sub'])){
      	$name=$_POST['propname'];
      	$des=$_POST['descr'];
      	$phno=$_POST['phno'];
		if(isset($_FILES['image'])){
	    	 $filename=$_FILES['image']['name']; 
	    	 $tmpname=$_FILES['image']['tmp_name'];
             $filesize=$_FILES['image']['size'];  
     	   $usrid=$_SESSION['userid'];  
	     	move_uploaded_file($tmpname,"uploads/".$filename);
	     	$qry="INSERT INTO `propertyies`(prop_name,description,image,user_id,phno)VALUES('$name','$des','$filename',$usrid,'$phno')";
	     	mysqli_query($conn,$qry);
		}
		else{echo "select a file";
		}
		
	}
?>
<!DOCTYPE html>
<html>
      <head>
           <title>ADD prop</title>
      </head>
      <body>
			<form action="" method="post" enctype="multipart/form-data">
			     <label>Property Name:</label>
			     <input type="text" name="propname" required>
			     <label>Description:</label>
			     <input type="textarea" name="descr"  required>
			     <label>Upload image:</label>
			     <input type="file" name="image"  >
			     <label>Phone Number:</label>
			     <input type="integer" name="phno" required>
			     <input type="submit" name="sub">
			</form>
      </body>
</html>

