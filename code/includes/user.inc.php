<?php
	session_start();
	
	
	if(isset($_POST['create']))
	{
		include_once 'dbserver.inc.php';
		
		$first     = mysqli_real_escape_string($conn,$_POST['first']);
		$last      = mysqli_real_escape_string($conn,$_POST['last']);
		$address   = mysqli_real_escape_string($conn,$_POST['address']);
		$email     = mysqli_real_escape_string($conn,$_POST['email']);
		$username  = mysqli_real_escape_string($conn,$_POST['usr']) ;
		$pass      = mysqli_real_escape_string($conn,$_POST['pwd']);	
		$type      = mysqli_real_escape_string($conn,$_POST['TYPE']);
		
		if( empty($type) )
		{
			$type = 'store empolyee';
		}
		
		// Checking if there's a required input empty.
	if(	empty($first) || empty($last) || empty($email) || empty($username) || empty($pass)  )
		{
			header("Location: ../signup.php?signup=empty");
			exit();
		}
	else
		{
			if( !preg_match ('/[a-zA-Z0-9]/', $first) )
			{
				
				header("Location: ../../createuser.php?signup=invalid1");
				exit();
			
			}
			else
			{
				//check if the email is valid .
				
				if(!filter_var( $email , FILTER_VALIDATE_EMAIL ) )
				{
					
					header("Location: ../../createuser.php?email=invalid2");
				    exit();
				}
				else
				{
					$sql1 = "SELECT * FROM users WHERE Username = '$username'";
					$query1 = mysqli_query($conn,$sql1);
					$check = mysqli_num_rows($query1);
					
					if( $check > 0 )
					{
						header("Location: ../../createuser.php?username=invalid3");
						exit();
					}
					else
					{
						$hashpwd = password_hash($pass , PASSWORD_DEFAULT);
						
						// Create a New user and get last row inserted
						$sql1 = "INSERT INTO users (first,last,Address,Email,Username,Password,type) VALUES ('$first','$last','$address','$email','$username','$hashpwd','$type') ";
					    $query1 = mysqli_query($conn,$sql1);
						
						$sql1 = "SELECT * FROM users ORDER BY id DESC LIMIT 1";
						$query1 = mysqli_query($conn,$sql1);
						$row = mysqli_fetch_assoc($query1);
						//-----------------------------------------------------------------
						// Create a Delivery Man and get last row inserted
						
						if( ( $type == 'DM') )
						{
							$sql1 = "INSERT INTO deliveryman (ID,numDeliver,salary) VALUES( '".$row['id']."','0','2000')  ";
							$query1 = mysqli_query($conn,$sql1);
						}
						else
						{
							$sql = "SELECT * FROM storeemp WHERE ID = ".$_SESSION['id'] ;
							$query = mysqli_query($conn,$sql);
							$result = mysqli_fetch_assoc($query);
							$storeId = $result['sid'];
							
							
							$sql1 = "INSERT INTO storeemp (ID,sid) VALUES('".$row['id']."','".$storeId."')";
							$query1 = mysqli_query($conn,$sql1);
						}
						 
						
						
						
						header("Location: ../createuser.php?create=success");
						exit();	
					}
				}
			}
			
		}
	
	}
	
	else
	{
		header("Location: ../loginsystem/signup.php");
		exit();
	}

?>