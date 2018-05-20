<?php
	session_start();
	
	if(isset($_POST['login']))
	{
		include_once '../../includes/dbserver.inc.php';
		
		$usr = mysqli_real_escape_string($conn,$_POST['log-usr']);
		$pwd = mysqli_real_escape_string($conn,$_POST['log-pwd']);
		
		
		$sql = "SELECT * FROM users WHERE Username = '$usr' ";
		$query = mysqli_query($conn,$sql);
		$check = mysqli_num_rows($query);
		
		if( $check == 0 )
		{
			header("Location: ../signup.php?username=invalid");
			exit();
		}
		else
		{
			if( $user = mysqli_fetch_assoc($query) )
			{
				$pwdcheck = password_verify($pwd , $user['Password']);
				if(!$pwdcheck)
				{
					header("Location: ../signup.php?password=invalid");
					exit();
				}
				else
				{
					$_SESSION['id'] = $user['id'];
					$_SESSION['fname'] = $user['first'];
					$_SESSION['lname'] = $user['last'];
					$_SESSION['usr'] = $user['Username'];
					$_SESSION['pwd'] = $user['Password'];
					$_SESSION['email'] = $user['Email'];
					$_SESSION['address'] = $user['Address'];
					$_SESSION['type'] = $user['Type'];
				
					header("Location: ../../home.php");
					exit();
				}
				
			}
			
		}
		
	}

?>