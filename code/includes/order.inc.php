<?php
	session_start();
	
	
	if(isset($_POST['order']))
	{
		include_once 'dbserver.inc.php';
		
		
		
		$da   = mysqli_real_escape_string($conn,$_POST['d_address']);
		$phone     = mysqli_real_escape_string($conn,$_POST['phone']);
		
		
		$now = new DateTime();
			
		$now->modify("+3 day");	
		$dd = date_format($now, 'Y-m-d');
			
		//---------------------------------------------------
		$checked = true;
		while($checked)
		{
				
				$sql = "SELECT * FROM deliveryman WHERE ID NOT IN (SELECT did FROM ordr WHERE d_date = '$dd') ";
				$query= mysqli_query($conn,$sql);
				$row = mysqli_fetch_assoc($query);
				
				$num_rows = mysqli_num_rows($query);
				if( $num_rows != 0 )
				{
					$cartSql = "SELECT * FROM cust_cart WHERE custID = '".$_SESSION['id']."' ";
					$cartQuery = mysqli_query($conn,$cartSql);
					$result = mysqli_fetch_assoc($cartQuery);
					
					$sql2 = "INSERT INTO ordr (d_date,d_address,cust_phone,did,cid,custID) VALUES ('$dd','$da','$phone','".$row['ID']."','".$result['cartID']."','".$_SESSION['id']."')";
					$query2 = mysqli_query($conn,$sql2);
						
						
						//DELETING THE cart
						
							$sql = "DELETE FROM cust_cart WHERE custID = '".$_SESSION['id']."'";
							$query = mysqli_query($conn,$sql);
							
					    // Creating a new cart for the customer and get last row inserted
							
							$sql2 = "INSERT INTO cart (cost,numItems) VALUES( '0','0')  ";
							$query2 = mysqli_query($conn,$sql2);
							$row2 = mysqli_fetch_assoc($query2);
						
							$sql1 = "SELECT * FROM cart ORDER BY id DESC LIMIT 1";
							$query1 = mysqli_query($conn,$sql1);
							$cart_row = mysqli_fetch_assoc($query1);
						//----------------------------------
						// Creating a relation between the customer and his cart
							
							$sql3 = "INSERT INTO cust_cart (cartID,custID) VALUES('".$cart_row['id']."','".$_SESSION['id']."')";
							$query3 = mysqli_query($conn,$sql3);
						
						//------------------------------------------------------
					$checked = false;
				}
				
				$now->modify("+1 day");	
				$dd = date_format($now, 'Y-m-d');
		}
		
		//--------------------------------------------------
		
		
	

	
					
	header("Location: ../home.php?success");
	exit();	
		
	}
?>