<?php
	include("db.php");
	session_start();
	if($_POST['type']==1){
		$name=$_POST['name'];
        $email=$_POST['email'];
        $username=$_POST['username'];
		$phone=$_POST['phone'];
		$password=$_POST['password'];
		if(!empty($name) && !empty($email) && !empty($username) && !empty($phone) && !empty($password)){
			$duplicate=mysqli_query($connect,"select * from users where email='$email'");
			$duplicate1=mysqli_query($connect,"select * from users where username='$username'");
			if (mysqli_num_rows($duplicate)>0)
			{
				echo json_encode(array("statusCode"=>201));
			}
			else if (mysqli_num_rows($duplicate1)>0)
			{
				echo json_encode(array("statusCode"=>202));
			}
			else{
				$sql = "INSERT INTO `users`( `name`, `email`, `phone`, `password`,`username`,`uploaded_on`) 
				VALUES ('$name','$email','$phone','".md5($password)."', '$username',NOW())";
				
				// $sql1 = "CREATE TABLE `$username` (
				// `content_id` int(11) NOT NULL AUTO_INCREMENT,
				// `user_id` int(11) NOT NULL,
				// `url` varchar(255) NOT NULL,
				// `title` varchar(255) NOT NULL,
				// `description` varchar(255) NOT NULL,
				// `imageurl` varchar(255) NOT NULL,
				// `uploaded_on` datetime NOT NULL,
				// `account` varchar(11) NOT NULL,
				// `catagories` varchar(255) CHARACTER SET utf8 NOT NULL,
				// `post_status` enum('0','1') CHARACTER SET utf8 NOT NULL COMMENT '0-active,1-inactive',
				// PRIMARY KEY (content_id)
				//  )
				// ";
				
				if (mysqli_query($connect, $sql)) {
					echo json_encode(array("statusCode"=>200));
				} 
				else {
					echo json_encode(array("statusCode"=>203));
				}
				
			}
			mysqli_close($connect);
		}
		else{
			echo json_encode(array("statusCode"=>204));
		}
    }
    
	if($_POST['type']==2){
        $username=$_POST['username'];
		$password=$_POST['password'];
		$check=mysqli_query($connect,"select * from users where username='$username' AND password='".md5($password)."'");
		if (mysqli_num_rows($check)>0)
		{			
			$_SESSION['username']=$username;
			echo json_encode(array("statusCode"=>200));
		}
		else{
			echo json_encode(array("statusCode"=>201));
        }
       
		mysqli_close($connect);
	}
// update profile
		
	if($_POST['type']==3){
		$name=$_POST['name'];
        $username=$_POST['username'];
		$phone=$_POST['phone'];
		$bio=$_POST['bio'];
		$website=$_POST['website'];
		
		if( empty($name) && empty($phone) && empty($email) ){
			echo json_encode(array("statusCode"=>204));
		}
        else {
			
			$sql = "UPDATE users set `name`='$name', `phone`='$phone', `bio`='$bio', `website`='$website' where `username` ='$username'";
			if (mysqli_query($connect, $sql)) {
				echo json_encode(array("statusCode"=>200));
			} 
			else {
				echo json_encode(array("statusCode"=>203));
			}
		}
		mysqli_close($connect);
	}
	
	if($_POST['type']==4){
        $username=$_POST['username'];
		$password=$_POST['password'];
		
		if( empty($password) ){
			echo json_encode(array("statusCode"=>204));
		}
        else {
			$sql = "UPDATE users set `password`='".md5($password)."' where `username` ='$username'";

			if (mysqli_query($connect, $sql)) {
				echo json_encode(array("statusCode"=>200));
			} 
			else {
				echo json_encode(array("statusCode"=>203));
			}
		}
		mysqli_close($connect);
	}


	
?>
  