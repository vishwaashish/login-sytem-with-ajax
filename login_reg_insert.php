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
