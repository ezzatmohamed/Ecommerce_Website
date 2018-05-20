<?php
	session_start();
	
	
	if(isset($_POST['chngpwd']))
	{
		include_once 'dbserver.inc.php';
		
		
		
		$old     = mysqli_real_escape_string($conn,$_POST['oldpwd']);
		$new   = mysqli_real_escape_string($conn,$_POST['newpwd']);
		$conf     = mysqli_real_escape_string($conn,$_POST['confpwd']);

		$sql = "SELECT * FROM users WHERE id = ".$_SESSION['id'];
		$query = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($query);
		
		$pwdcheck = password_verify($old , $row['Password']);
		
		if(!$pwdcheck)
		{
			echo $row['Password'];
			header("Location: ../chngpwd.php?OLD=false");
			exit();
		}
		
		if($new === $conf)
		{
			$hashpwd = password_hash($new,PASSWORD_DEFAULT);
			$sql = "UPDATE users SET Password = '".$hashpwd."' WHERE id = '".$_SESSION['id']."'";
			$query = mysqli_query($conn,$sql);
			header("Location: ../chngpwd.php?chng=true");
			exit();
		}
		
		
					
	header("Location: ../chngpwd.php?chng=false");
	exit();	
		
	}
?>