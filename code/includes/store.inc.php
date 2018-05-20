<?php
	session_start();
	
	
	if(isset($_POST['newstore']))
	{
		include_once 'dbserver.inc.php';
		
		
		$email1    = mysqli_real_escape_string($conn,$_POST['email1']);
		$email2     = mysqli_real_escape_string($conn,$_POST['email2']);
		$location1     = mysqli_real_escape_string($conn,$_POST['location1']);
		$location2  = mysqli_real_escape_string($conn,$_POST['location2']) ;
		$location3      = mysqli_real_escape_string($conn,$_POST['location3']);
		$phone1      = mysqli_real_escape_string($conn,$_POST['phone1']);
		$phone2     = mysqli_real_escape_string($conn,$_POST['phone2']);
		$name  = mysqli_real_escape_string($conn,$_POST['sname']) ;
	
		
		$first     = mysqli_real_escape_string($conn,$_POST['first']);
		$last      = mysqli_real_escape_string($conn,$_POST['last']);
		$address   = mysqli_real_escape_string($conn,$_POST['address']);
		$email     = mysqli_real_escape_string($conn,$_POST['email']);
		$username  = mysqli_real_escape_string($conn,$_POST['usr']) ;
		$pass      = mysqli_real_escape_string($conn,$_POST['pwd']);
		
		
		
		
		
		
		
		$sql = "INSERT INTO store (name,profit) VALUES ('$name','0')";		
		$query = mysqli_query($conn,$sql);
		
			$sql1 = "SELECT * FROM store ORDER BY SID DESC LIMIT 1";
			$query1 = mysqli_query($conn,$sql1);
			$row = mysqli_fetch_assoc($query1);
			$storeID = $row['SID'];
		
		//------------------- Location -------------------------------------------//
		$sql = "INSERT INTO store_location (sid,location) VALUES ('$storeID','$location1')";		
		$query = mysqli_query($conn,$sql);
		
		if( !empty($location2) )
		{
			$sql = "INSERT INTO store_location (sid,location) VALUES ('$storeID','$location2')";		
		    $query = mysqli_query($conn,$sql);
		}
		
		if( !empty($location3) )
		{
			$sql = "INSERT INTO store_location (sid,location) VALUES ('$storeID','$location3')";		
		    $query = mysqli_query($conn,$sql);
		}
		
		
		
		//------------------- Email -------------------------------------------//
		
		$sql = "INSERT INTO store_email (sid,email) VALUES ('$storeID','$email1')";		
		$query = mysqli_query($conn,$sql);
		
		if( !empty($email2) )
		{
			$sql = "INSERT INTO store_email (sid,email) VALUES ('$storeID','$email2')";		
			$query = mysqli_query($conn,$sql);
		}
		
		//------------------- Phone -------------------------------------------//
		
		$sql = "INSERT INTO store_phone (sid,phone) VALUES ('$storeID','$phone1')";		
		$query = mysqli_query($conn,$sql);
		
		if( !empty($phone2) )
		{
			$sql = "INSERT INTO store_phone (sid,phone) VALUES ('$storeID','$phone2')";		
			$query = mysqli_query($conn,$sql);
		}
		
		
		//------------------- --------- -------------------------------------------//
		
		
		
		// Checking if there's a required input empty.
	if(	empty($first) || empty($last) || empty($email) || empty($username) || empty($pass)  )
		{
			header("Location: ../addstore.php?signup=empty");
			exit();
		}
	else
		{
			if( !preg_match ('/[a-zA-Z0-9]/', $first) )
			{
				
				header("Location: ../../addstore.php?signup=invalid1");
				exit();
			
			}
			else
			{
				//check if the email is valid .
				
				if(!filter_var( $email , FILTER_VALIDATE_EMAIL ) )
				{
					
					header("Location: ../../addstore.php?email=invalid2");
				    exit();
				}
				else
				{
					$sql1 = "SELECT * FROM users WHERE Username = '$username'";
					$query1 = mysqli_query($conn,$sql1);
					$check = mysqli_num_rows($query1);
					
					if( $check > 0 )
					{
						header("Location: ../../addstore.php?username=invalid3");
						exit();
					}
					else
					{
						$hashpwd = password_hash($pass , PASSWORD_DEFAULT);
						
						// Create a New user and get last row inserted
						$sql1 = "INSERT INTO users (first,last,Address,Email,Username,Password,type) VALUES ('$first','$last','$address','$email','$username','$hashpwd','store empolyee') ";
					    $query1 = mysqli_query($conn,$sql1);
						
						$sql1 = "SELECT * FROM users ORDER BY id DESC LIMIT 1";
						$query1 = mysqli_query($conn,$sql1);
						$row = mysqli_fetch_assoc($query1);
						//-----------------------------------------------------------------
						// Create a store empolyee and get last row inserted
						
						
							$sql1 = "INSERT INTO storeemp (ID,sid) VALUES( ' ".$row['id']."' ,'$storeID')";
							$query1 = mysqli_query($conn,$sql1);
						
						
						
						
						
						header("Location: ../addstore.php?add=success");
						exit();	
					}
				}
			}
			
		}
	
	}
	
	else
	{
		header("Location: ../signup.php");
		exit();
	}

?>