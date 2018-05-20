<?php

	if(isset($_POST['submit']))
	{
		include_once '../../includes/dbserver.inc.php';
		
		$first     = mysqli_real_escape_string($conn,$_POST['first']);
		$last      = mysqli_real_escape_string($conn,$_POST['last']);
		$address   = mysqli_real_escape_string($conn,$_POST['address']);
		$email     = mysqli_real_escape_string($conn,$_POST['email']);
		$username  = mysqli_real_escape_string($conn,$_POST['usr']) ;
		$pass      = mysqli_real_escape_string($conn,$_POST['pwd']);

		
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
				
				header("Location: ../signup.php?signup=invalid1");
				exit();
			
			}
			else
			{
				//check if the email is valid .
				
				if(!filter_var( $email , FILTER_VALIDATE_EMAIL ) )
				{
					
					header("Location: ../signup.php?email=invalid2");
				    exit();
				}
				else
				{
					$sql1 = "SELECT * FROM users WHERE Username = '$username'";
					$query1 = mysqli_query($conn,$sql1);
					$check = mysqli_num_rows($query1);
					
					if( $check > 0 )
					{
						header("Location: ../signup.php?username=invalid3");
						exit();
					}
					else
					{
						$hashpwd = password_hash($pass , PASSWORD_DEFAULT);
						
						// Create a New user and get last row inserted
						$sql1 = "INSERT INTO users (first,last,Address,Email,Username,Password,type) VALUES ('$first','$last','$address','$email','$username','$hashpwd','customer') ";
					    $query1 = mysqli_query($conn,$sql1);
						
						$sql1 = "SELECT * FROM users ORDER BY id DESC LIMIT 1";
						$query1 = mysqli_query($conn,$sql1);
						$row = mysqli_fetch_assoc($query1);
						//-----------------------------------------------------------------
						// Create a Customer and get last row inserted
						
						$sql1 = "INSERT INTO customer (ID,numOrders) VALUES( '".$row['id']."','0')  ";
						$query1 = mysqli_query($conn,$sql1);
						
						
						$sql1 = "SELECT * FROM customer ORDER BY ID DESC LIMIT 1";
						$query1 = mysqli_query($conn,$sql1);
						$customer_row = mysqli_fetch_assoc($query1);
						//-----------------------------------------------------------------
						
						// Creating a new cart for the customer and get last row inserted
							
							$sql2 = "INSERT INTO cart (cost,numItems) VALUES( '0','0')  ";
							$query2 = mysqli_query($conn,$sql2);
							$row2 = mysqli_fetch_assoc($query2);
						
							$sql1 = "SELECT * FROM cart ORDER BY id DESC LIMIT 1";
							$query1 = mysqli_query($conn,$sql1);
							$cart_row = mysqli_fetch_assoc($query1);
						//----------------------------------
						// Creating a relation between the customer and his cart
							
							$sql3 = "INSERT INTO cust_cart (cartID,custID) VALUES('".$cart_row['id']."','".$customer_row['ID']."')";
							$query3 = mysqli_query($conn,$sql3);
						
						//------------------------------------------------------
					
						
						
						
						header("Location: ../signup.php?signup=success");
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